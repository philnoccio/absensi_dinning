<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<form action="<?php echo site_url('Dining/menu') ?>" method="post">
			<table>
				<tr>
					<td>Enter IP</td>
					<td>:</td>
					<td><input type="text" name="ip"></input></td>
				</tr>
				<tr>
					<td>Enter Key</td>
					<td>:</td>
					<td><input type="text" name="key"></input></td>
				</tr>
				<tr>
					<td><input type="submit"></input></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>