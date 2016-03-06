<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
<link href="css/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="header">
	<div class="shell">
		<div id="top">
			<h1><a href="index.php">Admin Panel</a></h1>
            <?php
			if(isset($_SESSION['MovieinfoAdmin'])){
			?>
			<div id="top-navigation">
				Welcome <a href="#"><strong>Admin</strong></a>
				<span>|</span>
				<a href="logout.php">Log out</a>
			</div>
            <?php
			}
			?>
		</div>
		<div id="navigation">
			<ul>
             <?php
			if(isset($_SESSION['MovieinfoAdmin'])){
			?>
			    <li><a href="index.php" <?php echo $type == "category"?'class="active"':'';?>><span>Category</span></a></li>
			    <li><a href="users.php" <?php echo $type == "users"?'class="active"':'';?>><span>Users</span></a></li>
			    <li><a href="movies.php" <?php echo $type == "movies"?'class="active"':'';?>><span>Movies</span></a></li>
			    <li><a href="news.php" <?php echo $type == "news"?'class="active"':'';?>><span>News</span></a></li>
			    <li><a href="contact.php" <?php echo $type == "contact"?'class="active"':'';?>><span>Contact</span></a></li>
                <?php
			} else{
			?>
			    <li><a href="login.php" class="active"><span>Login</span></a></li>
                <?php
			}
			?>
			</ul>
		</div>
	</div>
</div>