

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                    @if(Auth::guard('admin')->check())
                        {{Auth::guard('admin')->user()->name}}

                    @endif
                    </span>
            </a>
            <!-- Dropdown - User Information -->

        </li>

    </ul>

</nav>

<style>
    .shop-cms{
        color: black;
        text-decoration: underline;
        line-height: 0.7;
    }

    .navbar .btn-upg-bar {
    margin-top: 9px;
    background-color: #ffb52a !important;
    z-index: 2;
}
.btn-blueDepth {
    background-color: #2A9AE0;
    color: #FFFFFF;
}
.btn-pill {
    padding: 4px 12px;
    font-family: "DB Heavent";
    font-size: 18px;
    line-height: 1;
    border-radius: 14.5px;
}
    </style>

