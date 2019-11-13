<?php
    $query = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
    $row = $sql->fetch_assoc();
?>

<script type="text/javascript">
    $(document).ready(function(){
        var debitCount = 1;
        $('button#addAccount').click(function(){
            var divNew = '<div class="row" id="debitRow'+debitCount+'">';
            var selectNew = '<select name="account'+debitCount+'"><option value="" disabled selected>Select Account</option>';
            <?php
            $sql = mysqli_query($conn, "SELECT accountname, accountnumber FROM chartofaccounts order by accountnumber asc");
            while ($row = $sql->fetch_assoc()){
                echo "
                    selectNew += '<option value=\"{$row['accountnumber']}\">Debit: {$row['accountname']}</option>'
                    ";
            }
            ?>
            selectNew += '</select>';
            var inputMoney = '<input type="text" name="amount1" id="currency-field" pattern="^\\$\\d{1,3}(,\\d{3})*(\\.\\d+)?$" value="" data-type="currency" placeholder="$0.00">';
            var inputType = '<select name="TranType'+debitCount+'[]"><option value="" disabled selected>Select Type</option><option value="Debit">Debit</option><option value="Credit">Credit</option></select>';
            var removeButton = $('<input onclick="addAccount();" type="button" value="Remove Account" id="removeAccount" /></div>');

            removeButton.click(function(){
                $(this).parent().remove();
            });

            $('#divID').append(divNew);
            $('#debit'+debitCount).append(selectNew);
            $('#debit'+debitCount).append(inputMoney);
            $('#debit'+debitCount).append(inputType);
            $('#debit'+debitCount).append(removeButton);
            debitCount += 1;
        })
    })
</script>

</body>
</html>