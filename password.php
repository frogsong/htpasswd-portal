<?php
require 'config.php';

if (isset($_POST['password'])) {
	$password = $_POST['password'];
	if (isset($_POST['password_confirm']) && $password == $_POST['password_confirm']) {
		$command = 'htpasswd -b ' . escapeshellarg(PASSWD_FILE)
			. ' ' . escapeshellarg($User) . ' ' . escapeshellarg($password);
		exec($command, $output, $return);

		if ($return != 0)
			$message = array('error', 'Error setting password: ' . $return);
		else
			$message = array('success', 'Password changed. <a href="./">Log in again</a>.');
	}
	else $message = array('error', 'Passwords do not match');
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
