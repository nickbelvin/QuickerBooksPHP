<?php include('config.php') ?>
<?php

            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            $sql = "SELECT journalEntry.TranID, journalEntry.account, journalEntry.amount, journalEntry.CredOrDeb, JournalStatus.TranStatus from journalEntry left join JournalStatus.TranID = journalEntry.TranID where account = ";
            $result = $conn->query($sql);
            print(strval($actual_link));




?>