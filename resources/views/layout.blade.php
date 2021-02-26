<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ mix('css/asset.css') }}" type="text/css" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}" type="text/javascript" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{!!asset('favicon.ico')!!}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('dashboard/style.css')!!}">
    <script src="https://kit.fontawesome.com/bf3b9c3659.js" crossorigin="anonymous"></script>
</head>

<body class="side-menu">
    <div class="mobile-search"></div>
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <a href="" class="sidebar-toggle">
                    <img class="svg" src="{!!asset('dashboard/img/svg/bars.svg')!!}" alt="img"></a>
            </div>
            <!-- ends: navbar-left -->
            <div class="navbar-right">
                <ul class="navbar-right__menu">
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img
                                    src="{!!asset('dashboard/img/author/profile/'.auth()->user()->avatar)!!}"
                                    alt="User avatar" class="rounded-circle"></a>
                            <div class="dropdown-wrapper">
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="{!!asset('dashboard/img/author/profile/'.auth()->user()->avatar)!!}"
                                            alt="User avatar" class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6>{{auth()->user()->name}}</h6>
                                        <span>@if(auth()->user()->subscription == 1)Weekly
                                            Subscription @elseif(auth()->user()->subscription == 2)Weekly & Monthly
                                            Subscription @else No subscriptions @endif</span>
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li>
                                            <a href="/detail/user/{{auth()->user()->id}}">
                                                <i data-feather="user"></i> Profile</a>
                                        </li>
                                        <li>
                                            <a href="/detail/user/{{auth()->user()->id}}">
                                                <i data-feather="settings"></i> Settings</a>
                                        </li>
                                    </ul>
                                    <a href="/sign-out" class="nav-author__signout">
                                        <i data-feather="log-out"></i> Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
        </nav>
    </header>
    <main class="main-content">
        <aside class="sidebar">
            <div class="sidebar__menu-group">
                <ul class="sidebar_nav">
                    <li>
                        <img class="svg dark imgtopNavbar" src="{!!asset('dashboard/img/logo_white.png')!!}"
                            alt="logo Canopy Power">
                    </li>
                    <li class="menu-title">
                        <span>Main menu</span>
                    </li>
                    <li>
                        <a href="/" active-class="mm-active">
                            <i data-feather="home" class="nav-icon"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-title m-top-30">
                        <span>Applications</span>
                    </li>
                    @if(auth()->user()->role=='admin')
                    <li>
                        <a href="/users-management" active-class="mm-active">
                            <i data-feather="users" class="nav-icon"></i>
                            <span class="menu-text">Users management</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="/system-info" active-class="mm-active">
                            <i data-feather="server" class="nav-icon"></i>
                            <span class="menu-text">System Info</span>
                        </a>
                    </li>
                    <li class="has-child">
                        <a href="/monitoring-data" class="">
                            <i data-feather="monitor" class="nav-icon"></i>
                            <span class="menu-text">Monitoring Data</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li>
                                <a active-class="mm-active" href="/career">Pending job</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-child">
                        <a href="#" class="">
                            <i data-feather="triangle" class="nav-icon"></i>
                            <span class="menu-text">Incident</span>
                            <span class="toggle-icon"></span>
                        </a>
                        <ul>
                            <li>
                                <a active-class="mm-active" href="/incident/overview">Overview</a>
                            </li>
                            <li>
                                <a active-class="mm-active" href="/incident/log">Event Log</a>
                            </li>
                            <li>
                                <a active-class="mm-active" href="/incident/settings">Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/analytics" active-class="mm-active">
                            <i data-feather="trending-up" class="nav-icon"></i>
                            <span class="menu-text">Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="/tools" active-class="mm-active">
                            <i data-feather="settings" class="nav-icon"></i>
                            <span class="menu-text">Tools</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div id="App">
            <div class="contents">
                <div class="container-fluid">
                    <router-view></router-view>
                </div>
            </div>
        </div>
        <footer class="footer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <?php $y = Date('Y'); ?>
                            <p>&copy; Copyright {{$y}} -<a href="/" target="_blank">Canopy Power</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-menu text-right">
                            <ul>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="mailto:support@canopypower.com">Contact support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery/jquery-3.5.1.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery/jquery-ui.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/bootstrap/popper.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/bootstrap/bootstrap.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/accordion.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/autoComplete.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/Chart.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/charts.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/daterangepicker.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/drawer.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/dynamicBadge.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/dynamicCheckbox.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/fullcalendar@5.2.0.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/google-chart.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery.countdown.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery.filterizr.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery.magnific-popup.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery.mCustomScrollbar.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery.peity.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/jquery.star-rating-svg.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/leaflet.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/leaflet.markercluster.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/loader.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/message.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/moment.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/muuri.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/notification.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/popover.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/select2.full.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/slick.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/trumbowyg.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/vendor_assets/js/wickedpicker.min.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/theme_assets/js/full-calendar.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/theme_assets/js/googlemap-init.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/theme_assets/js/icon-loader.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/theme_assets/js/jvectormap-init.js')!!}"></script>
    <script src="{!!asset('dashboard/assets/theme_assets/js/leaflet-init.js')!!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="{!!asset('dashboard/assets/theme_assets/js/main.js')!!}"></script>
</body>

</html>