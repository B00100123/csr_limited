@include('admins.library')
  <body class="bg-dark-blue">
    @include('admins.header')
    <div id="wrapper" class="userid dashboard-page opened vh-100">
    @include('admins.sidebar')
    @yield('content')
  </div>
    <!-- Navbar links -->


    @include('admins.footer')

  </body>
</html>
