<?php include('EditJournal.php') ?>
<head>
    <script>
        function myFunction()
        {
            alert("I am an alert box!"); // this is the message in ""
        }
    </script>
</head>
<?php
if($_POST['cancelButton']){
    echo "<script>myFunction()</script>";
    //header('Location: ' . BASE_URL . 'ListFiles.php');
}

if($_POST['submitButton']){
    $updatedAccountCount = 1;
    $AccountCount = $_POST['AccountCount'];
    while ($updatedAccountCount <= $AccountCount) {
        $accountIDGet = $_POST['account' . $updatedAccountCount . 'ID'];
        $updateSql = "UPDATE journalEntry SET Account = {$_POST['Account']}, CredOrDeb = {$_POST['TranType']}, amount = {$_POST['amount']} WHERE ID = {$accountIDGet}";

        $updatedAccountCount++;
    }
}
?>
