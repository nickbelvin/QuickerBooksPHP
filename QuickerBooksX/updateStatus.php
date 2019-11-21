<?php include('ListFiles.php'); ?>
<!DOCTYPE html>
<head>
    <title>Update Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php



if(isset($_POST['approveButton']))
{
    $TranID = $_POST['hiddenData'];
    $sqlScript = "UPDATE JournalStatus SET TranStatus = 'Approved' WHERE TranID = {$TranID}";
   // $result = $conn->query($sqlScript);

    //$TranIDQuery = mysqli_query($conn, "SELECT TranID FROM journalEntry order by TranID desc limit 1");
    $result=$conn->query($sqlScript);
    if($result){
        echo "Journal Entry was Successfully Updated! Click <a href='ListFiles.php'>Here</a> to refresh the page.";
    }
    else echo "Failed to update journal entry. Contact Support" . "<pre>{$conn->error}</pre>";
    //header("Refresh:0");
}
if(isset($_POST['rejectButton']))
{
    $TranID = $_POST['hiddenData'];
    echo "<form method='post' action='updateReason.php' value=''>
          <input type='text' name='reason' id='reason-field' value='' placeholder='Reason for Rejecting' />
          <input type=\"submit\" name=\"reasonSubmit\" value=\"Reject\" />
          <input type='hidden' name='reasonHiddenText' value='{$TranID}' />
          </form>";

}

?>
</body>
</html>
