
<head>
<style type="text/css">
    <!--
    .tab { margin-left: 40px; }
    -->
</style>
    <style>
        {box-sizing: border-box;}

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php include('config.php')?>
<?php


// Query for a list of all existing files
//$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
//$sql = 'SELECT `id`, `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created`, status FROM `file2`';
//$sql = 'SELECT `TranID`, `Account`, `CredOrDeb`, `TranDate`, `amount` from journalEntry left join attachment on journalEntry.TranID = attachment.TranID left join JournalStatus on journalEntry.TranID = JournalStatus.TranID';
//$sql2 = 'SELECT `TranID`, `mime`, `size`, `data` from attachment';
//$sql3 = 'SELECT `TranID`, `TranStatus`, `Reason` from JournalStatus';
$sql = 'SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID order by TranID DESC, CredOrDeb DESC';


//$result = $conn->query($sql);
$result = $conn->query($sql);
//$result2 = $conn->query($sql2);
//$result3 = $conn->query($sql3);

// Check if it was successfull
if($result /*&& $result2 && $result3*/) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {

        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Date</b></td>
                    <td><b>Accounts</b></td>
                    <td><b>Reference</b></td>
                    <td><b>Debits</b></td>
                    <td><b>Credits</b></td>
                    <td><b>Status</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';

        // Print each file
        $rowPrime = 0;
        while($row = $result->fetch_assoc()) {


            if ($row['TranID'] == $rowPrime){
                if ($row['CredOrDeb'] == "Debit"){
                    echo "
                    <tr>
                        <td></td>
                        <td>{$row['Account']}</td>
                        <td></td>
                        <td>{$row['amount']}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    ";
                }
                else {
                    echo "
                        <tr>
                            <td></td>
                            <td><p class=\"tab\">{$row['Account']}</p></td>       
                            <td></td>
                            <td></td>
                            <td>{$row['amount']}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    ";
                }

            }
            else {
                $rowPrime = intval($row['TranID']);
                echo "
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td>{$row['TranDate']}</td>
                ";
                        $strtype = strval($row['CredOrDeb']);
                        if ($strtype == "Debit"){
                            echo "<td>{$row['Account']}</td>";
                        }
                        else "<td></td>";

                            echo "
                    
                    <td>{$row['TranID']}</td>
                    <td>{$row['amount']}</td>
                    <td></td>
                    ";
                         if($row['TranStatus'] == "Pending" /*&& Role = Manager*/){
                             $parameter = $row['TranID'];
                             echo "<td><form action='updateStatus.php'><input type=\"submit\" name=\"approveButton{$row['TranID']}\" value=\"Approve\" id=\"{$parameter}\" /><input type=\"submit\" name=\"rejectButton{$row['TranID']}\" value=\"Reject\" id=\"{$parameter}\"/></form></td>";
                         }
                         else echo "<td>{$row['TranStatus']}</td>";

                    //<td><a>{$row['TranStatus']}</a></td>
                echo "
                        <td><a href=''>Edit</a></td>
                    <td><a href='get_file.php?id={$row['TranID']}'>Download Attachment</a></td>
                </tr>
                ";


            }

            /*
                echo "
                    <tr>
                        <td>{$row['name']}</td>
                        <td>{$row['mime']}</td>
                        <td>{$row['size']}</td>
                        <td>{$row['created']}</td>
                        <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                    </tr>";
                */

            /*
            echo "
            <tr>
                    <td>{$row['TranDate']}</td>
                    ";

                        if ($row['CredOrDeb'] = "Debit"){
                            echo "<td>{$row['Account']}</td>";
                        }
                        else "<td></td>";

                            echo "
                    
                    <td>{$row['TranID']}</td>
                    <td>{$row['amount']}</td>
                    <td></td>
                    <td><a>{$row['TranStatus']}</a></td>
                        
                    <td><a href='get_file.php?id={$row['TranID']}'>Download Attachment</a></td>
                </tr>
                
                <tr>
                    <td></td>
                    ";
                        if ($row['CredOrDeb'] = "Credit"){
                            echo "<td><p class=\"tab\">{$row['Account']}</p></td>";
                        }
                        else "<td></td>";

                            echo "
                            
                    <td></td>
                    
                    <td></td>
                    ";
                            if ($row['CredOrDeb'] = "Credit"){
                                echo "<td>{$row['amount']}</td>";
                            }
                            else echo "<td></td>";
                            echo "
                    <td></td>
                    <td><a href=''>Edit</a></td>
                </tr>
                <tr></tr>
                ";
            */
        }

        // Close table
        echo '</table>';
    }

    // Free the result
    $result->free();

}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$conn->error}</pre>";
}

// Close the mysql connection
$conn->close();
?>
<?php
    function editEntry($accountID){
        $sql = 'SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID order by TranID DESC, CredOrDeb DESC where journalEntry.account = ' + $accountID;

        echo "
        
        <div class=\"form-popup\" id=\"myForm\">
    <form action=\"/action_page.php\" class=\"form-container\">
        <h1>Login</h1>

        <label for=\"email\"><b>Account</b></label>
        <input type=\"text\" placeholder=\"Enter Email\" name=\"email\" required>

        <label for=\"psw\"><b>Password</b></label>
        <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\" required>

        <button type=\"submit\" class=\"btn\">Login</button>
        <button type=\"submit\" class=\"btn cancel\" onclick=\"closeForm()\">Close</button>
    </form>
</div>
";
    }


?>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>



</body>
