<?php include('Journalizing.php') ?>
<?php
if($_POST['addAccount']) {
        $accountCount = $_POST['accountCount'] + 1;
    echo "<form method='post' action='updateJournal.php' >";

         echo "
                <div name='Account{$accountCount}'>
                    <label>Account {$accountCount}</label>
                    <select name=\"account{$accountCount}\" id=\"account1\">
                        <option value='' disabled selected>Select Account</option>
            ";
        $sql2 = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
        while ($row2 = $sql2->fetch_assoc()) {
            echo "<option value=\"{$row2['accountnumber']}: {$row2['accountname']}\">" . $row2['accountnumber'] . ": " . $row2['accountname'] . "</option>";
        }
        echo "
                    </select>
                    <input type=\"text\" name=\"amount{$accountCount}\" id=\"currency-field\" pattern=\"^\$\d{1,3}(,\d{3})*(\.\d+)?$\" value=\"\" data-type=\"currency\" placeholder=\"$0.00\">
                    <!--put money script here if it wont work anywhere else-->
                    <select name=\"TranType{$accountCount}\">
                        <option value=\"{$row['CredOrDeb']}\" disabled selected>Credit Or Debit</option>
                        <option value=\"Debit\">Debit</option>
                        <option value=\"Credit\">Credit</option>
                    </select>
                    <form method='post' action='AddAccountEntry.php'>
                    <input type='submit' name='addAccount' value='Add Account' />
                    </form>
                    <input type='hidden' name='account{$accountCount}ID' value='{$row['ID']}' />
                </div>
                </form>
            ";

}
?>