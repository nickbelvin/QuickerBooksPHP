<?php include('../../admin/reports/ratios.php'); ?>
<?php
  $inc = getNetIncome();
  $exp = getTotalExpenses();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include('../../header.php') ?>
<link rel="stylesheet" href="Templates/Dashboard/plugins/chart.js/Chart.css">






</head>
<body>
<?php include('../../navigation.php') ?>


</body>




<canvas id="bar-chart" width="800" height="450"></canvas>
<?php include('../../footer.php') ?>
<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Income", "Expenses"],
      datasets: [
        {
          label: "Profit and Loss",
          backgroundColor: ["blue", "red"],
          data: [$inc, $exp]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Profit and Loss'
      }
    }
});

</script>

<script src="Templates/Dashboard/plugins/chart.js/Chart.js"></script>