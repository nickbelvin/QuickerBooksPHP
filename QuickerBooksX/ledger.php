<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('ListFiles.php')?>
<?php

$ledgercount = $_POST['ledgercount'];
$accounts = $_POST['LedgerAccount'];
$sql = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, JournalStatus.TranStatus 
        from journalEntry left join (JournalStatus) on JournalStatus.TranID = journalEntry.TranID where journalEntry.Account = '{$accounts}' ";
$balance = 0;
$result = $conn->query($sql);
print($accounts);
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no entries for this account</p>';
    }
    else {

        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Date</b></td>
                    <td><b>Reference</b></td>
                    <td><b>Memo</b></td>
                    <td><b>Debits</b></td>
                    <td><b>Credits</b></td>
                    <td><b>Balance</b></td>
                </tr>';

        // Print each file

        while($row = $result->fetch_assoc()) {



                if ($row['CredOrDeb'] == "Debit"){
                    $balance =+ doubleval($row['amount']);
                echo "
                    <tr>
                        <td>{$row['TranDate']}</td>
                        <td>{$row['TranID']}</td>
                        <td></td>
                        <td>{$row['amount']}</td>
                        <td></td>
                        <td>{$balance}</td>
                    </tr>
                    ";
                }
                if ($row['CredOrDeb'] == "Credit"){
                    $balance =+ doubleval($row['amount']);
                    echo "
                        <tr>
                            <td>{$row['TranDate']}</td>
                            <td>{$row['TranID']}</td>
                            <td></td>
                            <td></td>
                            <td>{$row['amount']}</td>
                            <td>{$balance}</td>
                        </tr>
                        ";
                }


            /*
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
                    <td><a>{$row['TranStatus']}</a></td>
                        <td><a href=''>Edit</a></td>
                    <td><a href='get_file.php?id={$row['TranID']}'>Download Attachment</a></td>
                </tr>
                ";


            }
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

//$conn->close();
?>

</body>
</html>
