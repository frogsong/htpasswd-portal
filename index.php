<?php require 'config.php' ?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo TITLE ?></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
<h1><?php echo TITLE ?></h1>
<p id="user">Logged in as <strong><?php echo htmlspecialchars($User); ?></strong><br>
<a href="password.php">Change password</a></p>

<ul id="services">
<?php foreach ($Services as $name => $link): ?>
<li>
<a href="<?php echo $link ?>"><?php echo $name ?></a>
</li>
<?php endforeach ?>
</ul>
</div>
</body>
