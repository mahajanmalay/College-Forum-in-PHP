<?php 
    include "_dbconnect.php";
     if(isset($_GET['id']))
     {
         $userid= $_GET['id'];

         // SQL query to delete data from user table where id = $userid
         $query = "DELETE FROM thread WHERE id = {$userid}"; 
         $delete_query= mysqli_query($conn, $query);
         header("Location: admin.php");
     }
              ?>