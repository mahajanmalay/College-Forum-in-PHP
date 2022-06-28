

<?php

$login=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $usertype=$_POST["usertype"];


    $sql="Select * from users where username='$username' AND password='$password' AND usertype='$usertype'";
    $result = mysqli_query($conn, $sql);
    $num= mysqli_num_rows($result);

    if($num==1){
                $login = true;
                session_start();

                $_SESSION['loggedin']= true;
                $_SESSION['username']= $username;
                $_SESSION['usertype']= $usertype;

                if($usertype=="admin"){

                    header("location: admin.php");
                }
                elseif($usertype=="student"){
                    header("location: forum.php");

                }
                elseif($usertype=="teacher"){
                    header("location: forum.php");

                }
                
            }
            else{
                $showError="Invalid Credentials";
            } 
            
    }
     
    
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="index.css">
<!------ Include the above in your HEAD tag ---------->

<?php
    if($login){

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span area-hidden="true">&times;</span></button>  
        </div>';
    }
    if($showError){

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span area-hidden="true">&times;</span></button>  
        </div>';
    }
    ?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="logo.jpeg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="index.php" method="post">
      <input type="text"  class="fadeIn second" name="username" id="username" placeholder="username">
      <input type="text"  class="fadeIn third" name="password" id="password" placeholder="password">
      <label for="usertype">User Type:</label>

                <select id="usertype" class="btn" name="usertype">
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                
                </select><br>
      <input type="submit" class="fadeIn fourth" value="LogIn">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        Don't have account? Mail admin to Create one</a>
    </div>

  </div>
</div>