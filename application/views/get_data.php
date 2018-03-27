<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
<?php echo $this->session->flashdata('message') ?>
	<table>
		<tr>
			<th>User ID</th>
			<th>Tanggal & jam</th>
			<th>Verifikasi</th>
			<th>Status</th>
		</tr>
		<?php for($i = 0; $i < count($buffer)-2; $i++){ ?>
		<center>
		<tr>
			<?php 
			$data = Parse_Data($buffer[$i], "<Row>", "</Row>");
			$PIN = Parse_Data($data, "<PIN>", "</PIN>");
			$DateTime = Parse_Data($data, "<DateTime>", "</DateTime>");
			$Verified = Parse_Data($data, "<Verified>", "</Verified>");
			$Status = Parse_Data($data, "<Status>", "</Status>") ?>
			<td><?php echo $PIN ?></td>
			<td><?php echo $DateTime ?></td>
			<td><?php echo $Verified ?></td>
			<td><?php echo $Status ?></td>
		</center>
		</tr>
		<?php } ?>
	</table>
		<form action="<?php echo site_url('Dining/uploadtodatabase') ?>" method="post">
			<input type="hidden" name="ip" value="<?php echo $ip ?>"></input>
			<input type="hidden" name="key" value="<?php echo $key ?>"></input>
			<input type="submit" value="Upload to Database"></input>
		</form>
	</center>
</body>
</html>