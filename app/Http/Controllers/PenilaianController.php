<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAkhir;
use App\Models\NilaiUtility;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\Str;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::with('penilaian')->get();
        $kriteria = Kriteria::get();

        return view('home', compact('alternatif', 'kriteria'));

    }

    public function hasilOperasi()
    {
        $arrBobotKriteria = [];
        $kriteria = Kriteria::get();
        $alternatif = Alternatif::get();
        foreach($kriteria as $e){
            array_push($arrBobotKriteria, $e->weight/Kriteria::sum('weight'));
        }

        // Nilai Utility
        NilaiUtility::where('id', '!=', null)->delete();
        $arrMinMax = [];
        foreach($kriteria as $c){
            // var min & max dari c[$i]
            $max = Penilaian::where('kriteria_id', $c->id)->max('score');
            $min = (Penilaian::where('Kriteria_id', $c->id)->count() == 1) ? 0 : Penilaian::where('kriteria_id', $c->id)->min('score');

            $isBenefit = ($c->type === 'benefit') ? true : false;
            // for sebanyak a
            foreach($alternatif as $a){
                // proses utility dari a[$i] pada c[$i]
                if($isBenefit) {
                    // rumus benefit
                    if(Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->count() > 0) {
                        $u = (Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->first()->score - $min) / ($max - $min);
                    }else{
                        $u = 0;
                    }
                    NilaiUtility::create([
                        'utility_score' => $u,
                        'alternatif_id' => $a->id,
                        'kriteria_id' => $c->id,
                    ]);
                }else{
                    // rumus cost
                    if(Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->count() > 0) {
                        $u = ($max - Penilaian::where('kriteria_id', $c->id)->where('alternatif_id', $a->id)->first()->score) / ($max - $min);
                    }else{
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
        foreach($alternatif as $a) {
            foreach($kriteria as $i => $c) {
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

    public function showAddAlternative()
    {
        $kriteria=Kriteria::get();
        return view('add-alternative', compact('kriteria'));
    }

    public function addAlternative(Request $req)
    {
        $a = Alternatif::create([
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

        return redirect('/');
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

        return redirect('/');
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
