<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Vendor CSS-->
    <link href="{{asset('admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    {{-- Font Awesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS-->
    <link href="{{asset('admin/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        {{-- <li class="active has-sub">
                            <a class="js-arrow" href="{{route('category')}}">
                                <i class="fas fa-tachometer-alt"></i>Home Page
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{route('adminDashboard')}}">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Map
                            </a>
                        </li>

                        <li>
                            <a href="{{route('adminCategoryList')}}">
                                <i class="fas fa-chart-bar"></i>
                                Category
                            </a>
                        </li>

                        @if(url()->current() == route('adminProductList'))
                        <li class="bg-primary">
                            <a href="{{route('adminProductList')}}">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Product
                            </a>
                        </li>
                        @else

                        <li>
                            <a href="{{route('adminProductList')}}">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Product
                            </a>
                        </li>
                        @endif



                        <li>
                            <a href="{{route('adminOrderList')}}">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Orders
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Product Pendings
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Resturants
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Delivary Men
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Customers
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa-solid fa-pizza-slice"></i>
                                Conversations
                            </a>
                        </li>


                        {{-- <li>
                            <a href="{{route('customerlist')}}">
                                <i class="fas fa-chart-bar"></i>Customers</a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap float-right">
                            {{-- <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> --}}
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if(Auth::user()['profile_photo_path'] == NULL)
                                                @if(Auth::user()['gender'] == 'female')
                                                    <img src="{{asset('admin/images/default/default_female.jpg')}}" alt="profile" class="">
                                                @else
                                                    <img src="{{asset('admin/images/default/default_male.jpg')}}" alt="profile" class="">
                                                @endif
                                            @else
                                                {{-- <h2>HI </h2> --}}
                                                {{-- <p>{{Auth::user()['profile_photo_path']}}</p> --}}
                                                <img src="{{asset('storage/user/'.Auth::user()['profile_photo_path'])}}" alt="profile" class="">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()['user_name']}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="{{route('adminProfile')}}">
                                                        @if(Auth::user()['profile_photo_path'] == NULL)
                                                            @if(Auth::user()['gender'] == 'female')
                                                                <img src="{{asset('profile_default/default_female.jpg')}}" alt="profile" class="">
                                                            @else
                                                                <img src="{{asset('profile_default/default_male.jpg')}}" alt="profile" class="">
                                                            @endif
                                                        @else
                                                            <img src="{{asset('storage/'.Auth::user()['profile_photo_path'])}}" alt="profile" class="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{Auth::user()['user_name']}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()['email']}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{route('adminProfile')}}">
                                                        <i class="zmdi zmdi-account"></i>Account
                                                    </a>
                                                </div>
                                            </div>


                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{route('changepasswordPage')}}">
                                                        <i class="fa-solid fa-key"></i>Password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer d-flex justify-content-center align-items-center">
                                                <form action="{{route('logout')}}" method="POST">
                                                    @csrf
                                                    <input class="bg-dark text-white m-2 p-1 ml-3 mr-3 rounded border-box" style="width: 300px;" type="submit" value="Log out">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">

            @yield('main_content')
            </div>
            <!-- END MAIN CONTENT-->

            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    {{-- <script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('admin/js/main.js')}}"></script>

</body>

</html>

    @yield('sourceScript')

<!-- end document-->
