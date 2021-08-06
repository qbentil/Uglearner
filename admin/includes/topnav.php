<?php
    $id = $_SESSION['user_session'];
    $user = new Administrator("../");
?>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
            <!-- header start -->
            <header class="ttr-header">
                <div class="ttr-header-wrapper">
                    <!--sidebar menu toggler start -->
                    <div class="ttr-toggle-sidebar ttr-material-button">
                        <i class="ti-close ttr-open-icon"></i>
                        <i class="ti-menu ttr-close-icon"></i>
                    </div>
                    <!--sidebar menu toggler end -->
                    <!--logo start -->
                    <div class="ttr-logo-box">
                        <div>
                            <a href="./" class="ttr-logo">
                                <img class="ttr-logo-mobile" alt="" src="../assets/images/logo-mobile.png" width="30" height="30">
                                <img class="ttr-logo-desktop" alt="" src="../assets/images/logo-all-white.png" width="160" height="27">
                            </a>
                        </div>
                    </div>
                    <!--logo end -->
                    <div class="ttr-header-menu">
                        <!-- header left menu start -->
                        <ul class="ttr-header-navigation">
                            <li>
                                <a href="../" class="ttr-material-button ttr-submenu-toggle"><i class="ti-world"></i> HOME</a>

                            </li>
                            <li>
                                <a href="#" class="ttr-material-button ttr-submenu-toggle">QUICK MENU <i class="fa fa-angle-down"></i></a>
                                <div class="ttr-header-submenu">
                                    <ul>
                                        <li><a href="../courses.html">Our Courses</a></li>
                                        <li><a href="../event.html">New Event</a></li>
                                        <li><a href="../membership.html">Membership</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <!-- header left menu end -->
                    </div>
                    <div class="ttr-header-right ttr-with-seperator">
                        <!-- header right menu start -->
                        <ul class="ttr-header-navigation">
                            <li>
                                <a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
                            </li>
                            <li>
                                <a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell"></i></a>
                                <div class="ttr-header-submenu noti-menu">
                                    <div class="ttr-notify-header">
                                        <span class="ttr-notify-text-top">9 New</span>
                                        <span class="ttr-notify-text">User Notifications</span>
                                    </div>
                                    <div class="noti-box-list">
                                        <ul>
                                            <li>
                                                <span class="notification-icon dashbg-gray">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                <span class="notification-text">
                                                    <span>Sneha Jogi</span> sent you a message.
                                                </span>
                                                <span class="notification-time">
                                                    <a href="#" class="fa fa-close"></a>
                                                    <span> 02:14</span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="notification-icon dashbg-yellow">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </span>
                                                <span class="notification-text">
                                                    <a href="#">Your order is placed</a> sent you a message.
                                                </span>
                                                <span class="notification-time">
                                                    <a href="#" class="fa fa-close"></a>
                                                    <span> 7 Min</span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="notification-icon dashbg-red">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span>
                                                <span class="notification-text">
                                                    <span>Your item is shipped</span> sent you a message.
                                                </span>
                                                <span class="notification-time">
                                                    <a href="#" class="fa fa-close"></a>
                                                    <span> 2 May</span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="notification-icon dashbg-green">
                                                    <i class="fa fa-comments-o"></i>
                                                </span>
                                                <span class="notification-text">
                                                    <a href="#">Sneha Jogi</a> sent you a message.
                                                </span>
                                                <span class="notification-time">
                                                    <a href="#" class="fa fa-close"></a>
                                                    <span> 14 July</span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="notification-icon dashbg-primary">
                                                    <i class="fa fa-file-word-o"></i>
                                                </span>
                                                <span class="notification-text">
                                                    <span>Sneha Jogi</span> sent you a message.
                                                </span>
                                                <span class="notification-time">
                                                    <a href="#" class="fa fa-close"></a>
                                                    <span> 15 Min</span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="notification-icon dashbg-green">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                                <span class="notification-text">
                                                    <span>View All</span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="assets/images/users/<?php echo $user->singlerecord($id)['photo'] ?>" width="32" height="32"></span></a>
                                <div class="ttr-header-submenu">
                                    <ul>
                                        <li><a href="profile.php"><i class="ti-user"></i> My profile</a></li>
                                        <li><a href="#">Activity</a></li>
                                        <li><a href="#">Messages</a></li>
                                        <li><a href="" class="power-off"><i class="ti-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="ttr-hide-on-mobile">
                                <a href="#" class="ttr-material-button"><i class="ti-layout-grid3-alt"></i></a>
                                <div class="ttr-header-submenu ttr-extra-menu">
                                    <a href="#">
                                        <i class="fa fa-music"></i>
                                        <span>Musics</span>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-youtube-play"></i>
                                        <span>Videos</span>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                        <span>Emails</span>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-book"></i>
                                        <span>Reports</span>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-smile-o"></i>
                                        <span>Persons</span>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-picture-o"></i>
                                        <span>Pictures</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <!-- header right menu end -->
                    </div>
                    <!--header search panel start -->
                    <div class="ttr-search-bar">
                        <form class="ttr-search-form">
                            <div class="ttr-search-input-wrapper">
                                <input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
                                <button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
                            </div>
                            <span class="ttr-search-close ttr-search-toggle">
                                <i class="ti-close"></i>
                            </span>
                        </form>
                    </div>
                    <!--header search panel end -->
                </div>
            </header>