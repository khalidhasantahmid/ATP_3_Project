<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>X-Hued (A T-shirt Selling Website)</title>

    <!-- Favicon  -->
    <link rel="icon" href="/assets/essence/img/core-img/favicon.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/assets/essence/css/core-style.css">
    <link rel="stylesheet" href="/assets/essence/style.css">

    <script src="/assets/essence/js/jquery/jquery-2.2.4.min.js"></script>
<!-- ////////////////--------------------------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/jquery-ui.structure.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/jquery-ui.css"/>
    <script type="text/javascript" src="/assets/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/jquery-ui.theme.css"/>
    <script type="text/javascript" src="/assets/script.js"></script>
</head>
<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="<?php echo e(route('gallery')); ?>"><img src="/assets/essence/img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="<?php echo e(route('home')); ?>">Home</a> </li>
                            <li><a href="<?php echo e(route('gallery')); ?>">Gallery</a></li>
                            <li><a href="<?php echo e(route('create')); ?>">Create</a></li>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('registration')); ?>">Register</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="gallery.html" method="post">
                        <input type="search" name="search" id='autocomplete' placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <!-- <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div> -->
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="<?php echo e(route('login')); ?>"><img src="/assets/essence/img/core-img/user.svg" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="<?php echo e(route('cart')); ?>" id="essenceCartBtn" ><img src="/assets/essence/img/core-img/bag.svg" alt="">
                        <?php
                            if(isset($_SESSION["shopping_cart"]))
                            {
                                $count = count($_SESSION["shopping_cart"]);
                            }
                            else
                                $count=0;
                            
                            echo "<span>".$count."</span>"
                        ?><!-- <span>4</span> -->
                    </a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(/assets/essence/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>login</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

<!-- Page Content -->
<div class="container" style="margin-top: 2%; width: 40%;">

    <form action="<?php echo e(route('login.verify')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <div class="row">
            <div class="col-12 mb-4">
                <label for="email">Email Address <span>*</span></label>
                 <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="password">Password <span>*</span></label>
                <input type="password" class="form-control" id="password" name="password" value="" required>
            </div>
            <div class="col-md-12 mb-3">
                <input type="submit" class="btn essence-btn" style="width: 100%;" value="Login">
                <br><br>
                <input type="reset" class="btn essence-btn" style="width: 100%;" value="Clear">
            </div>
        </div>
    </form>
    
</div>
<!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
      <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-8">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="<?php echo e(route('gallery')); ?>"><img src="/assets/essence/img/core-img/logo.png" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                      <div class="col-md-12 text-center">
                          <p>
                              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made  with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          </p>
                      </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <!-- <script src="/assets/essence/js/jquery/jquery-2.2.4.min.js"></script> -->
    <!-- Popper js -->
    <script src="/assets/essence/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/assets/essence/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/assets/essence/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="/assets/essence/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="/assets/essence/js/active.js"></script>
</body>
</html>