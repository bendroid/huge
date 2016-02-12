<!doctype html>
<html>
<head>
    <title>BenDev30</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- send empty favicon fallback to prevent user's browser hitting the server for lots of favicon requests resulting in 404s -->
    <link rel="icon" href="data:;base64,=">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>starter/css/materialize.css" />
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>starter/css/style.css" />
</head>
<body>
    <!-- wrapper, to center website -->
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<?php if (Session::userIsLoggedIn()) : ?>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/index">My Account</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "profile")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>profile/index">Profiles</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/changeUserRole">Change account type</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/editAvatar">Edit your avatar</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/editusername">Edit my username</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Edit my email</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/changePassword">Change Password</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
    </li>
<?php if (Session::get("user_account_type") == 7) : ?>
    <li <?php if (View::checkForActiveController($filename, "admin")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>admin/">Admin</a>
    </li>
    <?php endif; ?>
<?php endif; ?>
</ul>
<div class="navbar-fixed">
  <nav class="light-blue" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">BenDev30</a>
      <ul class="right hide-on-med-and-down">
    <li <?php if (View::checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>index/index">Home</a>
    </li>
<?php if (Session::userIsLoggedIn()) { ?>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/index">My Account</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>dashboard/index">Dashboard</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
    </li>
<?php } else { ?>
    <!-- for not logged in users -->
    <li <?php if (View::checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>login/index">Login</a>
    </li>
    <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>register/index">Register</a>
    </li>
<?php } ?>
        <!-- Dropdown Trigger -->
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>

  <ul id="nav-mobile" class="side-nav">
    <li <?php if (View::checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>index/index">Home</a>
    </li>
<?php if (Session::userIsLoggedIn()) { ?>
    <li <?php if (View::checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>dashboard/index">Dashboard</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "note")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>note/index">My Notes</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
    </li>
	    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/index">My Account</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/changeUserRole">Change account type</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/editAvatar">Edit your avatar</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/editusername">Edit my username</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Edit my email</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>user/changePassword">Change Password</a>
    </li>
    <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
    </li>
<?php if (Session::get("user_account_type") == 7) : ?>
    <li <?php if (View::checkForActiveController($filename, "profile")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>profile/index">Profiles</a>
    </li>
	<li <?php if (View::checkForActiveController($filename, "admin")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>admin/">Admin</a>
    </li>
    <?php endif; ?>
<?php } else { ?>
    <!-- for not logged in users -->
    <li <?php if (View::checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>login/index">Login</a>
    </li>
    <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index")) { echo ' class="active" '; } ?> >
        <a href="<?php echo Config::get('URL'); ?>register/index">Register</a>
    </li>
<?php } ?>
  </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</div>

    <!--<div class="wrapper">-->
<div class="section no-pad-bot">
    <div class="container">