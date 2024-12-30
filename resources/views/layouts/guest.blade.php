<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Vvveb">
    <!-- base href="/app/public/themes/default/" -->
    <base href="">
    <link rel="icon" href="../../favicon.ico">

    <title>Vvveb default theme</title>

   <!-- Bootstrap core CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- link href="css/bootstrap.css" rel="stylesheet"-->
    <!-- link href="css/stylesheet.css" rel="stylesheet"-->

</head>
    <body>
         @include('layouts.navigation')
      
                {{ $slot }}
            </div>
        </div>
    </body>
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script -->
    <script src="js/jquery.min.js"></script>
    <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script -->
    <script src="js/popper.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>


     <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            navRewind:true,
            margin:10,
            nav:true,
            dots:false,
            navText: ['<i class="la la-angle-left"></i>','<i class="la la-angle-right"></i> '],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })    
    </script>
    
  </body>
</html>
