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
</style>
</head>
<body>
<?php
$tbook = simplexml_load_file('contacts.xml') or die("xml not loading");

if(isset($_POST['submitSave'])) {
	foreach ($tbook->DirectoryEntry as $DIR_ENTRY) {
		if($DIR_ENTRY['id'] == $_POST['id']){
		$DIR_ENTRY['id'] =  strip_tags($_POST['id']);
		$DIR_ENTRY->Name = strip_tags($_POST['Name']);
		$DIR_ENTRY->Telephone = strip_tags($_POST['Telephone']);
		$DIR_ENTRY->Telephone = strip_tags($_POST['Telephone']);
		break;
}
}
file_put_contents('contacts.xml', $tbook->asXML());
header('location: index.php');
}

foreach ($tbook->DirectoryEntry as $DIR_ENTRY) {
		if($DIR_ENTRY['id'] == $_GET['id']) {
		$id =  $DIR_ENTRY['id'];
       	$Name = $DIR_ENTRY->Name;
       	$Telephone = $DIR_ENTRY->Telephone;
		$Telephone = $DIR_ENTRY->Telephone;
       } 
    }

?>
<form method="post" onsubmit="SpecialChars();">

	<table cellpadding="2" cellspacing="2">

		<tr>

			<td>id</td>

			<td><input type="text" name="id" value="<?php echo $id; ?>"readonly></td>

		</tr>
	
		<tr>

			<td>Name</td>

			<td><input type="text" name="Name" value="<?php echo $Name; ?>"></td>

		</tr>
		
		<tr>

			<td>Telephone</td>

			<td><input type="text" name="Telephone" value="<?php echo $Telephone; ?>"></td>

		</tr>
		
		<tr>

			<td>Telephone</td>

			<td><input type="text" name="Telephone" value="<?php echo $Telephone; ?>"></td>

		</tr>

		<tr>

		<td>&nbsp;</td>

		<td><input type="submit"  name="submitSave"></td>

		</tr>

	</table>

</form>
</body>
</html>
