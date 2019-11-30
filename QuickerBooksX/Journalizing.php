<?php
    //include('config.php');
?>

<!DOCTYPE html>
<head>
    <title>Journalizing</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<?php
echo "
    <p><a href='layout.php'>Return Home</a></p>
    <form method='post' name='counterForm' action='addAccountsEntry.php'>
    <select name='numOfAccountsSelect'>
";
    $counter = 1;
    while ($counter < 16){
        echo "<option value='{$counter}'>" . $counter . "</option>";
        $counter++;
    }
echo "
    <input type=\"submit\" value=\"Go To Accounts\" formaction=\"AddAccountEntry.php\" name=\"submit[]\">
    </form>
";

?>
<p>
    <!--<a href="ListFiles2.php">See all files</a>-->
</p>