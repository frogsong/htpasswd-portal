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
</style>
</head>
<body>
<div id="main">
<h1>Change password</h1>
<table>
	<tr>
		<th>Username</th>
		<td><?php echo htmlspecialchars($_SERVER['REMOTE_USER']); ?></td>
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
</div>
</body>
</html>
