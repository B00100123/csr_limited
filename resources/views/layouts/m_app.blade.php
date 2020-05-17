@include('admins.library')
  <body class="bg-dark-blue">
    @include('members.m_header')
    <div id="wrapper" class="userid dashboard-page opened vh-100">
    @include('members.m_sidebar')
    @yield('content')
  </div>
    <!-- Navbar links -->


    @include('members.m_footer')

  </body>
</html>
