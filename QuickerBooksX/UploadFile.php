<!--TEST TWO-->

<?php // include('config.php')?>
<?php include('Journalizing.php')?>
<?php
// Check if a file has been uploaded
if(isset($_POST['submit'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {


        // Gather all required data
        $name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $conn->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);

        $TranIDQuery = mysqli_query($conn, "SELECT TranID FROM journalEntry order by TranID desc limit 1");
        $row=$TranIDQuery->fetch_assoc();
        $TranID = $row['TranID'] + 1;

        //setting amounts
        $amount1 = $_POST['amount1']; //Amount for transaction
        $amount2 = $_POST['amount2'];
        if (isset($_POST['amount3'])) {
            $amount3 = $_POST['amount3'];
        }
        if (isset($_POST['amount4'])) {
            $amount4 = $_POST['amount4'];
        }
        if (isset($_POST['amount5'])) {
            $amount5 = $_POST['amount5'];
        }
        if (isset($_POST['amount6'])) {
            $amount6 = $_POST['amount6'];
        }
        if (isset($_POST['amount7'])) {
            $amount7 = $_POST['amount7'];
        }

        $amount1 = ltrim($amount1, '$');
        $amount2 = ltrim($amount2, '$');
        $amount1 = ltrim($amount1, ',');
        $amount2 = ltrim($amount2, ',');

        $AccDebited = $_POST['AccDebited'];
        $AccCredited = $_POST['AccCredited'];

        //Setting trantypes
        $TranType1 = $_POST['TranType1'];
        $TranType2 = $_POST['TranType2'];
        if (isset($_POST['TranType3'])) {
            $TranType3 = $_POST['TranType3'];
        }
        if (isset($_POST['TranType4'])) {
            $TranType4 = $_POST['TranType4'];
        }
        if (isset($_POST['TranType5'])) {
            $TranType5 = $_POST['TranType5'];
        }
        if (isset($_POST['TranType6'])) {
            $TranType6 = $_POST['TranType6'];
        }
        if (isset($_POST['TranType7'])) {
            $TranType7 = $_POST['TranType7'];
        }

        //setting accounts
        $account1 = $_POST['account1'];
        $account2 = $_POST['account2'];
       if (isset($_POST['account3'])) {
           $account3 = $_POST['account3'];
       }
        if (isset($_POST['account4'])) {
           $account4 = $_POST['account4'];
       }
        if (isset($_POST['account5'])) {
            $account5 = $_POST['account5'];
        }
        if (isset($_POST['account6'])) {
            $account6 = $_POST['account6'];
        }
        if (isset($_POST['account7'])) {
            $account7 = $_POST['account7'];
        }


        // Create the SQL query
/*
       $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
*/

        //old
        /*
        $query2 = "
            INSERT INTO `file2` (
                `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created`, `status`
            )
            VALUES (
                '{$name}', '{$TranID}', '{$amount}', {$AccDebited}, '{$AccCredited}', '{$mime}', {$size}, '{$data}', NOW(), 'Pending'
            )";
        */

        //new
        $query3 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account1}', '{$TranType1}', '{$amount1}'
            )";

        $query6 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account2}', '{$TranType2}', '{$amount2}'
            )";


        if (isset($_POST['account3'])) {
            $query7 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account3}', '{$TranType3}', '{$amount3}'
            )";
        }

        if (isset($_POST['account4'])) {
            $query8 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account4}', '{$TranType4}', '{$amount4}'
            )";
        }

        if (isset($_POST['account5'])) {
            $query9 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account5}', '{$TranType5}', '{$amount5}'
            )";
        }

        if (isset($_POST['account6'])) {
            $query10 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account6}', '{$TranType6}', '{$amount6}'
            )";
        }

        if (isset($_POST['account7'])) {
            $query11 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account7}', '{$TranType7}', '{$amount7}'
            )";
        }

        $query4 = "
            INSERT INTO attachment (
                `TranID`, `mime`, `size`, `data`, `name`
            )
            VALUES (
                '{$TranID}', '{$mime}', {$size}, '{$data}', '{$name}'
            )";

        $query5 = "
            INSERT INTO JournalStatus (
                `TranID`, `TranStatus`
            )
            VALUES (
                '{$TranID}', 'Pending'
            )";


        // Execute the query
//        $result = $conn->query($query);
       // $result = $conn->query($query2);//changed to query2 from query
        $result3 = $conn->query($query3);
        $result4 = $conn->query($query4);
        $result5 = $conn->query($query5);
        $result6 = $conn->query($query6);

        // Check if it was successful
        if($result3 && $result4 && result5 && result6) {
            echo 'Success! Your journal entry was successfully added!';
        }
        else {
            echo 'Error! Failed to create journal entry'
                . "<pre>{$conn->error}</pre>";
        }
    }
    else {
        echo 'An error occurred while the file was being uploaded. '
            . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }

    // Close the mysql connection
    $conn->close();
}
else {
    echo 'Error! Entry was not created!';
}

// Echo a link back to the main page
echo '<p>Click <a href="Journalizing.php">here</a> to go back</p>';
?>

