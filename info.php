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
if(isset($_GET['id'])&&!empty($_GET['id']))
{
    require_once ('Student.php');
    try
{
    $pdo=new PDO("mysql:dbname=pdo;host=localhost","root","");
}
catch(PDOException $e)
{
    echo "Ошибка сервера";
    echo $e."<br>";
}
echo "<table border='1px'><tr><td>Name</td><td>Age</td><td>Money</td><td>Return</td></tr>";
$query="Select name,age,money from student WHERE id=".$_GET['id'];
    $rezult=$pdo->query($query);
/*    $next=$rezult->fetchAll(PDO::FETCH_CLASS,"Student");
foreach ($next as $tmp) {
    echo "<tr><td>{$tmp->getName()}</td> <td>{$tmp->getAge()}</td> <td>{$tmp->getMoney()}</td><td><a href='index.php'>Main page</a></td></tr>";
}*/
$next=$rezult->fetch(PDO::FETCH_ASSOC);
echo "<tr><td>{$next['name']}</td> <td>{$next['age']}</td> <td>{$next['money']}</td> <td><a href='index.php'>Main page</a></td></tr>";

echo"</table>";
}
echo "<br>";
?>

</body>
</html>