<?php
ob_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    
     
    <style>
        body{
            background-color: violet;
        }
        .container{
            
            background-color: gray;
            box-shadow: 6px 6px 5px white;
            padding: 14px;
            align-content: center;
            max-width: 300px;
            margin-top: 18px;
            border-radius: 9px;
        }
        h3{
            color: aliceblue;
            font-family: cursive;
            text-align: center;
            margin-top: 70px;
            margin-bottom: 0px;
            margin-left: 20px;
        }
        .container .form-group .form-control{
            color: aliceblue;
        }
        
    </style>
</head>

<body>
    <div>
    <section id="header">
    
    <a href="#"><img src="logo.jpg" class="logo" alt="logo"></a>

    <div>
        <ul id="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="shop.html">shop</a></li>
            <li><a href="category.html">Category</a></li>
            <li><a href="about.html">about</a></li>
            <li><a href="contact.html">contact</a></li>
            <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
            
        </nav>
    </div> 

    <h3>Login</h3>
    <div class = "container">
    <form action=" " method = "post">
    <div class="form-group">
        <label for="email" style="color: aliceblue;"><b>Email address:</b></label>
        <input type="email" class="form-control" name = "loginmail" id="email" placeholder="Enter Email-id" required style = "color: black;">
    </div>
    <div class="form-group">
        <label for="pwd" style="color: aliceblue;"><b>Password:</b></label>
        <input type="password" class="form-control" id="pwd" name = "loginpassword" placeholder = "Enter Password" required style = "color: black;">
    </div>
  <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox"> <b>Remember me</b>
      </label>
  </div>
        <a href = "register.php" style = "color: aliceblue;">Don't have an account? Register Here </a><br><br>
    <button type="submit" class="btn btn-primary" name = "loginsubmit" style="background-color: blue;box-shadow: 2px 2px white;">Submit</button>
    </form>
    <?php
        session_start();
        if (isset($_POST['loginsubmit'])) {
          require_once('config.php');
          $username = mysqli_real_escape_string($conn, $_POST['loginmail']);
          $password = mysqli_real_escape_string($conn, $_POST['loginpassword']);
            $query = "SELECT * FROM userinfo WHERE email='$username' AND password='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) {
              $_SESSION['username'] = $username;
              $_SESSION['success'] = "You are now logged in";
              header('location: userhome.php');
            }else {
                echo "<br>";
                echo "<h4>Incorrect email/password!</h4>";
            }
          
        }

        ob_end_flush();
        ?>

    </div>
</body>
</html>

