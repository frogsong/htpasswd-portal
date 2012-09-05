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
