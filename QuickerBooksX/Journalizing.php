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

<<<<<<< Updated upstream


<!--FAILED TEST-->
=======
>>>>>>> Stashed changes
<?php
function addAccountsToDropdown(){
    global $conn;
    $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
    echo '<div class="form-element" id="ElementID">
        <label>Debited Account</label>
        <select name="owner">
            <option value="" disabled selected>Select Account</option>';
    while ($row = $sql->fetch_assoc()) {
        echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
    }
    echo '</select>
        <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">

        <input onclick="get_option_combo();" type="button" value="Add Debit" />

    </div>';
}
<<<<<<< Updated upstream
print "</table>\n";
*/
?>

=======
?>


>>>>>>> Stashed changes
<!DOCTYPE html>

<head>
    <title>MySQL file upload example</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<<<<<<< Updated upstream
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
=======
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--css for formatting journal entry form-->
    <!--
      <style>
          html {
              box-sizing: border-box;
          }

          *, *:before, *:after {
              box-sizing: inherit;
          }


          body {
              background: #f5f5f5;
              color: #333;
              font-family: arial, helvetica, sans-serif;
              font-size: 32px;
          }

          h1 {
              font-size: 32px;
              text-align: center;
          }

          p {
              font-size: 20px;
              line-height: 1.5;
              margin: 40px auto 0;
              max-width: 640px;
          }

          pre {
              background: #eee;
              border: 1px solid #ccc;
              font-size: 16px;
              padding: 20px;
          }

          form {
              margin: 40px auto 0;
          }

          label {
              display: block;
              font-size: 24px;
              font-weight: bold;
              margin-bottom: 10px;
          }

          input {
              border: 2px solid #333;
              border-radius: 5px;
              color: #333;
              font-size: 32px;
              margin: 0 0 20px;
              padding: .5rem 1rem;
              width: 25%;

          }
          select {
              border: 2px solid #333;
              border-radius: 5px;
              color: #333;
              font-size: 32px;
              margin: 0 0 20px;
              padding: .5rem 1rem;
              width: 25%;

          }

          button {
              background: #fff;
              border: 2px solid #333;
              border-radius: 5px;
              color: #333;
              font-size: 16px;
              font-weight: bold;
              padding: 1rem;
          }

          button:hover {
              background: #333;
              border: 2px solid #333;
              color: #fff;
          }

          .main {
              background: #fff;
              border: 5px solid #ccc;
              border-radius: 10px;
              margin: 40px auto;
              padding: 40px;
              width: 80%;
              max-width: 700px;
          }
          /*
          div.div-hidden{
              display: none;
          }
           */
      </style>
  -->

</head>

<body>
<form action="UploadFile.php" id="myForm" method="post" enctype="multipart/form-data">
    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "$" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }

    </script>
    <div id="itemRows">
        <div class="form-element">
            <label>Amount</label>
            <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">
        </div>
        <div class="form-element">
            <label>Credited Account</label>
            <select name="owner">
                <option value="" disabled selected>Select Account</option>
                <?php
                //17miX8bCh3SS7kwx70A5bQJL3ZyNUj7Y8     DELETE ME
                $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
                }
                ?>
            </select>
            <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">

        </div>
        <div class="form-element" id="ElementID2">
            <label>Debited Account</label>
            <select name="owner">
                <option value="" disabled selected>Select Account</option>
                <?php
                $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";
                }
                ?>
            </select>
            <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$0.00">

            <input onclick="moreFields();" type="button" value="Add Debit" />

        </div>
    </div>
</form>
<form method="post" action="index1.php"> <span id="writeroot"></span>
    <div>
        <div>
            <input type="file" name="uploaded_file"><br>
            <input type="submit" value="Upload file" formaction="UploadFile.php" name="submit[]">
        </div>
>>>>>>> Stashed changes
    </div>
</form>
<p>
    <a href="ListFiles.php">See all files</a>
</p>
<<<<<<< Updated upstream
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
=======


<!--Javascript to show or hide extra debits-->
<script>
    var counter = 0;

    function moreFields() {
        counter++;
        var newFields = document.getElementById('ElementID2').cloneNode(true);
        newFields.id = '';
        newFields.style.display = 'block';
        var newField = newFields.childNodes;
        for (var i = 0; i < newField.length; i++) {
            var theName = newField[i].name
            if (theName) newField[i].name = theName + counter;
        }
        var insertHere = document.getElementById('writeroot');
        insertHere.parentNode.insertBefore(newFields, insertHere);
    }

>>>>>>> Stashed changes

    var rowNum = 0;

    function addDebitOnClick(frm) {
        rowNum++;
        //var row = '<p id="rowNum'+rowNum+'">Item quantity: <input type="text" name="qty[]" size="4" value="'+frm.add_qty.value+'"> Item name: <input type="text" name="name[]" value="'+frm.add_name.value+'"> <input type="button" value="Remove" onclick="removeRow('+rowNum+');"></p>';
        //   var row = (<div class="form-element"><label>Debited Account</label><select name="owner"><option value="" disabled selected>Select Account</option> <?php $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc"); while ($row = $sql->fetch_assoc()){echo "<option value=\": \">" . $row['accountnumber'] . ": " . $row['accountname'] . "</option>";} ?></select><input type="text" name="currency-field" id="currency-field" pattern="^\\$\\d{1,3}(,\\d{3})*(\\.\\d+)?$" value="" data-type="currency" placeholder="$0.00"><input onclick="addDebitOnClick(this.form);" type="button" value="Add Debit" /></div>);
        jQuery('#itemRows').append(row);
        frm.add_qty.value = '';
        frm.add_name.value = '';
        jQuery('<div class="form-element"><label>Debited Account</label><select name="owner"><option value="" disabled selected>Select Account</option> <?php $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc"); while ($row = $sql->fetch_assoc()){echo "<option value=\": \">" . $row['
        accountnumber '] . ": " . $row['
        accountname '] . "</option>";} ?></select><input type="text" name="currency-field" id="currency-field" pattern="^\\$\\d{1,3}(,\\d{3})*(\\.\\d+)?$" value="" data-type="currency" placeholder="$0.00"><input onclick="addDebitOnClick(this.form);" type="button" value="Add Debit" /></div>').appendTo('form-element');

    }

    function removeRow(rnum) {
        jQuery('#rowNum' + rnum).remove();
    }

    function get_option_combo() {
        var url = "addAccountsToDropdown";
        //alert(url);
        var contents = AjaxRequest(url);
        //alert(contents);
        //return contents;
        //send the result to html

        document.getElementById("elemendID").innerHTML = contents;
    }

    function AjaxRequest(url) {
        //alert(url);
        if (xmlhttp != null) {
            if (xmlhttp.abort)
                xmlhttp.abort();
            xmlhttp = null;
        };
        if (window.XMLHttpRequest) // good browsers
            xmlhttp = new XMLHttpRequest();
        else if (window.ActiveXObject) // IE
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        if (xmlhttp == null)
            return null;

        xmlhttp.open("GET", url, false);

        xmlhttp.send(null);
        // alert(xmlhttp.status);

        if (xmlhttp.status >= 200 && xmlhttp.status < 300) // 2xx is good enough
            return xmlhttp.responseText;
        else
            return null;
    }

</script>
</body>

