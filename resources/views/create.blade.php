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

    <script src="assets/mk/jquery-3.3.1.js"></script>
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
                ?><!-- <span>4</span> --></a>
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
                        <h2>create</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

<div style="width: 100%;">
 <div style="float: left;padding-left: 5%;margin-top: 2%; width: 20%;">
  <table>
                <tr>
                <td colspan="2">
                  <div id="drawing-mode-options">
                  <table>
                    <tr>
                    <td>
                      <label for="drawing-mode-selector">Mode:</label></td>
                      <td><select id="drawing-mode-selector">
                        <option>Pencil</option>
                        <option>Circle</option>
                        <option>Spray</option>
                        <option>Pattern</option>

                        <option>hline</option>
                        <option>vline</option>
                        <option>square</option>
                        <option>diamond</option>
                        <option>texture</option>
                      </select><br>
                    </td>
                    </tr>
                      
                    <tr>
                    <td>
                      <label for="drawing-line-width">Line width:</label></td>
                      <td><span class="info">30</span><input type="range" value="30" min="0" max="150" id="drawing-line-width"><br>
                    </td>
                    </tr>
                      
                    <tr>
                    <td>
                      <label for="drawing-color">Line color:</label></td>
                      <td><input type="color" value="#005E7A" id="drawing-color"><br>
                    </td>
                    </tr>

                    <tr>
                    <td>
                      <label for="drawing-shadow-color">Shadow color:</label></td>
                      <td><input type="color" value="#005E7A" id="drawing-shadow-color"><br>
                    </td>
                    </tr>

                    <tr>
                    <td>
                      <label for="drawing-shadow-width">Shadow width:</label></td>
                      <td><span class="info">0</span><input type="range" value="0" min="0" max="50" id="drawing-shadow-width"><br>
                    </td>
                    </tr>
                  </table>
                  </div>
               
                </td>
                </tr>
                
                 <tr>
                <td>
                 <h2 id="Price">Price : 300</h2>
                  <br>
                </td>
                </tr>

                <tr>
                <td>
                  
                  <button id="drawing-mode" >Cancel drawing mode</button>
                </td>
                </tr>
                 <tr>
                <td>
                  <br>
                   <button value="Delete"   onclick="DeleteContent()">Delete Selected</button><br>
                </td>
                </tr>
               
                <tr>
                <td>
                  <button id="clear-canvas" >Clear All</button>
                  <br>
                </td>
                </tr>

                 <tr>
                <td>
                  <button id="Flipper" onclick="FlipCanvas()" class="navbutton" >T-Shirt Back</button> 
                  <br>
                </td>
                </tr>


              
    </table>

 </div>
 <div style="float: left;padding-left: 10%;margin-top: 2%; width: 55%;">

     <canvas id="c" name="c" width="500" height="520"></canvas>
        <br>        
        <!--<div align="center"><button id="Flipper" onclick="FlipCanvas()" class="navbutton" >T-Shirt Back</button>  </div>      -->
        <label for="BgNull" style="display:inline-block"></label>

 </div>
 <div style="float: right;padding-right: 5%;margin-top: 2%; width: 25%;">
  <table>  
        <tr>
          <td>
            <br>
            <input type="text" id="textF" name="UserText"></td>
          <td><br><button onclick="Addtext()">Add Text</button>
             <br>
          </td>
        </tr>
                
        <tr>
          <td>
            <div id="text-controls">
              <label for="font-family" style="display:inline-block">Font family:</label></td>
                <td><select id="font-family">
                  <option value="arial">Arial</option>
                  <option value="helvetica" selected>Helvetica</option>
                  <option value="myriad pro">Myriad Pro</option>
                  <option value="delicious">Delicious</option>
                  <option value="verdana">Verdana</option>
                  <option value="georgia">Georgia</option>
                  <option value="courier">Courier</option>
                  <option value="comic sans ms">Comic Sans MS</option>
                  <option value="impact">Impact</option>
                  <option value="monaco">Monaco</option>
                  <option value="optima">Optima</option>
                  <option value="hoefler text">Hoefler Text</option>
                  <option value="plaster">Plaster</option>
                  <option value="engagement">Engagement</option>
                </select>
                <br>
          </td>
        </tr>
                
        <tr>
          <td>
              <label for="text-bg-color">Background color:</label></td>
                <td><input type="color" value="" id="text-bg-color" size="10">
                <br>
            </td>
          </tr>
                
                <tr>
                <td>
                  <label for="text-lines-bg-color">Background text color:</label></td>
                  <td><input type="color" value="" id="TextBoxcolor" size="10">
                  <br>
                </td>
                </tr>
                
                <tr>
                <td>
                  <br><br>
                  <label for="text-font-size" id= "F_size">Font size:</label></td>
                  <td><br><br><input type="range" value="" min="1" max="120" step="1" id="text-font-size">
                  <br>
                </td>
                </tr>
                
                <tr>
                <td colspan="2">
                  <input type="file" id="imgLoader">
                  <br>
                </td>
                </tr>
                
                <tr>
                <td>
                  <button value="Change Color"   onclick="ColorChange()">Change Color</button></td>
                  <td><input type="color" value="#ffffff"  id="color">
                  <br>
                </td>
                </tr>

                <tr>
                <td>
                  <br>
                <!-- <a id="SendBlob" class="classA" href="/create/Mcart" style="margin-left:10%; text-decoration:none;">Add To Cart</a>-->

                <form id="addCxProduct" method="post" action="/create/Mcart" >
                  <input id="SendPrice" type="hidden" name="Sprice">
                  <input id="Scanvas" type="hidden" name="cartCanvas">
                  <input type="hidden" id="cartId" name="cartId" value="">
                  <button onclick="GoToCart()">ADD TO CART</button>
                    </form>
                </td>
                </tr>
                <tr>
                <td >
                  <br>
                <a id="lnkDownload" href="/assets/mk" class="classA" style="margin-left:10%; text-decoration:none;">Save image</a>
                 

               
                </td>
                </tr>
              </table>
                </div>
 <br style="clear: left;" />
</div>
<!--form to submit-->



<!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
      <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-8">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="/gallery"><img src="/assets/essence/img/core-img/logo.png" alt=""></a>
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

    <script src="/assets/essence/src/jstorage.min.js"></script>
    <script src="/assets/essence/src/cesta-feira.js"></script>
    <script type="application/javascript">
      $( document ).ready(function() {
        $.CestaFeira({
          debug: false,
          onItemAdded: function (item) {
            console.log(item);
          },
          onItemUpdated: function (item) {
            console.log(item);
          }
        });
      });
    </script>

<script type="text/javascript">

var id = new Date().valueOf() ;
console.log(id);
document.getElementById("cartId").value = id;

/*
function GoToCart(){
document.getElementById("Scanvas").value=document.getElementById("c").toDataURL();
document.getElementById("SendPrice").value=document.getElementById("price");

document.getElementById("addCxProduct").submit();
}*/
</script>


  <script src="/assets/mk/DesMKOnLoad.js"></script>
    <script src="/assets/mk/MKcart.js"></script>
</body>
</html>