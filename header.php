<?php 
// Start session 
session_start(); 
 
// Include required functions file 
require_once('inc/functions.inc.php'); 
 
// Check login status... if not logged in, redirect to login screen 
// if (check_login_status() == false) { 
//  redirect('account.php'); 
// } 
          
?> 
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>CDI Sports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/custom.css" rel="stylesheet">
<link href="assets/css/jquery.sidr.dark.css" rel="stylesheet">


<!--[if lt IE 7]>
	<link href="assets/css/font-awesome-ie7.min.css" rel="stylesheet">
	<![endif]-->
    <!-- Fav and touch icons -->


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    <![endif]-->
<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>

<!-- Generic javascript/jquery files -->
<script src="assets/js/jquery.js" type="text/javascript"></script> 
<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/responsiveslides.js"></script>
<script type="text/javascript" src="assets/js/jquery.sharrre.min.js"></script>
<script type="text/javascript" src="assets/js/infinite.js"></script>
<script type="text/javascript" src="assets/js/jquery.sidr.min.js"></script>

<!--Scroll js files -->
<script src="assets/js/jquery.parallax-1.1.3.js" type="text/javascript" ></script>
<script src="assets/js/jquery.localscroll-1.2.7-min.js" type="text/javascript" ></script>
<script src="assets/js/jquery.scrollTo.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="assets/js/jquery.nicescroll.min.js"></script>

<!-- Main custom script file, everyone use this -->
<script type="text/javascript" src="assets/js/scripts.js"></script>
<script type="text/javascript" src="assets/js/upload.js"></script>
<!-- Including the HTML5 Uploader plugin -->
<script src="assets/js/jquery.filedrop.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/facebook.js"></script>
<script src="assets/js/popcorn.min.js"></script>

<script>

 var wordList = ['surf','skate','sky','snow'];

  $(function() {
      $("#searchBar").autocomplete({
          source: wordList
      });
  });
</script>

<body data-spy="scroll" data-target=".top-spy">

<!-- HEADER --> 
<header id="head-top">

  <!-- LOGIN MODAL -->

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <div id="main-form" class="text-center">

              <h2>SIGN IN</h2>

              <div id="login-form-container">
                <form id="login-form" method="post" novalidate="" action="">                
                  <input type="text" name="username" id="username" placeholder="Username" required="required">
                  <input type="password" name="password" id="password" placeholder="Password" required="required">
                  <div class="error" id="failure" style="display: none;"></div>
                  <a href="#" onclick="login()" class="loginButton">Sign in</a>
              
                  <div class="orLine">OR</div>

                  <a href="#" onclick="fblogin()" class = "fbLoginButton">Sign in with Facebook</a>
                 <!-- <a id="forgotdetails" href="#">Forgot your password?</a>-->
                  <div class = "signUpLink"><a href="account.php" id="forgotdetails">Sign up</a></div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- END LOGIN MODAL -->

  <!-- LOGOUT MODAL -->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <div id="main-form" class="text-center">

              <h2>SUCCESFULLY LOGGED OUT</h2>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- END LOGOUT MODAL --> 
<div id="sidr">
  <!-- Your content -->
  <ul>
    <li>
              <form action="search.php" method="POST">
                <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="searchBar" class="searchBar ui-autocomplete-input" name="term" placeholder="Search..." style="margin-left: 38px;" autocomplete="off">
              </form>
    </li>
    <li><a href="category.php?id=0">Skate</a></li>
    <li><a href="category.php?id=1">Surf</a></li>
    <li><a href="category.php?id=2">Sky</a></li>
    <li><a href="category.php?id=3">Snow</a></li>
    <li><a href="about-us.php">About</a></li>
    <li><a href="contact-us.php">Contact</a></li>
    <li class="hide-menu">
                <?php 
                  if(isset($_SESSION['username'])){
                    ?><a href="#" onclick="signOut()">Sign Out</a> <?php
                  } else {
                    ?><a href="#" onclick="$('#loginModal').modal('show')">Sign In</a> <?php
                  } ?>
      </li>
      <li class="hide-menu"><a href="upload.php">Upload</a></li>
      <div id="side-social">
        <a class="floatright" href="http://www.twitter.com"><img src="images/twitterMain.png"/></a>
        <a class="floatleft" href="http://www.facebook.com"><img src="images/facebookMain.png" /></a>
      </div>
  </ul>
</div>

  <div class="head navbar-fixed-top">
    <div class="innerHead">
      <div class="container">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <a id="simple-menu" class="navbar-toggle collapsed" href="#sidr">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <li><a class="navbar-brand logo" href="http://cdisports.jamescobbett.co.uk"><img src="images/xtv.png" style="padding-top:3px"/></a></li>
          </ul>
        </div>
        <div class="navbar-collapse" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li class="active"><div class = "navElement"><a href="category.php?id=0">Skate</a></div></li>
            <li><div class = "navElement"><a href="category.php?id=1">Surf</a></div></li>
            <li><div class = "navElement"><a href="category.php?id=2">Sky</a></div></li>
            <li><div class = "navElement"><a href="category.php?id=3">Snow</a></div></li>
            <li>
              <form action="search.php" method="POST">
                <input type="text"  id = 'searchBar' class="searchBar" name="term" placeholder="Search..." style = "margin-left: 38px;">
              </form>
            <li>
            <li><div class = "navElement" style = "width: 75px"><a href="about-us.php">About</a></div></li>
            <li><div class = "navElement" style = "width: 75px"><a href="contact-us.php">Contact</a></div></li>
            <li>
              <div class="navElement" id="sign" style = "width: 75px">
                <?php 
                  if(isset($_SESSION['username'])){
                    ?><span><a href="#" onclick="signOut()">Sign Out</a></span> <?php
                  } else {
                    ?><span><a href="#" onclick="$('#loginModal').modal('show')">Sign In</a></span> <?php
                  } ?>
              </div>
            </li>
            <li>
              <div class = "navElement" style = "width: 75px">
                <span><a href="upload.php">Upload</a></span>
              </div>
            </li>
            <li>
              <div class = "navElement" id="welcome" style="width:150px;">
             <?php 
                if(isset($_SESSION['username'])){
                  echo "Hello ".$_SESSION['username'];
                }?>
                </div>
            </li>
            <li class="floatright">
                <div id="social-links">
                  <span class="icon twitter"><a href="http://www.twitter.com"><img src="images/twitterMain.png"/></a></span>
                </div>
            </li>
            <li class="floatright" style="padding-left:0px;">
                <div id="social-links">
                  <span class="icon facebook"><a href="http://www.facebook.com"><img src="images/facebookMain.png" /></a></span>
                </div>
            </li>
          </ul>
        </div>
      <!-- <ul>
        <li><a class = "logo" href="http://cdisports.jamescobbett.co.uk"><img src="images/xtv.png" style="padding-top:3px"/></a></li>
        <li class="active"><div class = "navElement"><a href="category.php?id=0">Skate</a></div></li>
        <li><div class = "navElement"><a href="category.php?id=1">Surf</a></div></li>
        <li><div class = "navElement"><a href="category.php?id=2">Sky</a></div></li>
        <li><div class = "navElement"><a href="category.php?id=3">Snow</a></div></li>
        <li>
          <form action="search.php" method="POST">
            <input type="text"  id = 'searchBar' class="searchBar" name="term" placeholder="Search..." style = "margin-left: 38px;">
          </form>
        <li>
        <li><div class = "navElement" style = "width: 75px"><a href="about-us.php">About</a></div></li>
        <li><div class = "navElement" style = "width: 75px"><a href="contact-us.php">Contact</a></div></li>
        <li>
          <div class="navElement" id="sign" style = "width: 75px">
            <?php 
              if(isset($_SESSION['username'])){
                ?><span><a href="#" onclick="signOut()">Sign Out</a></span> <?php
              } else {
                ?><span><a href="#" onclick="$('#loginModal').modal('show')">Sign In</a></span> <?php
              } ?>
          </div>
        </li>
        <li>
          <div class = "navElement" style = "width: 75px">
            <span><a href="upload.php">Upload</a></span>
          </div>
        </li>
        <li>
          <div class = "navElement" id="welcome" style="width:150px;">
         <?php 
            if(isset($_SESSION['username'])){
              echo "Hello ".$_SESSION['username'];
            }?>
            </div>
        </li>
        <li class="floatright">
            <div id="social-links">
              <span class="icon twitter"><a href="http://www.twitter.com"><img src="images/twitterMain.png"/></a></span>
            </div>
        </li>
        <li class="floatright" style="padding-left:0px;">
            <div id="social-links">
              <span class="icon facebook"><a href="http://www.facebook.com"><img src="images/facebookMain.png" /></a></span>
            </div>
        </li>
      </ul> -->
      </div>
    </div>
  </div>

</header>
<!-- / HEADER -->