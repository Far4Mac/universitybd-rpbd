<?php
require_once ('../dbconnect.php');

$dbc = db_connect();

$query = "SELECT cath_name FROM cathedrals";
$data = mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Студенты</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron text-center">
    <h1>База данных</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="list-group">
                <a class="list-group-item" href="students.php">Студенты</a>
                <a class="list-group-item" href="teachers.php">Преподаватели</a>
                <a class="list-group-item" href="subjects.php">Предметы</a>
                <a class="list-group-item active" href="cathedrals.php">Кафедры</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Кафедра</th>
                    </tr>
                    <tr>
                        <?php while($row = mysqli_fetch_array($data)){
                            echo '<td>' . $row['cath_name'] . '</td>';}?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
mysqli_close($dbc);