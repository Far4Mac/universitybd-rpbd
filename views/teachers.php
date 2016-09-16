<?php
require_once ('../dbconnect.php');

$dbc = db_connect();

$query = "SELECT t.first_name, t.second_name, t.third_name, p.pos_name, c.cath_name, t.t_birthday"
 . " FROM teachers AS t JOIN positions AS p ON t.position_id=p.id JOIN cathedrals AS c"
 . " ON t.cathedral_id=c.id";
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
                <a class="list-group-item active" href="teachers.php">Преподаватели</a>
                <a class="list-group-item" href="subjects.php">Предметы</a>
                <a class="list-group-item" href="cathedrals.php">Кафедры</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Должность</th>
                        <th>Кафедра</th>
                        <th>День рождения</th>
                    </tr>
                    <tr>
                        <?php while($row = mysqli_fetch_array($data)){
                            echo '<td>' . $row['first_name'] . '</td><td>' . $row['second_name'] .
                                '</td><td>' . $row['third_name'] . '</td><td>' . $row['pos_name'] .
                                '</td><td>' . $row['cath_name'] . '</td><td>' . $row['t_birthday'] . '</td>';}?>
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