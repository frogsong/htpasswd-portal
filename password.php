<?php
define('PASSWD_FILE', '../htpasswd');
$user = $_SERVER['REMOTE_USER'];

if (isset($_POST['password'])) {
	$password = $_POST['password'];
	if (isset($_POST['password_confirm']) && $password == $_POST['password_confirm']) {
		$command = 'htpasswd -b ' . escapeshellarg(PASSWD_FILE)
			. ' ' . escapeshellarg($user) . ' ' . escapeshellarg($password);
		exec($command, $output, $return);

		if ($return != 0)
			$message = array('error', 'Error setting password: ' . $return);
		else
			$message = array('success', 'Password changed. You will be asked to log in again.');
	}
	else $message = array('error', 'Passwords do not match');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Change password</title>
<meta charset="UTF-8">
<style type="text/css">
body { margin: 0; font-family: Helvetica, Arial, sans-serif; background: #464; }
#main { margin: 1em auto; padding: 1em 0; width: 30em; max-width: 100%; background: #cfc; }
h1 { margin: 0 0 0.5em; text-align: center; }
table { margin: 0 auto; }
td, th { padding: 0.2em 0.5em; }
th { text-align: right; }
p.message { margin: 0.5em 0; padding: 0.3em 0; text-align: center; }
p.message.error { background: #f77; }
p.message.success { background: #ff4; }
</style>
</head>
<body>
<div id="main">
<h1>Change password</h1>
<?php if (isset($message)): ?>
<p class="message <?php echo $message[0] ?>"><?php echo htmlspecialchars($message[1]) ?></p>
<?php endif ?>
<form action="" method="post">
<table>
	<tr>
		<th>Username</th>
		<td><?php echo htmlspecialchars($user); ?></td>
	</tr>
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
