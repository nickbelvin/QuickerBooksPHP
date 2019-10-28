<!--
/*
TODO:
    Create Journalizing UI
    allow multiple debits
    ensure credits and debits are balanced
    ensure the same account isn't used twice
    send requests to Manager
    Research attaching documents
    Edit existing journal entries, to save and view
    delete journal entries
    create journal database
*/

/*
Journal Database Details:
    TranID int (auto-incremented)(for keeping multiple parts of a single transaction together)
    Amount
    DebAccNum int
    CredAccNum int
    Date (DDMMYYYY)
    Filename
    Status (Approved, Declined, Pending)
*/

/*
Error Message Table
ErrorID int
Error Message varchar(150)

Also make another table that logs when the messages are thrown for admin use
*/

/*
Logs table

*/

/* Dynamic sql builder

unset($sql);

if ($stationFilter) {
    $sql[] = " STATION_NETWORK = '$stationFilter' ";
}
if ($verticalFilter) {
    $sql[] = " VERTICAL = '$verticalFilter' ";
}

$query = "SELECT * FROM $tableName";

if (!empty($sql)) {
    $query .= ' WHERE ' . implode(' AND ', $sql);
}

echo $query;
// mysql_query($query);

*/
-->
<?php
    include('config.php');
    //session_start();
?>
<?php
if (isset($_POST['login'])) {

    $amount = $_POST(amount); //Amount for transaction
    $AccDebited = $_POST(AccDebited); //Debited Account
    $AccCredited = $_POST(AccCredited); //Credited Account
    $DocPath = $_POST(DocPath); //Attached document file path

//mysql query to write journal entry to the database

    /*
        function deleteFromJournal(){

        }
    */

    //too add an entry to the journal database
    //  function addToJournal(/*$connection, $amount, $AccDebited, $AccCredited, $DocPath*/){
    $query = $conn->prepare("INSERT INTO JournalEntry(TranID,amount,AccDebited,AccCredited,TranDate,DocPath,TranStatus) 
                                    VALUES (:TranID,:amount,:AccDebited,:AccCredited,:TranDate,:DocPath,'Pending')");
    $query->bindParam("amount", $amount, PDO::PARAM_STR);
    $query->execute();
    //  }
    /*
        function editJournalEntry(){
            //open pre filled edit page for transaction
        }

        function logChange(){

        }
    */
}
?>



<!--FAILED TEST-->
<?php
/*
$name= $_FILES[file][name];
$tmp_name= $_FILES[file][tmp_name];
$submitbutton= $_POST[submit];
$position= strpos($name, ".");
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);
$description= $_POST[description_entered];

if (isset($name)) {

    $path= 'Uploads/files/';

    if (!empty($name)){
        if (move_uploaded_file($tmp_name, $path.$name)) {
            echo 'Uploaded!';

        }
    }
}
?>

<?php


if(!empty($name)){
    $TranID = mysqli_query("SELECT TranID FROM journal order by TranID desc limit 1") + 1;
    $query2 = $conn->prepare("INSERT INTO journal (TranID,Amount,DebAccNum,CredAccNum,Filename,TranStatus)
VALUES (:TranID, :amount, :AccDebited, :AccCredited, :filename, 'Pending')");
    $query2->bindParam("TranID", $TranID, PDO::PARAM_INT);
    $query2->bindParam("amount", $amount, PDO::PARAM_INT);
    $query2->bindParam("AccDebited", $AccDebited, PDO::PARAM_INT);
    $query2->bindParam("AccCredited", $AccCredited, PDO::PARAM_INT);
    $query2->bindParam("filename", $name, PDO::PARAM_STR);
    $query2->execute();
}



?>

<?php


$result= mysqli_query( "SELECT * FROM journal ORDER BY ID desc" );

print "<table border=1>\n";
while ($row = ($result)){
    $files_field= $row['filename'];
    $files_show= "Uploads/files/$files_field";
    $descriptionvalue= $row['description'];
    print "<tr>\n";
    print "\t<td>\n";
    echo "<font face=arial size=4/>$descriptionvalue</font>";
    print "</td>\n";
    print "\t<td>\n";
    echo "<div align=center><a href='$files_show'>$files_field</a></div>";
    print "</td>\n";
    print "</tr>\n";
}
print "</table>\n";
*/
?>

<!DOCTYPE html>
<head>
    <title>MySQL file upload example</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<form action="UploadFile.php" method="post" enctype="multipart/form-data">
    <div class="form-element">
        <label>Amount</label>
        <input type="number" name="amount" required />
    </div>
    <div class="form-element">
        <label>Debited Account</label>
        <input type="text" name="AccDebited" required />
    </div>
    <div class="form-element">
        <label>Credited Account</label>
        <input type="text" name="AccCredited" required />
    </div>
    <div>
    <input type="file" name="uploaded_file"><br>
    <input type="submit" value="Upload file">
    </div>
</form>
<p>
    <a href="ListFiles.php">See all files</a>
</p>
</body>
</html>


<!--
<head>
    <link rel="stylesheet" href="journalizing.css">
</head>
<form method="post" action="UploadFile.php" name="JournalEntry-form" enctype="multipart/form-data">
    <div class="form-element">
        <label>Amount</label>
        <input type="number" name="amount" required />
    </div>
    <div class="form-element">
        <label>Debited Account</label>
        <input type="text" name="AccDebited" required />
    </div>
    <div class="form-element">
        <label>Credited Account</label>
        <input type="text" name="AccCredited" required />
    </div>
    <div>
    <label for='uploaded_file'>Select A File To Upload:</label>

    <input type="file" name="file">
    </div>
    <button type="submit" name="submit" value="submit">Submit</button>
</form>
-->
<!--
<form action="#file" method='post' enctype="multipart/form-data">
    Description of File: <input type="text" name="description_entered"/><br><br>
    <input type="file" name="file"/><br><br>

    <input type="submit" name="submit" value="Upload"/>

</form>
-->