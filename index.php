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
require_once ("Student.php");
try{
    //Подключение к бд
    $pdo=new PDO("mysql:dbname=pdo;host=localhost","root","");

}
catch(PDOException $e){
    echo "Ошибка сервера<br>";
    echo $e->getMessage();
}
echo "<table border='1px'><tr><td>#</td><td>name</td><td>Age</td><td>Money</td><td>More</td><td>Edit</td><td>Delete</td></tr>";
$query="Select id,name,age,money from pdo.student";
$rezult=$pdo->query($query);
/*while($next=$rezult->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr><td>{$next['id']}</td><td>{$next['name']}</td><td>{$next['age']}</td><td>{$next['money']}</td></tr>";
}*/
/*
while($next=$rezult->fetch(PDO::FETCH_NUM))
{
    echo "<tr><td>{$next['0']}</td> <td>{$next['1']}</td> <td>{$next['2']}</td> <td>{$next['3']}</td></tr>";
}*/
/*while($next=$rezult->fetch(PDO::FETCH_BOTH))
{
    echo"<tr><td>{$next['0']}</td> <td>{$next['name']}</td> <td>{$next['2']}</td> <td>{$next['money']}</td></tr>";//!!!!!!!!Выбирать только один вариант
}
*/
/*$next=$rezult->fetchAll(PDO::FETCH_OBJ);
foreach ($next as $tmp)
{
    echo"<tr><td>{$tmp->id}</td> <td>{$tmp->name}</td> <td>{$tmp->age}</td> <td>{$tmp->money}</td></tr>";
}*/
$next=$rezult->fetchAll(PDO::FETCH_CLASS,"Student");
foreach ($next as $tmp)
{
    //echo $tmp->Show()."<br>";
    echo"<tr><td>{$tmp->getId()}</td> <td>{$tmp->getName()}</td> <td>{$tmp->getAge()}</td> <td>{$tmp->getMoney()}</td><td><a href='info.php?id={$tmp->getId()}'>More</a></td><td><a href='edit.php?id={$tmp->getId()}'>Edit</a></td><td><a href='delete.php?id={$tmp->getId()}&&name={$tmp->getName()}'>Delete</a></td></tr>";
}

echo "</table>";
?>
</body>
</html>