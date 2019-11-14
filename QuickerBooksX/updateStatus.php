<?php include('config.php'); ?>
<?php
$sql = "SELECT TranID from JournalStatus";
$results = $conn->query($sql);
while($row = $results->fetch_assoc()) {
    echo "
<script>
    $(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).approveFunction{$row['TranID']}();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert(\"action performed successfully\");
        });
    });
});
</script>
";
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['approveFunction']))
{
    $sqlScript = "UPDATE JournalStatus SET TranStatus = 'Approved' WHERE TranID = " + $TransactionID;
    $result = $conn->query($sqlScript);
    header("Refresh:0");
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['rejectFunction']))
{
    $sqlScript = "UPDATE JournalStatus SET TranStatus = 'Rejected', Reason = " + $reason + "  WHERE TranID = " + $TransactionID;
    $result = $conn->query($sqlScript);
    header("Refresh:0");
}
function rejectFunction($TransactionID, $reason){

    header("Refresh:0");
}
?>