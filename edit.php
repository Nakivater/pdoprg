<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$pdo=null;
try
{
$pdo=new PDO("mysql:dbname=pdo;host=localhost","root","");
}
catch(ErrorException $e)
{
    echo "Ошибка Сервера<br>".$e."<br>";
}
if(isset($_GET['id'])&&!empty($_GET['id'])) {
    $query = "Select name,age,money from student WHERE id=" . $_GET['id'];
    $rezult = $pdo->query($query);
    $next = $rezult->fetch(PDO::FETCH_ASSOC);
    echo "<form method='post' action='edit.php'><p>Edit name</p><br>
<input type='text' name='name' value='{$next['name']}'><br><p>Edit age</p><br>
<input type='text' name='age' value='{$next['age']}'><br><p>Edit money</p><br>
<input type='text' name='money' value='{$next['money']}'><br>
<input type='submit' name='edit' value='Редактировать'>

</form>
";
    echo 'gg';
    if (isset($_POST['edit']))
    {
        echo "ff";
    }
    if(isset($_POST['edit'])&&isset($_POST['name'],$_POST['age'],$_POST['money'])&&!empty($_POST['name'])&&!empty($_POST['age'])&&!empty($_POST['money']))
    {
        echo "HH";
        $queryupdate="Update pdo.student set name='".$_POST['name']."',age='".$_POST['age']."','".$_POST['money']."' Where id=".$_GET['id'];
        $rezultupdate=$pdo->query($query);
        echo "Success";
    }
}
?>
</body>
</html>