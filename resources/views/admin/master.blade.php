<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>E-Commerce Deshboard</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
    href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/uppy.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/jquery.steps.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/jquery.timepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/quill.snow.css') }}">
        <!-- Date Range Picker CSS -->
        <link rel="stylesheet" href="{{ asset('admin_assets/css/daterangepicker.css') }}">
        <!-- App CSS -->
        
    <link rel="stylesheet" href="{{ asset('admin_assets/css/app-dark.css') }}" id="darkTheme" disable>
    <link rel="stylesheet" href="{{ asset('admin_assets/css/app-light.css') }}" id="lightTheme">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Icons CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link id="base-style" rel="stylesheet" href="https://linghucong.js.org/Bootstrap_Metro_Dashboard/css/style.css">
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">

            @include('admin.layout.topnav')
        
        </nav>


        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            @include('admin.layout.logout')
        </div>

        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            @include('admin.layout.sidenav')
        </aside>

        <main role="main" class="main-content">

        @yield('content')
        @include('admin.layout.note')
        </main>

        @include('admin.layout.script')
    </div> <!-- .wrapper -->

</body>

</html>
