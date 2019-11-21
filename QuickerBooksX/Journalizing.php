<!--

TODO:
    Create Journalizing UI
    allow multiple debits  ----show and hide div elements
    ensure credits and debits are balanced
    ensure the same account isn't used twice
    send requests to Manager
    Edit existing journal entries, to save and view
    delete journal entries

-->
<?php
    include('config.php');
?>


<!DOCTYPE html>
<head>
    <title>Journalizing</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
    <a href="ListFiles.php">See all files</a>
</p>











