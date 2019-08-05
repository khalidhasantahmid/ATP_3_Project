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

    <script type="text/javascript" src="assets/mk/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/essence/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.printPage.js"></script>
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
                        <h2>admin</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->


<!-- Page Content -->
<div class="container" style="margin-top: 2%; width: 80%;">

    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Add_Product')" >Add Product</button>
        <button class="tablinks" onclick="openTab(event, 'Product_Info')" id="defaultOpen">ProductInfo</button>
        <button class="tablinks" onclick="openTab(event, 'Order_List')">Order List</button>
        <button class="tablinks" onclick="openTab(event, 'User_Info')">User Info</button>
        <button class="tablinks" onclick="openTab(event, 'User_List')">User List</button>
        <button class="tablinks" onclick="openTab(event, 'Sales_report')">Sales Report</button>
    </div>

    <div id="Add_Product" class="tabcontent" >
        <div class="col-12">
            <form name="addProduct" action="{{route('home.addProduct')}}" method="post" id="product_detail">
                {{csrf_field()}}
                 <table>
                    <tr>
                        <td>Product Name :<br><br></td>
                        <td>
                            <input type="text" name="pName" style="width: 200px;" required><br><br>
                        </td>
                        <td rowspan="4">
                            <img src="" id="profile-img-tag" width="200px" name="pic"/><br>
                            <input type="file" name="image" id="profile-img" onchange="readURL(this);"  style="margin-top: 15px;" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Product price :<br><br></td>
                        <td>
                            <input type="number" name="pPrice" min="0" max="5000" style="width: 80px;" required><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Tags :<br><br></td>
                        <td>
                            <input type="text" name="pTag" style="width: 200px;" required><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Detail :<br><br><br><br><br></td>
                        <td>
                            <textarea rows="4" cols="40" name="pDetail" form="product_detail" required></textarea>
                            <br><br>
                        </td>
                     </tr>
                    <tr>
                        <td colspan="2">
                             <input type="submit" value="Insert" class="btn essence-btn">
                            <input type="reset" value="Reset" style="margin-left: 20px;" class="btn essence-btn">
                         </td>
                    </tr>
                </table>
             </form> 
        </div>
    </div>

    <div id="User_Info" class="tabcontent" >

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('home.updateUserInfo')}}" id="infoForm" method="post" style="width: 60%; margin-left: 20%;">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="name">Name <span>*</span></label>
                    <input type="text" class="form-control" id="name" name="cName" value="{{$loggedUser->name}}" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="pNumber">Phone No <span>*</span></label>
                    <input type="number" class="form-control" id="pNumber" name="pNumber" min="0" value="{{$loggedUser->phone}}" required>
                </div>
                <div class="col-12 mb-4">
                    <label for="email">Email Address <span>*</span></label>
                     <input type="email" class="form-control" id="email" name="email" value="{{$loggedUser->email}}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="password">Password <span>*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="" >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="cPassword">Confirm Password <span>*</span></label>
                    <input type="password" class="form-control" id="cPassword" name="password_confirmation" value="" required>
                </div>
                <div class="col-md-12 mb-3">
                    <h5 id="answer"></h5>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="submit" class="btn essence-btn" style="width: 100%;" value="Update">
                </div>
            </div>
        </form>
    </div>

    <div id="Order_List" class="tabcontent" >

        <div class="col-12 mb-3" align="center">
            <label for="tSearch">-- Search the Table --</label>
            <input type="text" class="form-control" id="Input" name="tSearch" style="width: 40%;">
            <a href="{{ route('print.orders')}}" class="btn essence-btn" id='printO'>Print</a></center>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#printO').printPage();
                    $('#printP').printPage();
                    $('#printU').printPage();
                    $('#printF').printPage();
                });
             </script>
        </div>

        <table class="sTable">
            <tr>
                <th width="10%">Order Id</th>
                <th width="10%">Order Status</th>
                <th width="10%">Cart Id</th>
                <th width="20%">Date</th>
                <th width="5%">Cost</th>
                <th width="20%">Address</th>
                <th width="15%">Customer Email</th>
                <th width="10%">Action</th>
            </tr>
            <tbody id="Table">
            @foreach($orders as $order)
            <tr>
                <td width="10%">{{$order->id}}</td>
                <td width="10%">{{$order->oStatus}}</td>
                <td width="10%">{{$order->cartId}}</td>
                <td width="20%">{{$order->date}}</td>
                <td width="5%">{{$order->cost}}</td>
                <td width="20%">{{$order->address}}</td>
                <td width="15%">{{$order->cEmail}}</td>
                <td width="10%">
                    <a href="{{route('home.orderStatus', ['id' => $order->id])}}" style="color: green;">Change</a> | 
                    <a href="{{route('home.orderDelete', ['id' => $order->id])}}" style="color: red;">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="Product_Info" class="tabcontent" >
        @if($products != null)
                <div class="col-12 mb-3" align="center">
                    <label for="tSearch">-- Search the Table --</label>
                    <input type="text" class="form-control" id="Input2" name="tSearch" style="width: 40%;">
                    <a href="{{ route('print.products')}}" class="btn essence-btn" id='printP'>Print</a></center>
                </div>
        <table class="sTable">
            <tr>
                <th width="5%">Product Id</th>
                <th width="15%">Product Name</th>
                <th width="5%">Price</th>
                <th width="15%">Product Detail</th>
                <th width="20%">Image</th>
                <th width="15%">Added Date</th>
                <th width="15%">Added By</th>
                <th width="10%">Action</th>
            </tr>
            <tbody id="Table2">
            @foreach($products as $product)
            <tr>
                <td width="5%">{{$product->id}}</td>
                <td width="15%">{{$product->name}}</td>
                <td width="5%">{{$product->price}}</td>
                <td width="15%">{{$product->description}}</td>
                <td width="20%"><img src="/assets/img/{{$product->path}}"></td>
                <td width="15%">{{$product->addedDate}}</td>
                <td width="15%">{{$product->addedBy}}</td>
                <td width="10%">
                    <a href="{{route('home.editProduct', ['id' => $product->id])}}" style="color: green;">Edit</a> | 
                    <a href="{{route('home.deleteProduct', ['id' => $product->id])}}" style="color: red;">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
            @else
                <div class="col-12">
                    <form name="addProduct" action="{{route('home.updateProduct')}}" method="post" id="product_detaill">
                        {{csrf_field()}}
                        <table>     
                            <tr>
                                <td>Product Name :<br><br></td>
                                <td>
                                    <input type="hidden" name="id"  value="{{$product->id}}">
                                    <input type="text" name="ppName" style="width: 200px;" value="{{$product->name}}" required>
                                </td>
                                <td rowspan="4">
                                    <img src="/assets/img/{{$product->path}}" id="profile-img-tag" width="200px" name="pic"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Product price :<br><br></td>
                                <td>
                                    <input type="number" name="ppPrice" min="0" max="5000" style="width: 80px;" value="{{$product->price}}" required><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>Product Tags :<br><br></td>
                                <td>
                                    <input type="text" name="ppTag" style="width: 200px;" value="{{$product->tag}}" required><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>Product Detail :<br><br><br><br><br></td>
                                <td>
                                    <textarea rows="4" cols="40" name="ppDetail" form="product_detaill" value="" required>{{$product->description}}</textarea>
                                    <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Update" class="btn essence-btn">
                                    <a href="{{route('home.deleteProduct', ['id' => $product->id])}}" class="btn essence-btn" style="margin-left: 10%;"> Delete</a>
                                </td>
                            </tr>
                        </table>
                    </form> 
                </div>
            @endif
    </div>

    <div id="User_List" class="tabcontent" >

        <div class="col-12 mb-3" align="center">
            <label for="tSearch">-- Search the Table --</label>
            <input type="text" class="form-control" id="Input3" name="tSearch" style="width: 40%;">
            <a href="{{ route('print.users')}}" class="btn essence-btn" id='printU'>Print</a></center>
        </div>

        <table class="sTable">
            <tr>
                <th width="5%">Id</th>
                <th width="25%">Name</th>
                <th width="20%">Phone</th>
                <th width="25%">Email</th>
                <th width="15%">Type</th>
                <th width="10%">Action</th>
            </tr>
            <tbody id="Table3">
            @foreach($users as $user)
            <tr>
                <td width="5%">{{$user->id}}</td>
                <td width="25%">{{$user->name}}</td>
                <td width="20%">{{$user->phone}}</td>
                <td width="25%">{{$user->email}}</td>
                <td width="15%">{{$user->type}}</td>
                <td width="10%">
                    <a href="{{route('home.deleteUser', ['id' => $user->id])}}" style="color: red;">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="Sales_report" class="tabcontent" >

        <div class="col-12 mb-3" align="center">
            <h3>Total sale : <strong style="color: green;">{{$totalCost}}</strong></h3>
            <br>
            <a href="{{ route('print.profit')}}" class="btn essence-btn" id='printF'>Print</a></center>
        </div>

        <table class="sTable">
            <tr>
                <th width="10%">Order Id</th>
                <th width="10%">Order Status</th>
                <th width="10%">Cart Id</th>
                <th width="20%">Date</th>
                <th width="5%">Cost</th>
                <th width="20%">Address</th>
                <th width="15%">Customer Email</th>
            </tr>
            <tbody id="Table">
            @foreach($sales as $sale)
            <tr>
                <td width="10%">{{$sale->id}}</td>
                <td width="10%">{{$sale->oStatus}}</td>
                <td width="15%">{{$sale->cartId}}</td>
                <td width="20%">{{$sale->date}}</td>
                <td width="10%">{{$sale->cost}}</td>
                <td width="20%">{{$sale->address}}</td>
                <td width="15%">{{$sale->cEmail}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--End of Page Content -->

<!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix" >
        <div class="container" >
      <div class="row">
                <!-- Single Widget Area -->
        <div class="container">
                <div class="col-12 col-md-8" >
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
   <!--  <script src="/assets/essence/js/jquery/jquery-2.2.4.min.js"></script> -->
    <!-- Popper js -->
    <script src="/assets/essence/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <!-- <script src="/assets/essence/js/bootstrap.min.js"></script> -->
    <!-- Plugins js -->
    <script src="/assets/essence/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="/assets/essence/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="/assets/essence/js/active.js"></script>
    <script type="application/javascript">

        $(document).ready(function(){
          $("#Input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Table tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });

        $(document).ready(function(){
          $("#Input2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Table2 tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
      });

        $(document).ready(function(){
          $("#Input3").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Table3 tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
      });

      function readURL(input) {
        
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                    document.getElementById(imgLoc).value = "selected";
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();
    </script>
</body>
</html>