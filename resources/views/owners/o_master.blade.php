@include('admins.library')
  @include('owners.o_header')
<div id="wrapper" class="userid dashboard-page opened vh-100">
  @include('owners.o_sidebar')
  @yield('content')
</div>
@include('owners.o_footer')
  </body>
</html>
