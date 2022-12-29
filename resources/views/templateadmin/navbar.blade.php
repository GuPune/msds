<header class="header">
    <a href="#" class="logo">
        <img src="{{ asset('cms/images/logo.jpg') }}" alt="logo" width="80" height="40">
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('cms/img/authors/avatar3.jpg') }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                        <div class="riot">
                            <div>
                                Admin
                                <span>
                                    <i class="caret"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{ asset('cms/img/authors/avatar3.jpg') }}" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                            <p class="topprofiletext">Admin</p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="#"> <i class="livicon" data-name="user" data-s="18"></i> My Profile </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="#"> <i class="livicon" data-name="gears" data-s="18"></i> Account Settings </a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#"> <i class="livicon" data-name="lock" data-s="18"></i> Lock </a>
                            </div>
                            <div class="pull-right">
                                <a href="/cms/logout"> <i class="livicon" data-name="sign-out" data-s="18"></i> Logout </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
