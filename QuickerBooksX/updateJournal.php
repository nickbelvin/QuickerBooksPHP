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
if(isset($_POST['cancelButton'])){
    echo "<script>myFunction()</script>";
    //header('Location: ' . BASE_URL . 'ListFiles.php');
}

if(isset($_POST['submitButton'])){
    $updatedAccountCount = 1;
    $AccountCount = $_POST['AccountCount'];
    while ($updatedAccountCount < $AccountCount) {
        $accountIDGet = $_POST['account' . $updatedAccountCount . 'ID'];
        $Account = $_POST['account' . $updatedAccountCount];
        $TranType = $_POST['TranType'. $updatedAccountCount];
        $amount = $_POST['amount' . $updatedAccountCount];
        $amount = ltrim($amount, '$');
        $temp = str_replace(',', '', $amount);
        if (is_numeric($temp)) {
            $amount = $temp;
        }


        $updateSql = "UPDATE journalEntry SET Account = '{$Account}', CredOrDeb = '{$TranType}', amount = {$amount} WHERE ID = {$accountIDGet}";
        print(strval($updateSql));
        $result = $conn->query($updateSql);

        $updatedAccountCount++;
    }
    if ($result) {
        echo '<p>Journal Successfully updated! Click <a href="ListFiles.php">here</a> to go back</p>';
    }
    else echo "An error occurred. Please try again later or contact support." . "<pre>{$conn->error}</pre>";
}
?>
