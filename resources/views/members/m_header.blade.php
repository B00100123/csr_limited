<!-- heading text nav -->
<div class="container-fluid text-light ht py-3" style="background: #2c3e50;">
    <nav class="navbar navbar-expand-md small">
      <a class="img-responsive" href="{{ url('member/dashboard') }}"><img src="{{ asset('images/csr-limited.png') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link link-light font-weight-bold" data-toggle="dropdown" aria-expanded="false">@if(Auth::check()) {{ Auth::user()->name }} @endif<i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown-menu db-dropdown-msg dropdown-menu-right">
                        <a class="dropdown-item small" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fal fa-sign-out-alt"></i> Log out</a>
                        <form id="logout-form" style="display: none;" action="{{ url('/logout') }}" method="POST">
                          @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
