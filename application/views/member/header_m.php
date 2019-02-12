<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
	<title>DB MINI QUICK BOOK</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("resources/css/bootstrap.min.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("resources/css/css.css"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* The side navigation menu */
        .sidenav {
            height: 100%; /* 100% Full-height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #111; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
        }

        /* The navigation menu links */
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
            transition: margin-left .5s;
            padding: 20px;
            margin-top: 50px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        .navbar-fixed-top,
        .navbar-fixed-bottom {
          position: fixed;
          right: 0;
          left: 0;
          z-index: 1030;
        }
        @media (min-width: 768px) {
          .navbar-fixed-top,
          .navbar-fixed-bottom {
            border-radius: 0;
          }
        }
        .navbar-fixed-top {
          top: 0;
          border-width: 0 0 1px;
        }
        .navbar-fixed-bottom {
          bottom: 0;
          margin-bottom: 0;
          border-width: 1px 0 0;
        }
    </style>
    <script>
        var myVar = 0
function agus(){
        myVar = setInterval(function(){ setColor() }, 300000);
 }
function setColor() {
  alert("Anda AFK Terlalu Lama! Silahkan Login Kembali");
  document.location= "<?php echo base_url('c_login/logout') ?>"
}
 
function stopColor() {
  clearInterval(myVar);
   myVar = setInterval(function(){ setColor() }, 300000);
}
</script>
 
</head>
<body bgcolor="#0D9F5D" onload="agus()" onmousemove="stopColor()" onclick="stopColor()" onkeypress="stopColor()" onscroll="stopColor()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
        <a class="navbar-brand" href="#" onclick="togNav()">&#9776; DB MINI QUICK BOOK</a> 
    </nav>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a><?php echo anchor("c_member", 'Home', ['class'=>'btn btn-outline-info']); ?></a>
    <a><?php echo anchor("member/c_member/index", 'Data Barang', ['class'=>'btn btn-outline-primary']); ?></a>
    <a><?php echo anchor("member/c_member/keranjang", 'Keranjang', ['class'=>'btn btn-outline-success']); ?></a>
    <a><?php echo anchor("member/c_member/log", 'Pembayaran', ['class'=>'btn btn-outline-warning']); ?></a>
    <a><?php echo anchor("c_login/logout", 'Logout', ['class'=>'btn btn-outline-danger']); ?></a>
    <a>
    
    </a>
</div>