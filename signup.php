<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;

}
?>
<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["c_password"];
    $usertype=$_POST["usertype"];


    $existsql="SELECT * FROM `users` WHERE username = '$username'";
    $result=mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError="Username Already Exists";
    }
    else{
        
        
        // $exists=false;
        if($password==$cpassword){
            // $sql="INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$hash', current_timestamp())";
            $sql="INSERT INTO `users` (`username`, `password`, `usertype`, `dt`) VALUES ('$username', '$password', '$usertype', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError="Password and conform password do not match";
        } 
    }
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="index.css">

<?php
    if($showAlert){

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
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
    <form action="signup.php" method="post">
      <input type="text" class="fadeIn second" name="username" id="username" placeholder="Username">
      <input type="text" class="fadeIn third" name="password" id="password" placeholder="Password">
      <input type="text" id="c_password" class="fadeIn third" name="c_password" placeholder="Confirm Password">
      <label for="usertype">User Type:</label>

                <select id="usertype" class="btn" name="usertype">
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
                
                </select><br>
      <input type="submit" class="fadeIn fourth" value="Add User"><br>
      <a href="admin.php">&lt Back</a>
    </form>


  </div>
</div>