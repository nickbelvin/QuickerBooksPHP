<?php include('config.php')?>
<?php


// Query for a list of all existing files
$sql = 'SELECT * FROM `users`';
//$sql2 = 'SELECT `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created` FROM `file`';
$result = $conn->query($sql);
//$result2 = $conn->query($sql2);

// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Role ID</b></td>
                    <td><b>First Name</b></td>
                    <td><b>Last Name</b></td>
                    <td><b>Email</b></td>
                    <td><b>Phone</b></td>
                    <td><b>Password</b></td>
                    <td><b>Profile Picture</b></td>
                    <td><b>DOB</b></td>
                    <td><b>Created On</b></td>
                    <td><b>Last Edited</b></td>
                    <td><b>Status</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';

        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['role_id']}</td>
                    <td>{$row['fname']}</td>
                    <td>{$row['lname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['profile_picture']}</td>
                    <td>{$row['dob']}</td>
                    <td>{$row['created_at']}</td>
                    <td>{$row['edited_at']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
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