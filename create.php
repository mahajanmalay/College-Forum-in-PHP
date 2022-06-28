<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;

}

?>

<?php 
require_once "_dbconnect.php";
  if(isset($_POST['create'])) 
    {
        $username = $_SESSION['username'];
        $subject = $_POST['subject'];
        $topic = $_POST['topic'];
        $query = $_POST['query'];
      
        // SQL query to insert user data into the users table
        $query= "INSERT INTO thread(username, subject, topic , query) VALUES('{$username}','{$subject}','{$topic}','{$query}')";
        $add_user = mysqli_query($conn,$query);
    
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_user) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { echo "<script type='text/javascript'>alert('Tread added successfully!')</script>";
              }         
    }
?>
<link rel="stylesheet" href="create.css">
<h1>Add Topic </h1>
  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <label for="subject" class="form-label">Subject</label>&nbsp&nbsp
        <input type="text" name="subject" id="subject" class="form-control">
      </div>

      <div class="form-group">
        <label for="topic" class="form-label">Topic</label>&nbsp&nbsp
        <input type="text" name="topic" id="topic" class="form-control">
      </div>
    
      <div class="form-group">
        <label for="query" class="form-label">Query</label>&nbsp&nbsp
        <textarea type="text" name="query" id="query" rows="4" cols="50" class="form-control"></textarea>
      </div>    

      <div class="form-group">
        <input type="submit"  name="create" class="btn" value="submit">
      </div>
      <a href="forum.php" class="btn">&lt Back</a>
    </form> 
  </div>

  