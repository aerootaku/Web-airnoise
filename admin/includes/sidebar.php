<?php
/**
 * Created by PhpStorm.
 * User: Kio
 * Date: 10/8/2018
 * Time: 7:56 PM
 */ ?>
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu" id="side-menu">
        <li class="menu-title">Main</li>
        <li>
            <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-title">Management</li>
        <li>
            <a href="javascript:void(0);" class="waves-effect">
                <i class="mdi mdi-account"></i><span> User Management <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
                <li><a href="user-create.php">Create Users</a></li>
                <li><a href="user-manage.php">Manage Users</a></li>
            </ul>
        </li>
        <li class="menu-title">Map</li>
        <li>
            <a href="map2.php" class="waves-effect"><i class="mdi mdi-map"></i><span>Map Location</span></a>
        </li>
        <li class="menu-title">Advisory</li>
        <li>
            <a href="javascript:void(0);" class="waves-effect">
                <i class="mdi mdi-newspaper"></i><span> Advisory <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
                <li><a href="advisory-create.php">Send Advisory</a></li>
                <li><a href="advisory-manage.php">Manage Advisory</a></li>
            </ul>
        </li>
        <li class="menu-title">Settings</li>
        <li>
            <a href="javascript:void(0);" class="waves-effect">
                <i class="mdi mdi-settings"></i><span> Configuration <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
            </a>
            <ul class="submenu">
                <li><a href="manage-detection.php">Detected Pollutants</a></li>
                <li><a href="manage-location.php">Manage Location</a></li>
<!--                <li><a href="change-password.php">Change Password</a></li>-->
            </ul>
        </li>
    </ul>
</div>
