<?php
include('config.php');
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php

function showLedger(var accountNumber){

}
// Query for a list of all existing files
//$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
$sql = 'SELECT `id`, `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created`, status FROM `file2`';
//$result = $conn->query($sql);
$result = $conn->query($sql);

// Check if it was successful
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Date</b></td>
                    <td><b>Transaction ID</b></td>
                    <td><b>Debit</b></td>
                    <td><b>Credit</b></td>
                    <td><b>Balance</b></td>
                    <td><b></b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';

        // Print each file
        while($row = $result->fetch_assoc()) {

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
            echo "
            <tr>
                    <td>{$row['created']}</td>
                    <td>{$row['AccDebited']}</td>
                    <td>{$row['amountDebited']}</td>
                    <td>{$row['created']}</td>
                    <td>{$row['name']}</td>
                    <td><a>{$row['status']}</a></td>
                        
                    <td><a href='get_file.php?id={$row['id']}'>Download Attachment</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><p class=\"tab\">{$row['AccCredited']}</p></td>
                    <td></td>
                    <td>{$row['amountCredited']}</td>
                    <td></td>
                    <td></td>
                    <td><a href=''>Edit</a></td>
                </tr>
                <tr></tr>
                ";
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
</body>

