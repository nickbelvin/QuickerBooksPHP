<?php include('ListFiles.php')?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "$" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

    </script>
</head>
<body>

<?php

$ledgercount = $_POST['ledgercount'];
$accounts = $_POST['LedgerAccount'];
$sql = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, JournalStatus.TranStatus 
        from journalEntry left join (JournalStatus) on JournalStatus.TranID = journalEntry.TranID where (journalEntry.Account = '{$accounts}' AND JournalStatus.TranStatus = 'Approved') ";
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
        $temp = preg_replace("/[^0-9]/", "", strval($accounts) );
        $accountnum = intval($temp);

        while($row = $result->fetch_assoc()) {

                $sql2 = "SELECT category FROM chartofaccounts WHERE accountnumber = {$accountnum}";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();



                if ($row['CredOrDeb'] == "Debit"){
                    if($row2['category'] == ("Assets" || "Expenses")){
                        if($row['CredOrDeb'] = "Debit"){
                            $balance += doubleval($row['amount']);
                        }
                        else $balance -= doubleval($row['amount']);
                    }
                    else {
                        if($row['CredOrDeb'] = "Credit"){
                            $balance += doubleval($row['amount']);
                        }
                        else $balance -= doubleval($row['amount']);
                    }
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
                    if($row2['category'] == ("Assets" || "Expenses")){
                        if($row['CredOrDeb'] = "Debit"){
                            $balance += doubleval($row['amount']);
                        }
                        else $balance -= doubleval($row['amount']);
                    }
                    else {
                        if($row['CredOrDeb'] = "Credit"){
                            $balance += doubleval($row['amount']);
                        }
                        else $balance -= doubleval($row['amount']);
                    }
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
        }

        // Close table
        echo '</table>';
    }
    echo '<p>Click <a href="ListFiles.php">here</a> to go back</p>';

    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$conn->error}</pre>";
}

?>

</body>
