<!-- Header -->
<?php  include '_dbconnect.php'?>

<h1 class="text-center">Threads</h1>
<tr>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                                        <th>#</th>
                                        <th>username</th>
                                        <th>subject</th>
                                        <th>topic</th>
                                        <th>query</th>
                                        <th>Action</th>
                                    </tr>
      </thead>
        <tbody>
          <tr>
           
            <?php
              //  first we check using 'isset() function if the variable is set or not'
              //Processing form data when form is submitted
              if (isset($_GET['id'])) {
                  $userid = $_GET['id']; 

                  // SQL query to fetch the data where id=$userid & storing data in view_user 
                  $query="SELECT * FROM thread WHERE id = {$userid} ";  
                  $view_users= mysqli_query($conn,$query);            

                  while($row = mysqli_fetch_assoc($view_users))
                  {
                    $id = $row['id'];
                    $username = $row['username'];
                    $subject = $row['subject'];
                    $topic = $row['topic'];
                    $query = $row['query'];

                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['subject'] . "</td>";
                    echo "<td>" . $row['topic'] . "</td>";
                    echo "<td>" . $row['query'] . "</td>";
                    echo "<td>";
                }
                }
            ?>
          </tr>  
        </tbody>
    </table>
  </div>

   <!-- a BACK Button to go to pervious page -->
  <div class="container text-center mt-5">
    <a href="teacher.php" class="btn btn-warning mt-5"> Back </a>
  <div>

