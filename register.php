<?php ob_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Register at MyBrary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>
   <style>
        body{
            background-color: violet;
        }
        .container{
              background-color: gray;
            box-shadow: 6px 6px 5px white;
            padding: 14px;
            align-content: center;
            max-width: 400px;
            margin-top: 18px;
            border-radius: 9px;
            margin-bottom: 40px;
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
            color:aliceblue;
        }
        
    </style>
</head>

<body>
   
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
            <li><a href="login.php">login</a></li>
        </ul>
    </div>

</section>
   

    <h3>Create An Account</h3>
    <div class = "container">
    <form action = "" method = "post">
        <div class="form-group">
            <label for="name" style="color: aliceblue;"><b>First Name:</b></label>
            <input type="text" class="form-control" name = "fname" required id="name" placeholder="Enter your name" style = "color: black;">
        </div>
        <div class="form-group">
            <label for="lname" style="color: aliceblue;"><b>Last Name:</b></label>
            <input type="text" class="form-control" required name = "lname"  id="lname" placeholder="Enter surname" style = "color: black;">
        </div>

        <div class="form-group">
            <label for="email" style="color: aliceblue;"><b>Email address:</b></label>
            <input type="email" class="form-control" name = "email" required id="email" placeholder="Enter Email-id" style = "color: black;">
        </div>
        <div class="form-group">
            <label for="pwd" style="color: aliceblue;"><b>Password:</b></label>
            <input type="password" class="form-control" required name = "pw" minlength = "8" maxlength="15" id="pwd" placeholder = "Enter Password" style = "color: black;">
        </div>
        <div class="form-group">
            <label for="pwd" style="color: aliceblue;"><b>Confirm Password:</b></label>
            <input type="password" class = "form-control" required minlength = "8" name = "cpw" maxlength="15" id="pwd" placeholder = "Re-enter Password" style = "color: black;">
        </div>    
        <div class="form-group">
            <label for="age" style="color: aliceblue;"><b>Age:</b></label>
            <input type="number" class="form-control" required id="age" name = "age" placeholder = "Enter age" style = "color: black;">
        </div>    
        <div class="form-group">
            <label for="num" style="color: aliceblue;"><b>Contact Number:</b></label>
            <input type="text" class="form-control" required
                   id="num" placeholder = "Enter your number" required name = "pno" maxlength = "10" minlength = "10" style = "color: black;">
        </div>            
         <div class="form-group">
            <label for="add" style="color: aliceblue;"><b>Address:</b></label>
            <input type="text" class="form-control"  required name = "add" id="add" placeholder = "Enter your address" style = "color: black;">
        </div>
        <a href = "login.php" style = "color: aliceblue;">Already a member? Log In </a><br><br>
        <button type="submit" class="btn btn-primary" name="submit" style="background-color: blue;box-shadow: 2px 2px white;">Submit</button>
    </form>
<?php
        session_start();
        if(isset($_POST["submit"])){
        $varname = $_POST["fname"];
        $varlname = $_POST["lname"];
        $varemail = $_POST["email"];  
        $varpassword = $_POST["pw"]; 
        $varcpassword = $_POST["cpw"];
        $varage = $_POST["age"];
        $varpnumber = $_POST["pno"];
        $varaddress = $_POST["add"];
        if($varpassword != $varcpassword){
            echo "<h4>Entered Passwords do not match! Try Again.</h4>";
        }
        else{
            require_once('config.php');    
            $user_check_query = "SELECT * FROM userinfo WHERE email = '$varemail' LIMIT 1";
            $result = mysqli_query($conn, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if($user){    
                if ($user['email'] === $varemail){ 
                        echo "<br>";
                        echo "<h4>Email already exists!</h4>";    
                    }
            }
            else{
                $query = "INSERT INTO userinfo (firstname,lastname,email,password,age,pnumber,address) 
                          VALUES('$varname','$varlname', '$varemail','$varpassword','$varage','$varpnumber','$varaddress')";
                mysqli_query($conn, $query);
                $_SESSION['username'] = $varemail;
                $_SESSION['success'] = "You are now logged in";
                header('location: sample.php');
                }
            mysqli_close($conn);
            }
        }
        ob_end_flush();
        ?>

    </div>
</body>
</html>