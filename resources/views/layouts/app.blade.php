<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>KPKKWA Member Registration Form</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link rel="icon" type="image/png" href="{{ asset('resources/images/fav-icon.png') }}">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
        
      min-height: 100%;
      
background: #770202;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: sans-serif;
      font-size: 13px;
      font-weight: 600;
      color: #000000;
      line-height: sans-serif22px;
      font-family: sans-serif;
      
      }
     form{
        max-width: 80%;
     }
      .container1{
        /* border-bottom: 1px solid black; */
        margin-bottom: 20px;
      }
     
      .flex {
            display: flex;
             align-items: center;
            flex-direction: column;
            gap: 1.5rem;
            background: rgba(76, 68, 68, 0.486);
            padding: 50px;
            border-bottom: solid 1px #333;

        }
        .flex h1{
            color: #110f0b;
            font-size: 20px;
            margin-top: -30px;
        }
        .add {
            text-decoration: none;
            display: inline-block;
            width: 60px;
            height: 30px;
            border-radius: 2px;
            background: #a20505;
            color: white;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            padding: 2px;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .delete {
            text-decoration: none;
            display: inline-block;
            background: red;
            color: white;
            font-size: 22px;
            font-weight: 400;
            height: 30px;
            width: 30px;
            color: #fff;
            margin-left: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 32px;
      color: #fff;
      z-index: 2;
      }
      h5 {
      margin: 10px 0;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #26282a; 
      }
      .banner {
      position: relative;
      height: 260px;
      background-image: url("{{ asset('resources/images/bg.jpg') }}");  
      background-size: contain;
      margin-bottom: 25px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.5); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
     p{
        color: #770202;
     }

      select{
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }
      input {
        margin-top: 5px;
        height: 33px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      
      }
      textarea {
        margin-top: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      /* nav */
      nav{
            padding: 5px 20px;
            display: flex;
            align-items: center;
            height: 100px;
            background: white;

        }
        .logo img{
            
            width: 200px;
        }
        a, a:hover{
            text-decoration: none;
        }
        nav ul{
            list-style: none;
        }
        nav a{
            color: #000000;
        }
        nav a:hover{
            color:rgb(145, 144, 162) ;
        }
        .logo{
            flex:1;
        }
        .menu{
            display: flex;
            flex-direction: column;
            align-items: end;
            width:100%;
            
            
            
        }
        .menu li{
            margin-right: 90px;
            padding: 15px 10px;
            font-size: 18px;
        }
        .home{
          background: #a20505;
           color: #fff;
            padding: 10px 30px;
            border-radius: 60px;
            cursor: pointer;
            font-weight: 600;
            margin-right:-20px;
            padding-right:-20px;
            
        }
       
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder, a {
      color: #095484;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #a20505;
      color: #095484;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 2%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio, label.check {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      span.required {
      margin-left: 0;
      color: red;
      }
      .checkbox-item label {
      margin: 5px 20px 10px 0;
      }
      label.radio:before, label.check:before {
      content: "";
      position: absolute;
      left: 0;
      }
      label.radio:before {
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #095484;
      }
      label.check:before {
      top: 2px;
      width: 16px;
      height: 16px;
      border-radius: 2px;
      border: 1px solid #095484;
      }
      input[type=checkbox]:checked + .check:before {
      background: #095484;
      }
      label.radio:after {
      left: 5px;
      border: 3px solid #095484;
      }
      label.check:after {
      left: 4px;
      border: 3px solid #fff;
      }
      label.radio:after, label.check:after {
      content: "";
      position: absolute;
      top: 6px;
      width: 8px;
      height: 4px;
      background: transparent;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after, input[type=checkbox]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #a20505;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #0666a3;
      }
      .btn-nav {
    display: flex;
    flex-direction: row;
    margin-right:100px;
  }
  .btn-nav li {
    margin-right: 10px;
  }
  .btn-nav li:last-child {
    margin-right: 0; /* Remove margin from the last li */
  }
 
      

      @media (min-width: 568px) {
        
      .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .city-item input {
      width: calc(50% - 5px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
      @media (max-width: 550px) {
        .logo img{
            width:100px;
        }
        .home{
            
            font-size:12px;
        }
        nav{
            overflow-x: auto;
        }
        footer{
            align-items:center;
            padding:20px;
        }
        .flex h1{
            color: #110f0b;
            font-size: 12px;
            
        }
        .flex input{
            width:170px;
        }
        .fa-calendar-alt{
            margin-right:20px;
        }
  
  }
      
    </style>
  </head>
  
    <nav>
        <div class="logo">
           <a href="https://kpkkwa.org/"><img src="{{ asset('resources/images/logo.png') }}" alt=""></a> 
        </div>
        <div class="toggle"></div>
        <ul class="menu">
            
            <li style="font-weight: 400; font-size: 12px; margin-left: -190px; margin-bottom: -15px;" class="enqry">For any queries, please contact: 7025589575 | 9663157310</li>
            <div style="display:flex; flex-direction:row; row-gap:35px" class="btn-nav" >
           
            
            <li ><a href="https://kpkkwa.org/index.php/contacts/" class="home">Contact</a></li>
            <li  ><a href="{{url('login0')}}" class="home">Login</a></li>
            </div>
          
        </ul>
       </nav>

<body >

    <div id="app" class="p-0">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('resources/images/niche-logo-official.png') }}" align="Niche">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
                    <ul class="navbar-nav me-auto">

                    </ul>

                  
                    <ul class="navbar-nav ms-auto">
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link p-0" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>
                                </a>

                               
                            </li> 
                            <li class="ml-3">

                                 <a href="{{ url('logout') }}" style="color:black;text-decoration: none;font-size: 24px;"><b><i class="fa fa-power-off"></i> &nbsp;Logout ({{ Auth::user()->name }})</b></a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <main class="p-0">
            @yield('content')
        </main>
    </div>
</body>

<footer style="display: flex; justify-content: center; border-top:20px #000000;height: 100px;  background:#fff"class="footer">
        <p style="color: #000000; ; margin-top: 30px; font-size: 14px; line-height: 1.2;">&copy; KPKKWA | Bangalore (R) 2023. Powered by <a href="https://www.squeehub.com/">SqueeHub Technologies Pvt. Ltd.</a> (Part of<a href="https://cvsinfosolutions.com/"> CVS Info Solutions</a>) </p>

      </footer>
   
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
</html>
