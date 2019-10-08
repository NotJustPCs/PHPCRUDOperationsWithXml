<!DOCTYPE html>
<html>
<head>
<meta characters="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>XML Directory Editor</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
if (strip_tags($_POST['DIR_ENTRY_NAME_FIRST']) != "" && strip_tags($_POST['DIR_ENTRY_NAME_LAST']) != "")
{
$DIR_ENTRY = $tbook->addChild('DIR_ENTRY');
$DIR_ENTRY->addAttribute('id', strip_tags($_POST['id']));
$DIR_ENTRY->addChild('DIR_ENTRY_NAME_FIRST', strip_tags($_POST['DIR_ENTRY_NAME_FIRST']));
$DIR_ENTRY->addChild('DIR_ENTRY_NAME_LAST', strip_tags($_POST['DIR_ENTRY_NAME_LAST']));
$DIR_ENTRY->addChild('DIR_ENTRY_NUMBER_WORK', strip_tags($_POST['DIR_ENTRY_NUMBER_WORK']));
$DIR_ENTRY->addChild('DIR_ENTRY_NUMBER_MOBILE', strip_tags($_POST['DIR_ENTRY_NUMBER_MOBILE']));
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
						<td>DIR_ENTRY_NAME_FIRST</td>
						<td><input type="text" name="DIR_ENTRY_NAME_FIRST"></td>
					</tr>
					<tr>
						<td>DIR_ENTRY_NAME_LAST</td>
						<td><input type="text" name="DIR_ENTRY_NAME_LAST"></td>
					</tr>
					<tr>
						<td>DIR_ENTRY_NUMBER_WORK</td>
						<td><input type="text" name="DIR_ENTRY_NUMBER_WORK"></td>
					</tr>
					<tr>
						<td>DIR_ENTRY_NUMBER_MOBILE</td>
						<td><input type="text" name="DIR_ENTRY_NUMBER_MOBILE"></td>
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
