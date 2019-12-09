<?php  
 //$connect = mysqli_connect("localhost", "root", "", "QuickerBooksDB");
 $connect = mysqli_connect("remotemysql.com", "tKROkoSDOO", "yGpAbKvSmu", "tKROkoSDOO");
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $accountname = mysqli_real_escape_string($connect, $_POST["accountname"]);  
      $accountnumber = mysqli_real_escape_string($connect, $_POST["accountnumber"]);  
      $description = mysqli_real_escape_string($connect, $_POST["description"]);  
      $category = mysqli_real_escape_string($connect, $_POST["category"]);  
      $subcategory = mysqli_real_escape_string($connect, $_POST["subcategory"]);  
      if($_POST["accountnumber"] != '')  
      {  
           $query = "  
           UPDATE chartofaccounts   
           SET accountname='$accountname',   
           accountnumber='$accountnumber',   
           description='$description',   
           category = '$category',   
           subcategory = '$subcategory'   
           WHERE accountnumber='".$_POST["accountnumber"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO chartofaccounts(accountname, accountnumber, description, category, subcategory)  
           VALUES('$name', '$accountnumber', '$description', '$category', '$subcategory');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM chartofaccounts ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Account Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["accountname"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["accountnumber"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["accountnumber"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 
 ?>