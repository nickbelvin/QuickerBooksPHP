<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
<table>
<thead>
<tr>
<th>test1</th>
<th>test2</th>
<th>test3</th>
</tr>
</thead>
<tbody>
<tr>
    <td>1</td>
    <td>2</td>
    <td>3</td>
</tr>
<tr>
    <td>3</td>
    <td>2</td>
    <td>1</td>
</tr>
<tr>
    <td>7</td>
    <td>6</td>
    <td>5</td>
</tr>
<tr>
    <td>5</td>
    <td>6</td>
    <td>7</td>
</tr>
</tbody>
</table>
</body>
</html>
<script>
//adding table formatting things
$(document).ready( function () {
            $('#myTable').DataTable();
            
        });
</script>
