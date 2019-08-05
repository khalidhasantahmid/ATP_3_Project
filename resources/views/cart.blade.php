<?php 
session_start();

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
            }
        }
    }
}
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
                <a class="nav-brand" href="{{route('gallery')}}"><img src="/assets/essence/img/core-img/logo.png" alt=""></a>
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
                            <li><a href="{{route('home')}}">Home</a> </li>
                            <li><a href="{{route('gallery')}}">Gallery</a></li>
                            <li><a href="{{route('create')}}">Create</a></li>
                            @if($loggedUser != null)
                                <li><a href="{{route('logout')}}" style="color: red;">Logout</a></li>
                            @else
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('registration')}}">Register</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="/gallery" method="post">
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
                    @if($loggedUser != null)
                        <a href="{{route('home')}}">{{$loggedUser->name}}</a>
                    @else
                        <a href="{{route('login')}}"><img src="/assets/essence/img/core-img/user.svg" alt=""></a>
                    @endif
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="{{route('cart')}}" id="essenceCartBtn" ><img src="/assets/essence/img/core-img/bag.svg" alt="">
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
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
   
<!-- Page Content -->
<div class="container" style="margin-top: 8%; width: 80%;">
    <form method="post" action="{{route('cart.placeOrder')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12 col-md-12 col-md-offset-1">
                <h4>ID:<div id="demo"></div></h4>
               <table class="table table-bordered">
                   <tr>
                        <th width="30%">Item</th>
                        <th width="10%">Item Name</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Price</th>
                        <th width="10%">Total</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {
                        ?>
                        <tr>
                            <td align="center"><img src="/assets/img/<?=$values["item_image"]?>" style="width: 80%; height: 50%;" ></td>
                            <td><?=$values["item_name"]?></td>
                            <td><?=$values["item_quantity"]?></td>
                            <td><?=$values["item_price"]?> Tk</td>
                            <td><?=number_format($values["item_quantity"] * $values["item_price"], 2)?> Tk</td>
                            <td><a href="{{route('singleview.getCart', ['id' => $values['item_id'], 'action' => 'delete'])}}"><span class="text-danger">Remove</span></a></td>
                        </tr>
                        <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                        ?>
                        <tr>
                            <td colspan="4" align="right"><strong>Total</strong> </td>
                            <td align="right"><?=number_format($total, 2)?> Tk</td>
                            <td>
                                <input type="hidden" id="fTotal" name="total" value="<?=$total?>">
                                <input type="hidden" id="cartId" name="cartId" value="">
                            </td>
                        </tr>
                        <?php

                        Session::put('shoppingCart', $_SESSION["shopping_cart"]);
                        }

                    ?>
               </table>
               <a href="" class="btn essence-btn" onclick="<?php session_destroy();?>">Clear Cart</a>
               @if($loggedUser != null && $loggedUser['type'] != 'admin' && isset($_SESSION["shopping_cart"]))
                        <input type="submit" name="" class="btn essence-btn" style="margin-left: 60%;" value="Place Order">
                    @else
                        <h6 style="margin-left: 50%;">
                            Please 
                            <a href="{{route('login')}}">
                                <b style="color: red;">(Sign in)</b>
                            </a> 
                            or 
                            <a href="{{route('gallery')}}">
                                <b style="color: red;">(Enter some product to cart)</b>
                            </a>
                             to place order </h6>
                    @endif
               
            </div>
        </div>
    </form>
</div>
<!-- /.container -->

<!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
      <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-8">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="{{route('gallery')}}"><img src="/assets/essence/img/core-img/logo.png" alt=""></a>
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
<script type="application/javascript">

  var id = new Date().valueOf() ;
    console.log(id);
    document.getElementById("demo").innerHTML = id;
    document.getElementById("cartId").value = id;
</script>

</body>
</html>