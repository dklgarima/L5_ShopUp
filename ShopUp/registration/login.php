<!-- <?php

?> -->
<!doctype html>
<html lang="eng">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font Awesome Icon Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="https://icons8.com">


  <title> Home</title>
  <style>
    .myli {
      padding-right: 10px;
      font-weight: 500;
    }

    

    .border-top {
      border-top: 1px solid #c6c6c6!important;
    }
    .ftr-margin{
      margin-bottom: 1em;
    }
   
  </style>

</head>

<body>

<?php

include 'connection.php'

if(isset($_POST['submit'])){
  $email = $POST['email'];
  $password = $POST['password'];

  $email_search = "select * from Reg where email = '$email' and status = 'active'";
  $query = oci_parse($conn, $emailquery);

  $email_count = oci_execute($query);

  if($email_count){
    $email_pass = oci_fetch_assoc($query);

    $pass = $email_pass['password'];

    $_SESSION['username']= $email_pass['username'];

    $decodepass= password_verify($password, $pass);

    if($decodepass){
      echo "Login Sucessful";
      ?>
      <script>
        location.replace("home.php");
      </script>

      <?php
    }else{
      echo "Password Incorrect";
    }
  }
}
  <div class="heading">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #dedede;">
      <div class="navbar-brand ms-4" href="#">

        <img src="img/logo4.png" alt="logo">
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="container">


          <div class="d-flex justify-content-end">
            <div class="p-2 d-flex align-items-center">
              <img src="img/love.png" alt="love">
            </div>
            <div class="p-2 mycart">
              <button class="btn my-sm-0 btn-outline-secondary" type="submit">
                <img src="img/cart.png" alt="cart">
                Cart
              </button>

            </div>
          </div>
          <div class="d-flex flex-row justify-content-between ">
            <div class="p-2 d-flex align-items-center pad-link">
              <ul class="navbar-nav mr-auto " id="myul" style="font-size: 20px;">
                <li class="nav-item active menu myli">
                  <a class="nav-link hdrmenu" href="home.html">Home </a>
                </li>
                <!-- <li class="nav-item dropdown myli">
                  <a class="nav-link dropdown-toggle hdrmenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Shop
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <li> <a class="dropdown-item" href="#">Action</a> </li>
                   <li>  <a class="dropdown-item" href="#">Another action</a>  </li>
                    <div class="dropdown-divider"></div>
                    <li> <a class="dropdown-item" href="#">Something else here</a> </li>
                  </ul>
                </li> -->

                <li class="nav-item  myli">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle hdrmenu" href="" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Shop
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="product.php">By Products</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
               
                  </li>



                <li class="nav-item  myli">
                  <a class="nav-link hdrmenu active" href="#">Login</a>
                </li>
                <li class="nav-item  myli">
                  <a class="nav-link hdrmenu" href="register.php">Register</a>
                </li>
                <li class="nav-item  myli">
                  <a class="nav-link hdrmenu " href="about.html">About</a>
                </li>
                <li class="nav-item myli">
                  <a class="nav-link hdrmenu" href="contact.php">Contact</a>
                </li>
                <li class="nav-item myli">
                  <a class="nav-link  disabled hdrmenu" href="#">Disabled</a>
                </li>
            
              </ul>
            </div>
            <div class="p-2 d-flex">
              <form class="form-inline my-2 my-lg-0 ">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" disabled>

              </form>
             
              <button class="btn btn-outline-primary my-2 my-sm-0 icon" type="submit" >
                <img src="icons8-search.svg" alt="search" style="height: 21px;">

                <!-- </form> -->
            </div>
          </div>


        </div>

      </div>

    </nav>

  </div>


<!-- main part   -->
<div> 
        <p> <?php 
        if(isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
        }else{
          echo $_SESSION['msg'] = "You are logged out. Please login again.";
        }
        ?> </p>
</div>
<div class="container  py-5">
    <div class="row  d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-5">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                src="img/cup.jpg" style=" height: 350px; ">

        </div>
        <div class="col-md-4">
            <h3 style=" text-align: center; margin-bottom: 1rem;"> Greetings from ShopUp  </h3>
            <form class="rounded-3 bg-light" method="post" style="padding: 1.5rem;">

                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name='login'>Sign In</button>
                <hr class="my-1">
                <small class="text-muted form-control-sm">By clicking Sign In, you agree to the terms of use.</small>
                <div class="my-3">
                    <p class="form-control-sm">Don't have an account? <a href="register.html"> Sign Up </a> </p>
                </div>
            </form>

        </div>
     
    </div>
</div>







  <!-- the divider -->
  <div class="b-example-divider" style="height: 4rem;"></div>

  <!-- for the footer -->

  <div class="container">
    <footer class=" pt-5 mt-5 border-top" >
    <div class="row row-cols-5" style="padding: 0 2rem;">
      <div class="col">
        <h5 class="ftr-margin">Main Menu</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <i class="fa fa-home"></i>
            <a href="#" class=" p-0 text-muted">Home</a>
          </li>
          <li class="nav-item mb-2">
            <img src="about.png" alt="" style="height: 16px;">
            <a href="#" class=" p-0 text-muted">About us</a>
          </li>
          <li class="nav-item mb-2">
            <i class="fa fa-shopping-basket"></i>
            <a href="#" class=" p-0 text-muted">Shop</a>
          </li>
        </ul>
      </div>
  
      <div class="col">
        <h5 class="ftr-margin">Contact Us</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <i class="fa fa-address-card-o"></i>
            <a href="#" class=" p-0 text-muted">Address</a>
          </li>
          <li class="nav-item mb-2">	
            <i class=" fa fa-envelope-o"></i>
            <a href="#" class=" p-0 text-muted">Email</a>
          </li>
          <li class="nav-item mb-2">
            <i class=" fa fa-phone"></i>
            <a href="#" class=" p-0 text-muted">Number</a>
          </li>
        </ul>
      </div>
  
      <div class="col">
        <h5 class="ftr-margin">Find us On</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <i class=" fa fa-facebook"></i>
            <a href="#" class=" p-0 text-muted">Facebook</a>
          </li>
          <li class="nav-item mb-2">
            <i class=" fa fa-twitter"></i>
            <a href="#" class=" p-0 text-muted">Twitter</a>
          </li>
          <li class="nav-item mb-2">
            <i class=" fa fa-instagram"></i>
            <a href="#" class=" p-0 text-muted">Instagram</a>
          </li>
        </ul>
      </div>

      
      <div class="col">
  
      </div>
      <!-- for the logo of PayPal -->
      <div class="col">
        <i class="fa fa-cc-paypal" style="font-size: 43px; color: darkblue;"></i>
      </div>

    </div>
      <!-- for the last part copyright-->
      <div class="d-flex py-4 my-4 border-top">
        <p>© 2022 ShopUp, Inc. All rights reserved.</p>
      
      </div>



    </footer>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

 
</body>




</html>