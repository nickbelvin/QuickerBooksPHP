<?php include('ListFiles.php'); ?>
<?php



if($_POST['approveButton'])
{
    $TranID = $_POST['hiddenData'];
    $sqlScript = "UPDATE JournalStatus SET TranStatus = 'Approved' WHERE TranID = {$TranID}";
   // $result = $conn->query($sqlScript);

    //$TranIDQuery = mysqli_query($conn, "SELECT TranID FROM journalEntry order by TranID desc limit 1");
    $result=$conn->query($sqlScript);
    if($result){
        echo "Journal Entry was Successfully Updated!";
    }
    else echo "Failed to update journal entry. Contact Support" . "<pre>{$conn->error}</pre>";
    header("Refresh:0");
}
if($_POST['rejectButton'])
{
    $TranID = $_POST['hiddenData'];
    echo "<form method='post' action='updateReason.php' value=''>
          <input type='text' name='reason' id='reason-field' value='' placeholder='Reason for Rejecting' />
          <input type=\"submit\" name=\"reasonSubmit\" value=\"Reject\" />
          <input type='hidden' name='reasonHiddenText' value='{$TranID}' />
          </form>";

}

?>