<!DOCTYPE html>
<html>
<head>
<meta characters="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>XML Directory Editor</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//www.njpcstatus.co.uk/style.css?v=20191009">
<link href="css/foundation.css" rel="stylesheet" media="screen">
<style>
body {padding-left:20px;padding-top:20px;}
table {width: 100%;}
</style>
</head>
<body>
<?php
$tbook = simplexml_load_file('contacts.xml');
if(isset($_POST['submitSave'])) {
if (strip_tags($_POST['Name']) != "" )
{
$DirectoryEntry = $tbook->addChild('DIR_ENTRY');
$DIR_ENTRY->addAttribute('id', strip_tags($_POST['id']));
$DIR_ENTRY->addChild('Name', strip_tags($_POST['Name']));
$DIR_ENTRY->addChild('Telephone', strip_tags($_POST['Telephone']));
$DIR_ENTRY->addChild('Telephone', strip_tags($_POST['Telephone']));
file_put_contents('contacts.xml', $tbook->asXML());
header('location: index.php');
}else {?>
<script>alert("The field cannot be empty");</script>
<?php
}
}
?>
<div class="row">
	
	<div class="column">
		<div class="large-12 columns">
			<form method="post">
				<table cellpadding="2" cellspacing="2">
					<tr>
						<td>id</td>
						<td><input type="text" name="id"></td>
					</tr>
					<tr>
						<td>Name</td>
						<td><input type="text" name="Name"></td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td><input type="text" name="Telephone"></td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td><input type="text" name="Telephone"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input class="primary button" type="submit" name="submitSave" value="Save"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<body>
</html>
