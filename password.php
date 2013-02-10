<?php
require 'config.php';

function passwords_match() {
	return isset($_POST['password_confirm']) && $_POST['password'] == $_POST['password_confirm'];
}

function change_password($user, $pass) {
	copy(PASSWD_FILE, PASSWD_FILE . '.bak');
	$command = 'htpasswd -b -m ' . escapeshellarg(PASSWD_FILE)
		. ' ' . escapeshellarg($user) . ' ' . escapeshellarg($pass);
	exec($command, $output, $return);
	return $return;
}

if (isset($_POST['password'])) {
	if (!passwords_match())
		$message = array('error', 'Passwords do not match');
	else if (($return = change_password($User, $_POST['password'])) != 0)
		$message = array('error', 'Error setting password: ' . $return);
	else
		$message = array('success', 'Password changed. <a href="./">Log in again</a>.');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Change password</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="main">
<h1>Change password</h1>
<p id="user">Logged in as <strong><?php echo htmlspecialchars($User); ?></strong></p>
<?php if (isset($message)): ?>
<p class="message <?php echo $message[0] ?>"><?php echo $message[1] ?></p>
<?php endif ?>
<form action="" method="post">
<table>
	<tr>
		<th>New password</th>
		<td><input type="password" name="password" size="20" maxlength="40"></td>
	</tr>
	<tr>
		<th>New password (again)</th>
		<td><input type="password" name="password_confirm" size="20" maxlength="40"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Change password"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>
