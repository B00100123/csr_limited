<!-- Sidebar-left -->
<div id="sidebar-wrapper" class="link-light p-3">
    <!-- Menu Button -->
    <ul class="list-unstyled fa-ul co-menu ml-4 co-menu">
        <li class="active"><a href="{{ url('member/dashboard') }}"><i class="fa-li fas fa-circle text-light"></i>Dashboard</a></li>
        <li class="nav-item"><a href="{{ url('member/view_shops') }}/{{ Auth::user()->id }}"><i class="fa-li fas fa-circle text-light"></i>Shops</a></li>
        <li class="nav-item"><a href="{{ url('member/view_reviews') }}/{{ Auth::user()->id }}"><i class="fa-li fas fa-circle text-light"></i>Reviews</a></li>
    </ul>
</div>
