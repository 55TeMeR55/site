<?

	
	$link = mysqli_connect("localhost","root","root","sql_database");
	
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
	{
		$button=true;


		$query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
		$userdata = mysqli_fetch_assoc($query);
		

		$role = $userdata['role'];
		$username = $userdata['username'];
	
		if($role==1)
		{
			$admin=true;
		}
	
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Primer</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<body>
<div class="header">
  <h1>Site with different level access</h1>
  <p>Log in and you will see the difference!</p> 
  <?
    If($button==true)
  {
	  ?>
    <p>Welcome! You log in as "<?echo $username?>"</p> 
	<?
  }
  ?>
</div>

<div class="navbar">
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <?If($admin==true)
  {
  echo "<a href='admin.php' class='right'>Admin panel of site</a>";
  }
  If($button==true)
  {
  echo "<a href='logout.php' class='right'>Logout with site</a>";
  echo "<a href='profile.php' class='right'>Your prolile on site</a>";
  }
  else
  {
  echo "<a href='login.php' class='right'>Login on site</a>";
  }
  ?>
</div>

<div class="row">
  <div class="side">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      <h3>More Text</h3>
      <p>Lorem ipsum dolor sit ame.</p>
      <div class="fakeimg" style="height:60px;">Image</div><br>
      <div class="fakeimg" style="height:60px;">Image</div><br>
      <div class="fakeimg" style="height:60px;">Image</div>
  </div>
  <div class="main">
      <h2>My blog</h2>
      <h5>Thursday, March 4, 2021</h5>
  <p><img src="images/base.jpg" 
  width="500" height="300" alt="lorem"></a>
      <p>Creating Database</p>
      <p>Today I started creating the site database! </p>
      <br>
      <h2>TITLE HEADING</h2>
      <h5>Monday, March 1, 2021</h5>
  <p><img src="images/meet.png" 
  width="600" height="300" alt="lorem"></a>
      <p>New month new features </p>
      <p>Today I went for an interview, like I went to SEO, I came to a web developer) </p>
  </div>
</div>

</body>
</html>


