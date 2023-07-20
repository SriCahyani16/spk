<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- owl carousel style -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('landing/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets -->
      <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{ asset('landing/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section header_bg">
         <div class="container">
            <nav class="navbar navbar-dark bg-dark">

            </nav>
         </div>
      </div>
      <!--header section end -->
      <!--about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="image_2"><img src="{{ asset('landing/images/img-2.png')}}"></div>
               </div>
               <div class="col-md-6">
                  <h1 class="about_taital">About<span class="us_text">Us</span></h1>
                  <p class="about_text">Simple Multi Attribute Rating Technique (SMART) adalah sebuah metode yang digunakan untuk membantu pengambilan keputusan dengan cara melakukan perbandingan antara beberapa alternatif berdasarkan beberapa kriteria atau atribut yang telah ditetapkan sebelumnya. Metode ini membantu memperjelas proses pengambilan keputusan dengan mengkonversi data kualitatif dan kuantitatif menjadi nilai numerik yang dapat dibandingkan. </p>
                  <div class="read_bt_1"><a href="{{ route('login') }}">Login</a></div>
               </div>
            </div>
         </div>
      </div>
      <!--about section end -->
      <!--footer section start -->
      <div class="footer_section layout_padding margin_top_90">
         <div class="container">
            {{-- <div class="address_main">
               <div class="address_text"><a href="#"><img src="{{ asset('landing/images/map-icon.png')}}"><span class="padding_left_15">Loram Ipusm hosting web</span></a></div>
               <div class="address_text"><a href="#"><img src="{{ asset('landing/images/call-icon.png')}}"><span class="padding_left_15">+7586656566</span></a></div>
               <div class="address_text"><a href="#"><img src="{{ asset('landing/images/mail-icon.png')}}"><span class="padding_left_15">demo@gmail.com</span></a></div>
            </div> --}}
            {{-- <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">Useful link</h4>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><a href="about.html">About</a></li>
                           <li><a href="services.html">Services</a></li>
                           <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">web design</h4>
                     <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscinaliquaL oreadipiscing </p>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">social media</h4>
                     <div class="social_icon">
                        <ul>
                           <li><a href="#"><img src="{{ asset('landing/images/fb-icon.png')}}"></a></li>
                           <li><a href="#"><img src="{{ asset('landing/images/twitter-icon.png')}}"></a></li>
                           <li><a href="#"><img src="{{ asset('landing/images/linkedin-icon.png')}}"></a></li>
                           <li><a href="#"><img src="{{ asset('landing/images/youtub-icon.png')}}"></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">Our Branchs</h4>
                     <p class="footer_text_1">Lorem ipsum dolor sit amet, consectetur adipiscinaliquaLoreadipiscing </p>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}
      <!--footer section end -->
      <!--copyright section start -->
      {{-- <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">Copyright 2023 All Right Reserved By <a href="https://html.design">Free Html Templates</a> Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
         </div>
      </div> --}}
      <!--copyright section end -->
      <!-- Javascript files-->
      <script src="{{ asset('landing/jquery.min.js') }}"></script>
      <script src="{{ asset('landing/js/popper.min.js') }}"></script>
      <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('landing/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('landing/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('landing/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('landing/js/custom.js') }}"></script>
      <!-- javascript -->
      <script src="{{ asset('landing/js/owl.carousel.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
   </body>
</html>
