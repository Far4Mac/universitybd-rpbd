<?php
require_once ('../dbconnect.php');

$dbc = db_connect();

$query = "SELECT cath_name FROM cathedrals";
$data = mysqli_query($dbc, $query);

if (isset($_POST['submit'])){
    $cath_name = mysqli_real_escape_string($dbc, trim($_POST['cath_name']));
    if (!empty($cath_name)){
        $query_ins = "INSERT INTO cathedrals (cath_name) VALUES ('$cath_name')";
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
                            echo '<td>' . $row['cath_name'] . '</td></tr>';}?>
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
                                        <label class="control-label col-sm-4" for="cath_name">Кафедра:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="cath_name"/>
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