<!--TEST TWO-->

<?php include('config.php')?>
<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {


        // Gather all required data
        $name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $conn->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
/*      $TranID = mysqli_query("SELECT TranID FROM file2 order by TranID desc limit 1") + 1;
        $amount = $_POST(amount); //Amount for transaction
        $AccDebited = $_POST(AccDebited); //Debited Account
        $AccCredited = $_POST(AccCredited); //Credited Account
*/
        // Create the SQL query

       $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";

/*
        $query2 = "
            INSERT INTO `file2` (
                `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$TranID}', '{$amount}', {$AccDebited}, '{$AccCredited}', '{$mime}', {$size}, '{$data}', NOW()
            )";
*/

        // Execute the query
        $result = $conn->query($query);
        //$result2 = $conn->query($query2);

        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
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
    echo 'Error! A file was not sent!';
}

// Echo a link back to the main page
echo '<p>Click <a href="Journalizing.php">here</a> to go back</p>';
?>

