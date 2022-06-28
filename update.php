
<?php
    include "_dbconnect.php";
   // checking if the variable is set or not and if set adding the set data value to variable userid
   if(isset($_GET['id']))
    {
      $userid = $_GET['id']; 
    }
      // SQL query to select all the data from the table where id = $userid
      $query="SELECT * FROM thread WHERE id = $userid ";
      $view_thread= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_thread))
        {
            $id = $row['id'];
            $username = $row['username'];
            $subject = $row['subject'];
            $topic = $row['topic'];
            $querie = $row['query'];
        }
 
    //Processing form data when form is submitted
    if(isset($_POST['update'])) 
    {
      $subject = $_POST['subject'];
      $topic = $_POST['topic'];
      $querie = $_POST['querie'];
      
      // SQL query to update the data in user table where the id = $userid 
      $query = "UPDATE thread SET subject = '{$subject}' , topic = '{$topic}' , query = '{$querie}' WHERE id = $userid";
      $update_user = mysqli_query($conn, $query);
      echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";
    }             
?>

<link rel="stylesheet" href="create.css">
<h1 class="text-center">Edit Threads</h1>
  <div class="container ">
    <form action="" method="post">
      <div class="form-group">
        <label for="subject" >Subject</label>&nbsp&nbsp
        <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $subject  ?>">
      </div>

      <div class="form-group">
        <label for="topic" >Topic</label>&nbsp&nbsp
        <input type="text" name="topic" id="topic" class="form-control" value="<?php echo $topic  ?>">
      </div>
    
      <div class="form-group">
        <label for="querie" >Thread</label>&nbsp&nbsp
        <textarea rows="4" cols="50" type="querie" name="querie" id="querie" class="form-control" value="<?php echo $querie  ?>"></textarea>
      </div>    

      <div class="form-group">
         <input type="submit"  name="update" class="btn btn-primary mt-2" value="update">
      </div>
      
    </form>    
  </div>
  <div class="back">


    <a href="admin.php" class="btn btn-warning mt-5"> Back </a>
  </div>
    