<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAkhir;
use App\Models\NilaiUtility;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\Str;
use DB;


class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboardSpk()
    {
        return view('dashboard-spk');
    }


    public function index()
    {

        $alternatif = Alternatif::with('penilaian')->get();
        $kriteria = Kriteria::get();

        return view('penilaian', compact('alternatif', 'kriteria'));

        // return view('penilaian', ['alternatif' =>$alternatif, 'kriteria' =>$kriteria]);
    }

//  /*   public function hasilOperasi(Request $request)
// {

//     // Mendapatkan semua data yang diperlukan
//     $alternatif = Alternatif::get();
//     $kriteria = Kriteria::get();

//     // Menghitung bobot kriteria
//     $totalBobot = $kriteria->sum('weight');
//     $arrBobotKriteria = $kriteria->map(function ($k) use ($totalBobot) {
//         return $k->weight / $totalBobot;
//     });

//     // Menghapus data nilai utility yang sudah ada
//     NilaiUtility::truncate();

//     // Menghitung dan menyimpan nilai utility
//     foreach ($kriteria as $k) {
//         $max = Penilaian::where('kriteria_id', $k->id)->max('score');
//         $min = Penilaian::where('kriteria_id', $k->id)->min('score');
//         // $min = (Penilaian::where('kriteria_id', $k->id)->count() == 1) ? 0 : Penilaian::where('kriteria_id', $k->id)->min('score');
//         $isBenefit = ($k->type === 'benefit');

//         foreach ($alternatif as $a) {
//             $nilaiPenilaian = Penilaian::where('kriteria_id', $k->id)->where('alternatif_id', $a->id)->value('score');
//             dd($nilaiPenilaian);
//             if ($max - $min == 0) {
//                 $u = 0; // Menghindari pembagian dengan nol
//             } else {
//                 if ($isBenefit) {
//                     $u = ($max - $nilaiPenilaian) / ($max - $min);
//                 } else {
//                     $u = ($nilaiPenilaian - $min) / ($max - $min);
//                 }
//             }
//             // */
//             //    if ($isBenefit) {
//             //     $u = ($nilaiPenilaian - $min) / ($max - $min);
//             // } else {
//             //     $u = ($max - $nilaiPenilaian) / ($max - $min);
//             // }


//             NilaiUtility::create([
//                 'utility_score' => $u,
//                 'alternatif_id' => $a->id,
//                 'kriteria_id' => $k->id,
//             ]);
//         }
//     }

//     // Menghapus data nilai akhir yang sudah ada
//     NilaiAkhir::truncate();

//     // Menghitung dan menyimpan nilai akhir
//     foreach ($alternatif as $a) {
//         $nilaiAkhir = 0.0;
//         foreach ($kriteria as $i => $k) {
//             $nilaiUtility = NilaiUtility::where('alternatif_id', $a->id)->where('kriteria_id', $k->id)->value('utility_score');
//             $nilaiAkhir += $arrBobotKriteria[$i] * $nilaiUtility;
//        }
//       // Menghitung dan menyimpan nilai akhir
//   /*  foreach ($alternatif as $a) {
//         $nilaiAkhir = 0.0;
//         foreach ($kriteria as $i => $k) {
//             $nilaiUtility = NilaiUtility::where('alternatif_id', $a->id)->where('kriteria_id', $k->id)->first();

//             if ($nilaiUtility) {
//                 $nilaiAkhir += $arrBobotKriteria[$i] * $nilaiUtility->utility_score;
//             }
//         } */
//         NilaiAkhir::create([
//             'alternatif_id' => $a->id,
//             'nilai_akhir' => $nilaiAkhir
//         ]);


//     }

//     // Redirect atau tampilkan halaman yang diinginkan
//   return redirect('hasil');


// }

// public function indexHasil()
//   {
//       $data = NilaiAkhir::with('alternatif')->orderBy('nilai_akhir', 'DESC')->get();

//       return view('hasil', compact('data'));
//   }
// */


  public function hasilOperasi()
    {
        $arrBobotKriteria = [];
        $kriteria = Kriteria::get();
        $alternatif = Alternatif::get();
        foreach ($kriteria as $e) {
            array_push($arrBobotKriteria, $e->weight / Kriteria::sum('weight'));
        }
        // Nilai Utility
        NilaiUtility::where('id', '!=', null)->delete();
        $arrMinMax = [];
        foreach ($kriteria as $c) {
            // var min & max dari c[$i]
            $max = Penilaian::where('kriteria_id', $c->id)->max('score');
            $min = (Penilaian::where('kriteria_id', $c->id)->count() == 1) ? 0 : Penilaian::where('kriteria_id', $c->id)->min('score');
            $isBenefit = ($c->type === 'benefit') ? true : false;
            // for sebanyak a
            foreach ($alternatif as $a) {
                // proses utility dari a[$i] pada c[$i]
                if ($isBenefit) {
                    // rumus benefit
                    if (Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->count() > 0) {
                        $u = (Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->first()->score - $min) / ($max - $min);
                    } else {
                        $u = 0;
                    }
                    NilaiUtility::create([
                        'utility_score' => $u,
                        'alternatif_id' => $a->id,
                        'kriteria_id' => $c->id,
                    ]);
                } else {
                    // rumus cost
                    if (Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->count() > 0) {
                        $u = ($max - Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->first()->score) / ($max - $min);
                    } else {
                        $u = 0;
                    }
                    NilaiUtility::create([
                        'utility_score' => $u,
                        'alternatif_id' => $a->id,
                        'kriteria_id' => $c->id,
                    ]);
                }
            }
        }
        // Nilai Akhir
        NilaiAkhir::where('id', '!=', null)->delete();
        $nilaiAkhir = 0.0;
        foreach ($alternatif as $a) {
            $nilaiAkhir = 0.0;
            foreach ($kriteria as $i => $c) {
                $nilaiAkhir += $arrBobotKriteria[$i] * NilaiUtility::where('alternatif_id', $a->id)->where('kriteria_id', $c->id)->first()->utility_score;
            }
            NilaiAkhir::create([
                'alternatif_id' => $a->id,
                'nilai_akhir' => $nilaiAkhir
            ]);
            $nilaiAkhir = 0;
        }
        $data = NilaiAkhir::with('alternatif')->orderBy('nilai_akhir', 'DESC')->get();

        return view('hasil', compact('data'));

    }

    // public function indexHasil()
    // {
    //     $data = NilaiAkhir::get();

    //     return view('hasil', compact('data'));
    // }

    // Fungsi Alternative

    public function indexAlternative()
    {
        $alternatif = DB::table('alternatif')->get();
        return view('index-alternative', compact('alternatif'));
        //  return view('index-alternative', ['alternatif'=>$alternatif]);
    }

    public function showAddAlternative()
    {
        $kriteria = Kriteria::get();
        return view('add-alternative', compact('kriteria'));
    }

    public function addAlternative(Request $req)
    {
        try{
        $a = Alternatif::create([
            //$a = DB::table('alternatif')->insert([
            'name' => $req->name,
            'jk' => $req->jk,
            'asalsekolah' => $req->asalsekolah,
            'jurusan' => $req->jurusan

        ]);

        foreach(Kriteria::get() as $c){
            Penilaian::create([
                'score' => $req->{'score'.$c->id},
                'alternatif_id' => $a->id,
                'kriteria_id' => $c->id
            ]);
        }
        // Data berhasil disimpan, berikan pesan alert
        return redirect('/index-alternative')->with('success', 'Data berhasil disimpan.');
    } catch (\Exception $e) {
        // Data tidak berhasil disimpan, berikan pesan alert
        return redirect('/index-alternative')->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }

       // return redirect('/index-alternative');
    }

    public function editAlternative($id)
    {
        $alternatif = DB::table('alternatif')->where('id', $id)->get();
        return view('/edit-alternative', ['alternatif' => $alternatif]);
    }

    public function updateAlternative(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'jk' => 'required',
            'asalsekolah' => 'required',
            'jurusan' => 'required'
        ]);
        DB::table('alternatif')->where('id', $request->id)->update([
            'name' => $request->name,
            'jk' => $request->jk,
            'asalsekolah' => $request->asalsekolah,
            'jurusan' => $request->jurusan
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-succes" role="alert">
            Data berhasil di ubah
        </div>
        ');
        return redirect('/index-alternative');
    }

    public function destroyAlternative($id)
    {
        DB::table('alternatif')->where('id', $id)->delete();
        return redirect('/index-alternative');
    }


    // Fungsi Kriteria

    public function indexCriteria()
    {
        $kriteria = DB::table('kriteria')->get();
        return view('index-criteria', compact('kriteria'));
        //  return view('index-alternative', ['alternatif'=>$alternatif]);
    }
    public function showAddCriteria()
    {
        return view('add-criteria');
    }

    public function addCriteria(Request $req)
    {
        if(Kriteria::where('name', $req->name)->count() > 0) {
            Kriteria::where('name', $req->name)->delete();

        Kriteria::create([
            //   $a = DB::table('kriteria')->insert([
            'name' => $req->name,
            'weight' => $req->weight,
            'type' => $req->type
        ]);
    }else{
        Kriteria::create([
            'name' => $req->name,
            'weight' => $req->weight,
            'type' => $req->type
        ]);
    }

        return redirect('/index-criteria');
    }

    public function editCriteria($id)
    {
        $kriteria = DB::table('kriteria')->where('id', $id)->get();
        return view('/edit-criteria', ['kriteria' => $kriteria]);
    }

    public function updateCriteria(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'weight' => 'required',
            'type' => 'required'

        ]);
        DB::table('kriteria')->where('id', $request->id)->update([
            'name' => $request->name,
            'weight' => $request->weight,
            'type' => $request->type
        ]);

        $request->session()->flash('sukses', '
        <div class="alert alert-succes" role="alert">
            Data berhasil di ubah
        </div>
        ');
        return redirect('/index-criteria');
    }

    public function destroyCriteria($id)
    {
        DB::table('kriteria')->where('id', $id)->delete();
        return redirect('/index-criteria');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
