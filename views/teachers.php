<?php
require_once ('../dbconnect.php');

$dbc = db_connect();

$query = "SELECT t.first_name, t.second_name, t.third_name, p.pos_name, c.cath_name, t.t_birthday"
 . " FROM teachers AS t JOIN positions AS p ON t.position_id=p.id JOIN cathedrals AS c"
 . " ON t.cathedral_id=c.id";
$data = mysqli_query($dbc, $query);

$query_p = "SELECT pos_name FROM positions";
$data_p = mysqli_query($dbc, $query_p);

$query_c = "SELECT cath_name FROM cathedrals";
$data_c = mysqli_query($dbc, $query_c);

if (isset($_POST['submit'])){
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $second_name = mysqli_real_escape_string($dbc, trim($_POST['second_name']));
    $third_name = mysqli_real_escape_string($dbc, trim($_POST['third_name']));
    $pos_name = $_POST['pos_name'];
    $cath_name = $_POST['cath_name'];
    $t_birthday = $_POST['t_birthday'];
    if (!empty($first_name) && !empty($second_name)&& !empty($third_name)&& !empty($pos_name)&& !empty($cath_name)&& !empty($t_birthday)){
        $query_ins = "INSERT INTO teachers (first_name, second_name, third_name, t_birthday, cathedral_id, position_id)"
            . " SELECT '$first_name', '$second_name', '$third_name', '$t_birthday', c.id, p.id FROM cathedrals AS c JOIN positions AS p"
         . " ON c.cath_name='$cath_name' AND p.pos_name='$pos_name'";
        mysqli_query($dbc, $query_ins);
        header("Refresh:0");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Студенты</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center top-main">
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
                                '</td><td>' . $row['cath_name'] . '</td><td>' . $row['t_birthday'] . '</td></tr>';}?>
                    </tr>
                </table>
            </div>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Добавить</button>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Добавление записи в таблицу</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="first_name">Фамилия:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="first_name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="second_name">Имя:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="second_name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="third_name">Отчество:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="third_name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="pos_name">Должность:</label>
                                        <div class="col-sm-8">
                                            <input list="positions" name="pos_name"/>
                                            <datalist id="positions">
                                                <?php while($row_p = mysqli_fetch_array($data_p)){
                                                    echo '<option value="' . $row_p['pos_name'] . '">';}?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="cath_name">Кафедра:</label>
                                        <div class="col-sm-8">
                                            <input list="cathedrals" name="cath_name"/>
                                            <datalist id="cathedrals">
                                                <?php while($row_c = mysqli_fetch_array($data_c)){
                                                    echo '<option value="' . $row_c['cath_name'] . '">';}?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="t_birthday">День рождения:</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="t_birthday"/>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-default" name="submit">Добавить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
mysqli_close($dbc);