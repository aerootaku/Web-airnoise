<?php
/**
 * Created by PhpStorm.
 * User: Kio
 * Date: 10/8/2018
 * Time: 7:49 PM
 */ ?>
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
<!--        <a href="index.html" class="logo"><span><img src="assets/images/logo-light.png" alt="" height="18"> </span><i><img src="assets/images/logo-sm.png" alt="" height="22"></i></a>-->
        <h4 style="color: black">Air & Noise Quality Monitoring</h4>
    </div>
    <nav class="navbar-custom">

        <ul class="navbar-right d-flex list-inline float-right mb-0">
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-2x fa-user rounded-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <!-- item-->
                        <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-primary" href="logout.php?logout=true"><i class="mdi mdi-power text-primary"></i> Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left ml-4 mt-3">
                <h4>Air & Noise App</h4>
            </li>
        </ul>
    </nav>
</div>
