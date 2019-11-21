<?php include('ListFiles.php') ?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* Popup container */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        /* The actual popup (appears on top) */
        .popup .popuptext {
            visibility: hidden;
            width: 160px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
    </style>
    <script>
        // When the user clicks on <div>, open the popup
        function myFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>
</head>
<body>
<span class="popuptext" id="reasonPopup">
<?php
    if($_POST['reasonSubmit']) {
        $TranID = $_POST['reasonHiddenText'];
        $reason = $_POST['reason'];
        $sqlScript = "UPDATE JournalStatus SET TranStatus = 'Rejected', Reason = '{$reason}' WHERE TranID = {$TranID}";
        $result = $conn->query($sqlScript);
        if($result){
            echo "Journal Entry was Successfully Updated! Click <a href='ListFiles.php'>Here</a> to refresh the page.";
        }
        else echo "Failed to update journal entry. Contact Support" . "<pre>{$conn->error}</pre>";
        //header('Location:' . BASE_URL . 'ListFiles.php');

    }
?>
</span>
</body>