<?php include('config.php') ?>
<?php
    $query = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
    $row = $sql->fetch_assoc();
?>

</body>
</html>