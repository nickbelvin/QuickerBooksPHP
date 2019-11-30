
<head>
<style type="text/css">
    <!--
    .tab { margin-left: 40px; }
    -->
</style>
    <style>
        {box-sizing: border-box;}

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="tablesorter.mod.js"></script>
    <!--<style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>-->
    <style>
         tbody {
            padding: 10px;
            border: 1px solid black;
        }
        td{
            border-right: 1px solid black;
            border-left: 1px solid black;
        }
         button {
             background: none!important;
             border: none;
             padding: 0!important;
             /*optional*/
             font-family: arial, sans-serif;
             /*input has OS specific font-family*/
             color: #069;
             text-decoration: underline;
             cursor: pointer;
         }

    </style>

</head>
<body>
<?php include('config.php')?>

<?php
echo "<p><a href='layout.php'>Return Home</a></p>";


// Query for a list of all existing files
//$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
//$sql = 'SELECT `id`, `name`, `TranID`, `amount`, `AccDebited`, `AccCredited`, `path`, `size`, `data`, `created`, status FROM `file2`';
//$sql = 'SELECT `TranID`, `Account`, `CredOrDeb`, `TranDate`, `amount` from journalEntry left join attachment on journalEntry.TranID = attachment.TranID left join JournalStatus on journalEntry.TranID = JournalStatus.TranID';
//$sql2 = 'SELECT `TranID`, `mime`, `size`, `data` from attachment';
//$sql3 = 'SELECT `TranID`, `TranStatus`, `Reason` from JournalStatus';
$sql = 'SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID order by TranID DESC, CredOrDeb DESC';

    echo "
    <script>
        function updateStatusView(){
            
        }
        
        $('select').on('change', function() {
            this.value = \"\";
        });
    </script>
    ";


//$result = $conn->query($sql);
$result = $conn->query($sql);
//$result2 = $conn->query($sql2);
//$result3 = $conn->query($sql3);

// Check if it was successfull
if($result /*&& $result2 && $result3*/) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {

        // Print the top of a table
        echo '
                <style>
        #myInput {
            /*background-image: url(\'/css/searchicon.png\'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
        }

        #myTable {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            font-size: 18px; /* Increase font-size */
        }

        #myTable th, #myTable td {
            text-align: left; /* Left-align text */
            padding: 12px; /* Add padding */
        }

        #myTable tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #f1f1f1;
        }
    </style>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don\'t match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                <table width="100%" class="sortable" id="myTable">
                <thead>
                <tr>
                    <th width=\'12.5%\' align="center"><b>Date</b></th>
                    <th align="center" width=\'20%\'><b>Accounts</b></th>
                    <th align="center" width=\'5%\'><b>Reference</b></th>
                    <th align="center" width=\'12.5%\'><b>Debits</b></th>
                    <th align="center" width=\'12.5%\'><b>Credits</b></th>
                    <th align="center" width=\'12.5%\'><b>Status</b><!--</th>-->
                    <select value="All Statuses" onchange="updateStatusView()" name="selectStatusView"><option value="All Statuses">All Statuses</option><option value="All Approved">All Approved</option><option value="All Pending">All Pending</option><option value="All Rejected">All Rejected</option></select></th>
                    <th width=\'12.5%\'><b>&nbsp;</b></th>
                    <th width=\'12.5%\'><b>&nbsp;</b></th>
                </tr>
                </thead>
                
                <table>
                ';

        // Print each file
        $rowPrime = 0;
        $ledgercount = 0;
        while($row = $result->fetch_assoc()) {


            if ($row['TranID'] == $rowPrime){
                $amount = number_format($row['amount'], 2);
                if ($row['CredOrDeb'] == "Debit"){

                    echo "
                    <tr class='expand-child'>
                        <td width='12.5%'></td>
                        <td width='20%'><form method='post' action='ledger.php' name='ledgerform' id='ledgerform{$ledgercount}'><input type='hidden' name ='LedgerAccount' value='{$row['Account']}'/><input type='hidden' name ='ledgercount' value='{$ledgercount}'/><a onclick=\"document.getElementById('ledgerform{$ledgercount}').submit();\">{$row['Account']}</a></form></td>
                        <td width='5%'></td>
                        <td align=\"right\" width='12.5%'>{$amount}</td>
                        <td width='12.5%'></td>
                        <td width='12.5%'></td>
                    </tr>
                    ";
                    $ledgercount++;
                }
                else {
                    echo "
                        <tr class='expand-child'>
                            <td width='12.5%'></td>
                            <td width='20%'><form method='post' action='ledger.php' name='ledgerform' id='ledgerform{$ledgercount}'><input type='hidden' name ='LedgerAccount' value='{$row['Account']}'/><input type='hidden' name ='ledgercount' value='{$ledgercount}'/><a onclick=\"document . getElementById('ledgerform{$ledgercount}') . submit();\" class=\"tab\">{$row['Account']}</a></form></td>       
                            <td width='5%'></td>
                            <td width='12.5%'></td>
                            <td align=\"right\" width='12.5%'>{$amount}</td>
                            <td width='12.5%'></td>
                            <td width='12.5%'></td>
                        </tr>
                    ";
                    $ledgercount++;
                }

            }
            else {
                $rowPrime = intval($row['TranID']);
                $amount = number_format($row['amount'], 2);
                echo "
                <tr><td width='12.5%'></td></tr>
                <tr><td width='12.5%'></td></tr>
                </table>
                <table width=\"100%\">
                <tr>
                    <td width='12.5%'>{$row['TranDate']}</td>
                ";
                        $strtype = strval($row['CredOrDeb']);
                        if ($strtype == "Debit"){
                            echo "<td width='20%'><form method='post' action='ledger.php' name='ledgerform' id='ledgerform{$ledgercount}'><input type='hidden' name ='LedgerAccount' value='{$row['Account']}'/><input type='hidden' name ='ledgercount' value='{$ledgercount}'/><button type='submit' onclick=\"document.getElementById('ledgerform{$ledgercount}').submit()>{$row['Account']}</button><!--<a onclick=\"document . getElementById('ledgerform{$ledgercount}') . submit();\">{$row['Account']}</a>--></form></td>";
                            $ledgercount++;
                        }
                        else "<td width='20%'></td>";

                            echo "
                    
                    <td align='center' width='5%'>{$row['TranID']}</td>
                    <td align=\"right\" width='12.5%'>{$amount}</td>
                    <td width='12.5%'></td>
                    ";
                         if($row['TranStatus'] == "Pending" /*&& Role = Manager*/){
                             $parameter = $row['TranID'];
                             //action='updateStatus.php'
                             echo "<td width='12.5%'><div name='StatusDiv' id='StatusDiv'><form method='post' action='updateStatus.php' name='UpdateStatus' id='UpdateStatus'>
                                   <input type=\"submit\" name=\"approveButton\" value=\"Approve\" /> 
                                   <!--<a href=\"updateStatus.php?TranID={$row['TranID']}\" value='{$row['TranID']}'>Approve</a>-->
                                   <input type=\"submit\" name=\"rejectButton\" value=\"Reject\" />
                                  
                                   <input type=\"hidden\" name=\"hiddenData\" value=\"{$row['TranID']}\" /> 
                                   </form></div><p id=\"demo\"></p></td>
                                   <script>
                                    function updateStatus() {
                                       var txt;
                                        var reasonInput = prompt(\"Please enter the reason:\", \"\");
                                        if (reasonInput == null || reasonInput == \"\") {
                                            txt = \"User cancelled the prompt.\";
                                        } else {
                                            
                                        
                             
                                        }
                                        document.getElementById(\"demo\").innerHTML = txt;
                                    }
                                    </script>
                                   ";

                         }
                         else echo "<td width='12.5%'>{$row['TranStatus']}: {$row['Reason']}</td>";

                    //<td><a>{$row['TranStatus']}</a></td>
                echo "
                        <td width='12.5%'><form method='post' action='EditJournal.php'>
                        <input type=\"submit\" name=\"editJournalButton\" value=\"Edit\" />
                        <input type=\"hidden\" name=\"hiddenData\" value=\"{$row['TranID']}\" /> 
                        </form></td>
                    <td width='12.5%'><a href='get_file.php?id={$row['TranID']}'>Download Attachment</a></td>
                </tr>
                ";


            }
        }

        // Close table
        echo '</table></table>';
    }

    // Free the result
    $result->free();

}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$conn->error}</pre>";
}

// Close the mysql connection
//$conn->close();
?>
<?php
    function editEntry($accountID){
        $sql = 'SELECT journalEntry.ID, journalEntry.TranID, journalEntry.Account, journalEntry.CredOrDeb, journalEntry.TranDate, journalEntry.amount, attachment.mime, attachment.size, attachment.data, attachment.name, JournalStatus.TranStatus, JournalStatus.Reason from journalEntry left join (attachment, JournalStatus) on attachment.TranID = journalEntry.TranID AND JournalStatus.TranID = journalEntry.TranID order by TranID DESC, CredOrDeb DESC where journalEntry.account = ' + $accountID;

        echo "
        
        <div class=\"form-popup\" id=\"myForm\">
    <form action=\"/action_page.php\" class=\"form-container\">
        <h1>Login</h1>

        <label for=\"email\"><b>Account</b></label>
        <input type=\"text\" placeholder=\"Enter Email\" name=\"email\" required>

        <label for=\"psw\"><b>Password</b></label>
        <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\" required>

        <button type=\"submit\" class=\"btn\">Login</button>
        <button type=\"submit\" class=\"btn cancel\" onclick=\"closeForm()\">Close</button>
    </form>
</div>
";
    }


?>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

<?php
if (isset($_GET['approveButton'])) {
    $TranID = $_GET['hiddenData'];
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
if (isset($_GET['rejectButton'])) {
    $TranID = $_GET['hiddenData'];
    echo "<form method='post' action='updateReason.php' value=''>
          <input type='text' name='reason' id='reason-field' value='' placeholder='Reason for Rejecting' />
          <input type=\"submit\" name=\"reasonSubmit\" value=\"Reject\" />
          <input type='hidden' name='reasonHiddenText' value='{$TranID}' />
          </form>";
}


function updateReason()
{
    define('USER', 'root');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'QuickerBooksDB');

// connect to database
    $conn = new mysqli("localhost", "root", "", "QuickerBooksDB");

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
    /*
    $html = '';
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($html);
//get the element you want to append to
    $descBox = $doc->getElementById('debit1');
//create the element to append to #element1
    $appended = $doc->createElement('div', 'This is a test element.');
//actually append the element
//  $descBox->appendChild($appended);
    echo $doc->saveHTML();
    */
}
?>

<script>
    function SubForm (){
        var url=$(this).closest('form').attr('action');
            data=$(this).closest('form').serialize();
        $.ajax({
            url:url,
            type:'post',
            data:$('#UpdateStatus').serialize(),
            success:function(){
                alert("worked");
            }
        });
    }
</script>

<!--

<iframe width="0" height="0" border="0" name="dummyframe" id="dummyframe"></iframe>
-->
<div class="modal fade" id="modalRejectForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Reject Journal Entry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <?php
/*
                    echo "<form method='post' action='updateReason.php' target='updateReason.php' value=''>
                        <input type='text' name='reason' id='reason-field' value='' placeholder='Reason for Rejecting' />
                        <input type=\"submit\" name=\"reasonSubmit\" value=\"Reject\" />
                        <input type='hidden' name='reasonHiddenText' value='{$TranID}' />
                        </form>";
*/
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRejectForm">Launch
        Modal Contact Form</a>
</div>

-->

</body>
