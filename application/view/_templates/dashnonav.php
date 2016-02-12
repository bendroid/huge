<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dash, responsive bootstrap dashboard navbar">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, dashboard, bootstrap, front-end, frontend, web development, normal, navbar">
    <meta name="author" content="CodBits">

    <title>BenDev30 &middot; Responsive Bootstrap Dashboard Visible Overlay Navbar</title>

    <!-- Bootstrap core and other CSS -->
    <link href="<?php echo Config::get('URL'); ?>dash/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="<?php echo Config::get('URL'); ?>dash/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="<?php echo Config::get('URL'); ?>dash/css/dash-custom.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="/favicon.ico">
  </head>

  <body>
    <!-- Dash Navbar Top 
    Available versions: dnl-visible, dnl-hidden -->
    <nav class="navbar navbar-static-top dash-navbar-top dnl-visible">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#dnt-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-ellipsis-v"></span>
          </button>
          <button class="dnl-btn-toggle">
            <span class="fa fa-bars"></span>
          </button>
          <a class="navbar-brand" href="#">BenDev30 <span>beta</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="dnt-collapse">
          <!-- This dropdown is for avatar -->
          <ul class="nav navbar-nav navbar-right navbar-avatar">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			  <?php if (Session::userIsLoggedIn()) { ?>
			  <img src="<?php echo Session::get('user_avatar_file'); ?>" class="dnt-avatar" alt="Reardestani avatar">
			  <?php } else { ?>
			  <img src="<?php echo Config::get('URL'); ?>avatars/default.jpg" class="dnt-avatar" alt="Reardestani avatar">
			  <?php } ?>
			  </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Standard <span>go pro</span></a></li>
                <li><a href="#">Upload</a></li>
                <li class="active"><a href="#">Active link</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right dnt-navbar-form" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn"><span class="fa fa-search"></span></button>
          </form>  
          <!-- This dropdown is for normal links -->
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Support</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Link 1 <span>LOL</span></a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav> <!-- /.navbar -->

    <!-- Dash Navbar Left 
    Available versions: dnl-visible, dnl-hidden -->
    <div class="dash-navbar-left dnl-visible">
      <p class="dnl-nav-title">Home</p>
      <ul class="dnl-nav">

<?php if (Session::userIsLoggedIn()) { ?>
        <li>
          <a class="collapsed" data-toggle="collapse" href="#collapseAccount" aria-expanded="false" aria-controls="collapseAccount">
            <span class="zmdi zmdi-account-circle zmdi-hc-lg dnl-link-icon"></span>
            <span class="dnl-link-text">Account</span>
            <span class="fa fa-angle-up dnl-btn-sub-collapse"></span>
          </a>
          <!-- Dropdown level one -->
          <ul class="dnl-sub-one collapse" id="collapseAccount">
            <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>user/index"><span class="zmdi zmdi-account-circle zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> My Account</span></a>
            </li>
            <li <?php if (View::checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>dashboard/index"><span class="zmdi zmdi-view-dashboard zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Dashboard</span></a>
            </li>
            <li>
              <a class="collapsed" data-toggle="collapse" href="#collapseAccountEdit" aria-expanded="false" aria-controls="collapseAccountEdit">
                <span class="zmdi zmdi-edit zmdi-hc-lg dnl-link-icon"></span>
                <span class="dnl-link-text">Edit Account</span>
                <span class="fa fa-angle-up dnl-btn-sub-collapse"></span>
              </a>
              <!-- Dropdown level two -->
              <ul class="dnl-sub-two collapse" id="collapseAccountEdit">
                <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>user/changeUserRole"><span class="zmdi zmdi-edit zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Change account type</span></a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>user/editAvatar"><span class="zmdi zmdi-edit zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Edit your avatar</span></a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>user/editusername"><span class="zmdi zmdi-edit zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Edit my username</span></a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>user/edituseremail"><span class="zmdi zmdi-edit zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Edit my email</span></a>
                </li>
                <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>user/changePassword"><span class="zmdi zmdi-edit zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Change Password</span></a>
                </li>
              </ul>
            </li>
            <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>login/logout"><span class="zmdi zmdi-power zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Logout</span></a>
            </li>
<?php if (Session::get("user_account_type") == 7) : ?>
            <li <?php if (View::checkForActiveController($filename, "profile")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>profile/index"><span class="zmdi zmdi-accounts zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"> Profiles</span></a>
            </li>
            <li <?php if (View::checkForActiveController($filename, "admin")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>admin/"><span class="zmdi zmdi-shield-check zmdi-hc-lg dnl-link-icon"></span><span class="dnl-link-text"><span class="dnl-link-text">Admin</span></a>
            </li>
<?php endif; ?>
          </ul>
        </li>
<?php } else { ?>
    <!-- for not logged in users -->
            <li <?php if (View::checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>login/index"><span class="fa fa-sign-in dnl-link-icon"></span><span class="dnl-link-text"> Login</span></a>
            </li>
            <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>register/index"><span class="fa fa-user-plus dnl-link-icon"></span><span class="dnl-link-text"> Register</span></a>
            </li>
<?php } ?>


      <p class="dnl-nav-title">Apps</p>
      <ul class="dnl-nav">
        <li>
          <a href="#">
            <span class="fa fa-image dnl-link-icon"></span>
            <span class="dnl-link-text">Image</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="fa fa-video-camera dnl-link-icon"></span>
            <span class="dnl-link-text">Video</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="glyphicon glyphicon-folder-open dnl-link-icon"></span>
            <span class="dnl-link-text">Audio</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="fa fa-file-text dnl-link-icon"></span>
            <span class="dnl-link-text">File</span>
            <span class="badge">4</span>
          </a>
        </li>
        <li class="active">
          <a href="#">
            <span class="fa fa-link dnl-link-icon"></span>
            <span class="dnl-link-text">Active link</span>
          </a>
        </li>
      </ul>
      <p class="dnl-nav-title">Category</p>
      <ul class="dnl-nav">
        <li>
          <a class="collapsed" data-toggle="collapse" href="#collapseCategoryAll" aria-expanded="false" aria-controls="collapseCategoryAll">
            <span class="glyphicon glyphicon-tags dnl-link-icon"></span>
            <span class="dnl-link-text">All</span>
            <span class="fa fa-angle-up dnl-btn-sub-collapse"></span>
          </a>
          <!-- Dropdown level one -->
          <ul class="dnl-sub-one collapse" id="collapseCategoryAll">
            <li>
              <a href="#">
                <span class="fa fa-dot-circle-o dnl-link-icon"></span>
                <span class="dnl-link-text">UI</span>
                <span class="badge">4</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fa fa-dot-circle-o dnl-link-icon"></span>
                <span class="dnl-link-text">Design</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fa fa-dot-circle-o dnl-link-icon"></span>
                <span class="dnl-link-text">App</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fa fa-dot-circle-o dnl-link-icon"></span>
                <span class="dnl-link-text">Homepage</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <span class="fa fa-dot-circle-o dnl-link-icon"></span>
            <span class="dnl-link-text">Popular</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="fa fa-dot-circle-o dnl-link-icon"></span>
            <span class="dnl-link-text">Handpicked</span>
          </a>
        </li>
      </ul>
    </div> <!-- /.dash-navbar-left -->

    <!-- Enter your page content below here
    Available navbar effects: dnl-push, dnl-overlay
    Available navbar versions: dnl-visible, dnl-hidden 
    Available content effects: content-opacity -->
    <div class="content-wrap dnl-visible content-opacity" data-effect="dnl-overlay">
      <div class="container-fluid">
    <!-- wrapper, to center website -->

    <!--<div class="wrapper">-->
