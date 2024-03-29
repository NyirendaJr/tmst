<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')

    <!-- Styles -->
       <style>
           html, body {
               background-color: #fff;
               color: #636b6f;
               font-family: 'Raleway', sans-serif;
               font-weight: 100;
               height: 100vh;
               margin: 0;
           }

           .full-height {
               height: 100vh;
           }

           .flex-center {
               align-items: center;
               display: flex;
               justify-content: center;
           }

           .position-ref {
               position: relative;
           }

           .top-right {
               position: absolute;
               right: 10px;
               top: 18px;
           }

           .content {
               text-align: center;
           }

           .title {
               font-size: 30px;
           }

           /* .links > a {
               color: #636b6f;
               padding: 0 25px;
               font-size: 12px;
               font-weight: 600;
               letter-spacing: .1rem;
               text-decoration: none;
               text-transform: uppercase;
           } */

           .m-b-md {
               margin-bottom: 30px;
           }
       </style>
</head>

<body class="page-header-fixed">
  <div style="margin-top: 5%;"></div>
    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>
</html>
