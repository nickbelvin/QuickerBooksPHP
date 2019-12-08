  <?php  
 $connect = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
 if(isset($_POST["accountnumber"]))  
 {  
      $query = "SELECT * FROM chartofaccounts WHERE accountnumber = '".$_POST["accountnumber"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>