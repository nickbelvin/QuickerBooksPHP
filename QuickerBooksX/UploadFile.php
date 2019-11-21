<!--TEST TWO-->

<?php // include('config.php')?>
<?php //include('Journalizing.php')?>
<?php include('AddAccountEntry.php') ?>
<?php
// Check if a file has been uploaded
if(isset($_POST['submit'])) {
    // Make sure the file was sent without errors
    $counter = $_POST['counterHolder'];
        // Gather all required data
    if($_FILES['uploaded_file']['error'] == 0) {
        $name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $conn->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
    }

        //Set TranID based on last used one
        $TranIDQuery = mysqli_query($conn, "SELECT TranID FROM journalEntry order by TranID desc limit 1");
        $row=$TranIDQuery->fetch_assoc();
        $TranID = $row['TranID'] + 1;

    $creditTotal = 0;
    $debitTotal = 0;



        //setting amounts to correct format for sql
    if (true) {
        if (isset($_POST['amount1'])) {
            $amount1 = $_POST['amount1']; //Amount for transaction
            $amount1 = ltrim($amount1, '$');
            $temp = str_replace(',', '', $amount1);
            if (is_numeric($temp)) {
                $amount1 = $temp;
            }
        }
        if (isset($_POST['amount2'])) {
            $amount2 = $_POST['amount2'];
            $amount2 = ltrim($amount2, '$');
            $temp = str_replace(',', '', $amount2);
            if (is_numeric($temp)) {
                $amount2 = $temp;
            }
        }
        if (isset($_POST['amount3'])) {
            $amount3 = $_POST['amount3'];
            $amount3 = ltrim($amount3, '$');
            $temp = str_replace(',', '', $amount3);
            if (is_numeric($temp)) {
                $amount3 = $temp;
            }
        }
        if (isset($_POST['amount4'])) {
            $amount4 = $_POST['amount4'];
            $amount4 = ltrim($amount4, '$');
            $temp = str_replace(',', '', $amount4);
            if (is_numeric($temp)) {
                $amount4 = $temp;
            }
        }
        if (isset($_POST['amount5'])) {
            $amount5 = $_POST['amount5'];
            $amount5 = ltrim($amount5, '$');
            $temp = str_replace(',', '', $amount5);
            if (is_numeric($temp)) {
                $amount5 = $temp;
            }
        }
        if (isset($_POST['amount6'])) {
            $amount6 = $_POST['amount6'];
            $amount6 = ltrim($amount6, '$');
            $temp = str_replace(',', '', $amount6);
            if (is_numeric($temp)) {
                $amount6 = $temp;
            }
        }
        if (isset($_POST['amount7'])) {
            $amount7 = $_POST['amount7'];
            $amount7 = ltrim($amount7, '$');
            $temp = str_replace(',', '', $amount7);
            if (is_numeric($temp)) {
                $amount7 = $temp;
            }
        }
        if (isset($_POST['amount8'])) {
            $amount8 = $_POST['amount8'];
            $amount8 = ltrim($amount8, '$');
            $temp = str_replace(',', '', $amount8);
            if (is_numeric($temp)) {
                $amount8 = $temp;
            }
        }
        if (isset($_POST['amount9'])) {
            $amount9 = $_POST['amount9'];
            $amount9 = ltrim($amount9, '$');
            $temp = str_replace(',', '', $amount9);
            if (is_numeric($temp)) {
                $amount9 = $temp;
            }
        }
        if (isset($_POST['amount10'])) {
            $amount10 = $_POST['amount10'];
            $amount10 = ltrim($amount10, '$');
            $temp = str_replace(',', '', $amount10);
            if (is_numeric($temp)) {
                $amount10 = $temp;
            }
        }
        if (isset($_POST['amount11'])) {
            $amount11 = $_POST['amount11'];
            $amount11 = ltrim($amount11, '$');
            $temp = str_replace(',', '', $amount11);
            if (is_numeric($temp)) {
                $amount11 = $temp;
            }
        }
        if (isset($_POST['amount12'])) {
            $amount12 = $_POST['amount12'];
            $amount12 = ltrim($amount12, '$');
            $temp = str_replace(',', '', $amount12);
            if (is_numeric($temp)) {
                $amount12 = $temp;
            }
        }
        if (isset($_POST['amount13'])) {
            $amount13 = $_POST['amount13'];
            $amount13 = ltrim($amount13, '$');
            $temp = str_replace(',', '', $amount13);
            if (is_numeric($temp)) {
                $amount13 = $temp;
            }
        }
        if (isset($_POST['amount14'])) {
            $amount14 = $_POST['amount14'];
            $amount14 = ltrim($amount14, '$');
            $temp = str_replace(',', '', $amount14);
            if (is_numeric($temp)) {
                $amount14 = $temp;
            }
        }
        if (isset($_POST['amount15'])) {
            $amount15 = $_POST['amount15'];
            $amount15 = ltrim($amount15, '$');
            $temp = str_replace(',', '', $amount15);
            if (is_numeric($temp)) {
                $amount15 = $temp;
            }
        }
    }

        //Setting TranTypes and adding values to check credits and debits are balanced

        if (isset($_POST['TranType1'])) {
            $TranType1 = $_POST['TranType1'];
            if($TranType1 == "Debit"){
                $debitTotal += $amount1;
            }
            else {
                $creditTotal += $amount1;
            }
        }
        if (isset($_POST['TranType2'])) {
            $TranType2 = $_POST['TranType2'];
            if($TranType2 == "Debit"){
                $debitTotal += $amount2;
            }
            else {
                $creditTotal += $amount2;
            }
        }
        if (isset($_POST['TranType3'])) {
            $TranType3 = $_POST['TranType3'];
            if($TranType3 == "Debit"){
                $debitTotal += $amount3;
            }
            else {
                $creditTotal += $amount3;
            }
        }
        if (isset($_POST['TranType4'])) {
            $TranType4 = $_POST['TranType4'];
            if($TranType4 == "Debit"){
                $debitTotal += $amount4;
            } else $creditTotal += $amount4;
        }
        if (isset($_POST['TranType5'])) {
            $TranType5 = $_POST['TranType5'];
            if($TranType5 = "Debit"){
                $debitTotal += $amount5;
            } else $creditTotal += $amount5;
        }
        if (isset($_POST['TranType6'])) {
            $TranType6 = $_POST['TranType6'];
            if($TranType6 = "Debit"){
                $debitTotal += $amount6;
            } else $creditTotal += $amount6;
        }
        if (isset($_POST['TranType7'])) {
            $TranType7 = $_POST['TranType7'];
            if($TranType7 = "Debit"){
                $debitTotal += $amount7;
            } else $creditTotal += $amount7;
        }
        if (isset($_POST['TranType8'])) {
            $TranType8 = $_POST['TranType8'];
            if($TranType8 = "Debit"){
                $debitTotal += $amount8;
            } else $creditTotal += $amount8;
        }
        if (isset($_POST['TranType9'])) {
            $TranType9 = $_POST['TranType9'];
            if($TranType9 = "Debit"){
                $debitTotal += $amount9;
            } else $creditTotal += $amount9;
        }
        if (isset($_POST['TranType10'])) {
            $TranType10 = $_POST['TranType10'];
            if($TranType10 = "Debit"){
                $debitTotal += $amount10;
            } else $creditTotal += $amount10;
        }
        if (isset($_POST['TranType11'])) {
            $TranType11 = $_POST['TranType11'];
            if($TranType11 = "Debit"){
                $debitTotal += $amount11;
            } else $creditTotal += $amount11;
        }
        if (isset($_POST['TranType12'])) {
            $TranType12 = $_POST['TranType12'];
            if($TranType12 = "Debit"){
                $debitTotal += $amount12;
            } else $creditTotal += $amount12;
        }
        if (isset($_POST['TranType13'])) {
            $TranType13 = $_POST['TranType13'];
            if($TranType13 = "Debit"){
                $debitTotal += $amount13;
            } else $creditTotal += $amount13;
        }
        if (isset($_POST['TranType14'])) {
            $TranType14 = $_POST['TranType14'];
            if($TranType14 = "Debit"){
                $debitTotal += $amount14;
            } else $creditTotal += $amount14;
        }
        if (isset($_POST['TranType15'])) {
            $TranType15 = $_POST['TranType15'];
            if($TranType15 = "Debit"){
                $debitTotal += $amount15;
            } else $creditTotal += $amount15;
        }


        //setting accounts
    if (true) {
        if (isset($_POST['account1'])) {
            $account1 = $_POST['account1'];
        }
        if (isset($_POST['account2'])) {
            $account2 = $_POST['account2'];
        }
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
        if (isset($_POST['account8'])) {
            $account8 = $_POST['account8'];
        }
        if (isset($_POST['account9'])) {
            $account9 = $_POST['account9'];
        }
        if (isset($_POST['account10'])) {
            $account10 = $_POST['account10'];
        }
        if (isset($_POST['account11'])) {
            $account11 = $_POST['account11'];
        }
        if (isset($_POST['account12'])) {
            $account12 = $_POST['account12'];
        }
        if (isset($_POST['account13'])) {
            $account13 = $_POST['account13'];
        }
        if (isset($_POST['account14'])) {
            $account14 = $_POST['account14'];
        }
        if (isset($_POST['account15'])) {
            $account15 = $_POST['account15'];
        }
    }

    function checkBalanced($creditTotal, $debitTotal){
        print($creditTotal);
        print($debitTotal);
        if($creditTotal == $debitTotal){
            return true;
        }
        else return false;
    }

    if (true/*checkBalanced($creditTotal, $debitTotal)*/) {
        $query1 = "
            INSERT INTO JournalStatus (
                `TranID`, `TranStatus`
            )
            VALUES (
                '{$TranID}', 'Pending'
            )";

        $query2 = "
            INSERT INTO attachment (
                `TranID`, `mime`, `size`, `data`, `name`
            )
            VALUES (
                '{$TranID}', '{$mime}', {$size}, '{$data}', '{$name}'
            )";

        $query3 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account1}', '{$TranType1}', '{$amount1}'
            )";

        $query4 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account2}', '{$TranType2}', '{$amount2}'
            )";


        if (isset($_POST['account3'])) {
            $query5 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account3}', '{$TranType3}', '{$amount3}'
            )";
        }

        if (isset($_POST['account4'])) {
            $query6 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account4}', '{$TranType4}', '{$amount4}'
            )";
        }

        if (isset($_POST['account5'])) {
            $query7 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account5}', '{$TranType5}', '{$amount5}'
            )";
        }

        if (isset($_POST['account6'])) {
            $query8 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account6}', '{$TranType6}', '{$amount6}'
            )";
        }

        if (isset($_POST['account7'])) {
            $query9 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account7}', '{$TranType7}', '{$amount7}'
            )";
        }
        if (isset($_POST['account8'])) {
            $query10 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account8}', '{$TranType8}', '{$amount7}'
            )";
        }
        if (isset($_POST['account9'])) {
            $query11 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account9}', '{$TranType9}', '{$amount9}'
            )";
        }
        if (isset($_POST['account10'])) {
            $query12 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account10}', '{$TranType10}', '{$amount10}'
            )";
        }
        if (isset($_POST['account11'])) {
            $query13 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account11}', '{$TranType11}', '{$amount11}'
            )";
        }
        if (isset($_POST['account12'])) {
            $query14 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account12}', '{$TranType12}', '{$amount12}'
            )";
        }
        if (isset($_POST['account13'])) {
            $query15 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account13}', '{$TranType13}', '{$amount13}'
            )";
        }
        if (isset($_POST['account14'])) {
            $query16 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account14}', '{$TranType14}', '{$amount14}'
            )";
        }
        if (isset($_POST['account15'])) {
            $query17 = "
            INSERT INTO journalEntry ( 
                `TranID`, `Account`, `CredOrDeb`, `amount`
            )
            VALUES (
                '{$TranID}', '{$account15}', '{$TranType15}', '{$amount15}'
            )";
        }

        // Execute the queries
        $result1 = $conn->query($query1);
        $result2 = $conn->query($query2);
        $result3 = $conn->query($query3);
        $result4 = $conn->query($query4);
        if (isset($_POST['account3'])) {
            $result5 = $conn->query($query5);
        }
        if (isset($_POST['account4'])) {
            $result6 = $conn->query($query6);
        }
        if (isset($_POST['account5'])) {
            $result7 = $conn->query($query7);
        }
        if (isset($_POST['account6'])) {
            $result8 = $conn->query($query8);
        }
        if (isset($_POST['account7'])) {
            $result9 = $conn->query($query9);
        }
        if (isset($_POST['account8'])) {
            $result10 = $conn->query($query10);
        }
        if (isset($_POST['account9'])) {
            $result11 = $conn->query($query11);
        }
        if (isset($_POST['account10'])) {
            $result12 = $conn->query($query12);
        }
        if (isset($_POST['account11'])) {
            $result13 = $conn->query($query13);
        }
        if (isset($_POST['account12'])) {
            $result14 = $conn->query($query14);
        }
        if (isset($_POST['account13'])) {
            $result15 = $conn->query($query15);
        }
        if (isset($_POST['account14'])) {
            $result16 = $conn->query($query16);
        }
        if (isset($_POST['account15'])) {
            $result17 = $conn->query($query17);
        }

        // Check if it was successful
        if ($result3 && $result2 && result1 && result4) {
            echo 'Success! Your journal entry was successfully added!';
        } else {
            echo 'Error! Failed to create journal entry'
                . "<pre>{$conn->error}</pre>";
        }
    }
    else{
        echo 'The Debits and Credits are not balanced!';
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

