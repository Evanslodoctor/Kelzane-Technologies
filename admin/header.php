<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    
   header("Location: login.php");
   exit();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kelzane Technologies</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href=""
      type=""
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a href="index">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="services.php">
                  <i class="fas fa-tools"></i>
                  <p>Manage Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="team.php">
                  <i class="fas fa-users"></i>
                  <p>Team Members</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="inquiries.php">
                  <i class="fas fa-envelope"></i>
                  <p>Inquiries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="projects.php">
                  <i class="fas fa-project-diagram"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="analytics.php">
                  <i class="fas fa-chart-line"></i>
                  <p>Analytics</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="settings.php">
                  <i class="fas fa-cogs"></i>
                  <p>Settings</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      

      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <div class="logo-header" data-background-color="dark">
              <a href="index.php" class="logo">
                <img
                  src="assets/img/kelzane_logo_light.svg"
                  alt="Kelzane Technologies Logo"
                  class="navbar-brand"
                  height="25"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
          </div>
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <div class="navbar-left navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input type="text" placeholder="Search services..." class="form-control" />
                </div>
              </div>
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification">3</span>
                  </a>
                  <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                      <div class="dropdown-title">You have 3 new notifications</div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-icon notif-primary"><i class="fa fa-envelope"></i></div>
                            <div class="notif-content">
                              <span class="block">New inquiry received</span>
                              <span class="time">5 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-success"><i class="fa fa-user-plus"></i></div>
                            <div class="notif-content">
                              <span class="block">New user registered</span>
                              <span class="time">15 minutes ago</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </li>
                    <li><a class="see-all" href="#">See all notifications<i class="fa fa-angle-right"></i></a></li>
                  </ul>
                </li>
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                      <p>Profile</p>
                    </div>
                    <span class="profile-username"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img src="assets/img/admin_avatar.jpg" alt="Admin Profile"
                                 class="avatar-img rounded" />
                          </div>
                          <div class="u-text">
                            <h4>Kelzane Admin</h4>
                            <p class="text-muted">admin@kelzane.com</p>
                            <a href="profile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        

