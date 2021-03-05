<?
//коннект к базе
	$link = mysqli_connect("localhost","root","root","sql_database");
	//сравниваем куки
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
	{//есть авторизирован то выводим кнопку выхода
		If($onclickonbutton!==true)
		{
		$button=true;

//выборка по кукам
		$query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
		$userdata = mysqli_fetch_assoc($query);
		
//переменные
		$id = ($userdata['id']);					
		$username = $userdata['username'];
		$password = ($userdata['password']);
		$address = $userdata['address'];
		$phone = $userdata['phone'];
		$email = $userdata['email'];
		$firstname = $userdata['firstname'];
		$secondname = $userdata['secondname'];
		$dateregistration = $userdata['dateregistration'];
	//ранг пользователя
		if($role==1)
		{
			$admin=true;
		}
	//обновляем хеш
		if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id'])
		or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))
		{
			setcookie("id", "", time() - 3600*24*30*12, "/");
			setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
			print "Хм, что-то не получилось";
		}
		else
		{

		}
		}
	}
	if(isset($_POST['submit']))
{
	$onclickonbutton==true;
    $err = [];


    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
		 // Убераем лишние пробелы и делаем двойное хеширование

        // Записываем в БД новый пароль
		if($_POST['password'] !== $password)
		{

			mysqli_query($link, "UPDATE users SET password='".md5(md5(trim($_POST['password'])))."' WHERE id='".$userdata['id']."'");
		}

mysqli_query($link, "UPDATE users SET address='".$_POST['address']."', phone='".$_POST['phone']."', email='".$_POST['email']."', firstname='".$_POST['firstname']."', secondname='".$_POST['secondname']."' WHERE id='".$userdata['id']."'");


		$onclickonbutton==false;
		header("Location: profile.php");
    }
    else
    {					
	?>
<p><center><font color="blue"><?php print "<b>При регистрации произошли следующие ошибки:</b><br>"; ?></font></center></p>
		<?
        foreach($err AS $error)
        {
					?>
<p><center><font color="blue"><?php echo $error; ?></font></center></p>
		<?
        }
    }
}

?>
<!DOCTYPE html>
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
  <h1>Profile data panel</h1>
  <p>See your date and edit his!</p>
  <p>Welcome! You log in as "<?echo $username?>"</p> 
</div>

<div class="navbar">
  <a href="index.php">Main page</a>
  <a href="logout.php">Logout</a>
  <a href="#">Link</a>
</div>
 <form method="POST" class="form-horizontal">
<div class="form-group">
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Username</label>
  <div class="col-xs-10">
    <input name="login" class="form-control" type="text" value="<?echo $username?>" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-password-input" class="col-xs-2 col-form-label">Password</label>
  <div class="col-xs-10">
    <input name="password" class="form-control" type="password" value="<?echo $password?>" id="example-password-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Address</label>
  <div class="col-xs-10">
    <input name="address" class="form-control" type="address" value="<?echo $address?>" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-tel-input" class="col-xs-2 col-form-label">Telephone</label>
  <div class="col-xs-10">
    <input name="phone" class="form-control" type="tel" value="<?echo $phone?>" id="example-tel-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-email-input" class="col-xs-2 col-form-label">Email</label>
  <div class="col-xs-10">
    <input name="email" class="form-control" type="email" value="<?echo $email?>" id="example-email-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Firstname</label>
  <div class="col-xs-10">
    <input name="firstname" class="form-control" type="text" value="<?echo $firstname?>" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Secondname</label>
  <div class="col-xs-10">
    <input name="secondname" class="form-control" type="text" value="<?echo $secondname?>" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Date of registration</label>
  <div class="col-xs-10">
    <input name="dateregistration" class="form-control" type="text" value="<?echo $dateregistration?>" id="example-text-input">
  </div>
</div>

<div class="container">
 <div class="row">
  <div class="col-md-offset-3 col-md-6">

<div class="form-group row">
  <div class="col-xs-10">
    <input name="submit" type="submit" class="btn btn-default" value="Save сhanges">
  </div>
  </div>
  </form>
  </div>
  </div>
</div>
</div>

</body>
</html>