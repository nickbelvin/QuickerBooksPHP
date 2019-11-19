<?php include('ListFiles.php') ?>
<?php
    if($_POST['reasonSubmit']) {
        $TranID = $_POST['reasonHiddenText'];
        $reason = $_POST['reason'];
        $sqlScript = "UPDATE JournalStatus SET TranStatus = 'Rejected', Reason = {$reason} WHERE TranID = {$TranID}";
        $result = $conn->query($sqlScript);
        if($result){
            echo "Journal Entry was Successfully Updated!";
        }
        else echo "Failed to update journal entry. Contact Support" . "<pre>{$conn->error}</pre>";
        header('Location:' . BASE_URL . 'ListFiles.php');

    }
?>
