<?
	//подключаем базу
    $link = mysqli_connect("localhost","root","root","sql_database");
	//делаем выборку всего по кукам
	$query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
	$userdata = mysqli_fetch_assoc($query);
	$username = $userdata['username'];
	//выборку всего из табл узерс
$result = mysqli_query($link,"SELECT * FROM users");
$myrow = mysqli_fetch_array($result);
    //выводим таблицу
echo '<table cellpadding="5" cellspacing="0" border="1" align=center>';
echo "<tr><th><span class='whiter'>№</th><th><span class='whiter'>Name of user</th><th><span class='whiter'>Password</th><th><span class='whiter'>Address</th><th><span class='whiter'>Telephone</th><th><span class='whiter'>Email</th><th><span class='whiter'>Date of registration</th><th><span class='whiter'>First name</th><th><span class='whiter'>Second name</th><th><span class='whiter'>Delete</th><th><span class='whiter'>Edit</th></tr>"; 
?>
<html lang="en">
<head>
  <title>Primer</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body class="form-group11">
<div class="header">
  <h1>Admin data panel</h1>
  <p>See your date all users on site database and edit his!</p>
  <p>Welcome! You log in as "<?echo $username?>"</p> 
</div>

<div class="navbar">
  <a href="index.php">Main page</a>
  <a href="logout.php">Logout</a>
  <a href="#">Link</a>
</div>
</body>
</html>
<?

do{

//таблица в цикле
    echo '<div class="form-group"><form method="POST"><td><input name="id" value='.$myrow['id'].' type="text"></td>';
    echo '<td><input name="username" value='.$myrow['username'].' type="text"></td>';
    echo '<td><input name="password" value='.$myrow['password'].' type="password"></td>';
    echo '<td><input name="address" value='.$myrow['address'].' type="address"></td>';
    echo '<td><input name="phone" value='.$myrow['phone'].' type="tel"></td>';
    echo '<td><input name="email" value='.$myrow['email'].' type="email"></td>';
    echo '<td><input name="dateregistration" value='.$myrow['dateregistration'].' type="date"></td>';
    echo '<td><input name="firstname" value='.$myrow['firstname'].' type="text"></td>';
    echo '<td><input name="secondname" value='.$myrow['secondname'].' type="text"></td>';
	echo '<td><button name="del" type="submit" class="btn btn-default" value='.$myrow['id'].'>"Удалить запись"</button></td>';
	echo '<td><button name="edit" type="submit" class="btn btn-default" value='.$myrow['id'].'>"Редактировать запись"</button></td>';
    echo "</form></div></tr>";
}
while ($myrow = mysqli_fetch_array($result));
//кнопка на удаление пользователя
if(isset($_POST['del'])) {
    mysqli_query($link,"DELETE FROM users WHERE id='".$_POST["del"]."'");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";

}
//кнопка на редачинья пользователя
    if (isset($_POST['edit'])) {
mysqli_query($link, "UPDATE users SET address='".$_POST['address']."', phone='".$_POST['phone']."', email='".$_POST['email']."', firstname='".$_POST['firstname']."', secondname='".$_POST['secondname']."' WHERE id='".$_POST["edit"]."'");
//актуализируем данные
echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php\">";
}
//выводим табл
echo "</table>";
?>

