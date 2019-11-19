<?php include('ListFiles.php') ?>


<?php
if($_POST['editJournalButton'])
{
    $TranID = $_POST['hiddenData'];
    $sql = "SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, 
                    journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, 
                    JournalStatus.Reason 
             FROM journalEntry 
             left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID 
                                                    AND JournalStatus.TranID = journalEntry.TranID 
             WHERE journalEntry.TranID = {$TranID} 
             order by CredOrDeb DESC";

    //$sqlScript = "UPDATE JournalStatus SET TranStatus = 'Approved' WHERE TranID = {$TranID}";

    $result=$conn->query($sql);
    if($result){
        $accountCount = 1;
        echo "<form method='post' action='updateJournal.php' >";
        while ($row = $result->fetch_assoc()) {
            echo "
                <div name='Account{$accountCount}'>
                    <label>Account {$accountCount}</label>
                    <select name=\"account{$accountCount}\" id=\"account1\">
                        <option value='{$row['Account']}' selected>{$row['Account']}</option>
            ";
                        $sql2 = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
                        while ($row2 = $sql2->fetch_assoc()) {
                            echo "<option value=\"{$row2['accountnumber']}: {$row2['accountname']} \">" . $row2['accountnumber'] . ": " . $row2['accountname'] . "</option>";
                        }
            echo "
                    </select>
                    <input type=\"text\" name=\"amount{$accountCount}\" id=\"currency-field\" pattern=\"^\$\d{1,3}(,\d{3})*(\.\d+)?$\" value=\"\" data-type=\"currency\" placeholder=\"{$row['amount']}\">
                    <!--put money script here if it wont work anywhere else-->
                    <select name=\"TranType{$accountCount}\">
                        <option value=\"{$row['CredOrDeb']}\" selected>{$row['CredOrDeb']}</option>
                        <option value=\"Debit\">Debit</option>
                        <option value=\"Credit\">Credit</option>
                    </select>
                    <input type='hidden' name='account{$accountCount}ID' value='{$row['ID']}' />
                </div>
            ";
                        $accountCount++;
        }
        echo "
                <input type=\"submit\" name=\"cancelButton\" value=\"Cancel\" /> 
                <input type=\"submit\" name=\"submitButton\" value=\"Submit Changes\" /> 
                <input type='hidden' name='AccountCount' value='{$accountCount}' />
            </form>
        ";
    }
    else echo "Journal Entry not found. Contact Support" . "<pre>{$conn->error}</pre>";
    //header("Refresh:0");
}

?>

