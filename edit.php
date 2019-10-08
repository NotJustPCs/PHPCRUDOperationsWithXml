<!DOCTYPE html>
<html>
<head>
<meta characters="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Php Cruid Operation With XML Edit</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="css/foundation.css" rel="stylesheet" media="screen">
<style>
body {padding-left:20px;padding-top:20px;}
</style>
</head>
<body>
<?php
$tbook = simplexml_load_file('contacts.xml') or die("xml not loading");

if(isset($_POST['submitSave'])) {
	foreach ($tbook->DIR_ENTRY as $DIR_ENTRY) {
		if($DIR_ENTRY['id'] == $_POST['id']){
		$DIR_ENTRY['id'] =  strip_tags($_POST['id']);
		$DIR_ENTRY->DIR_ENTRY_NAME_FIRST = strip_tags($_POST['DIR_ENTRY_NAME_FIRST']);
		$DIR_ENTRY->DIR_ENTRY_NAME_LAST = strip_tags($_POST['DIR_ENTRY_NAME_LAST']);
		$DIR_ENTRY->DIR_ENTRY_NUMBER_WORK = strip_tags($_POST['DIR_ENTRY_NUMBER_WORK']);
		$DIR_ENTRY->DIR_ENTRY_NUMBER_MOBILE = strip_tags($_POST['DIR_ENTRY_NUMBER_MOBILE']);
		break;
}
}
file_put_contents('contacts.xml', $tbook->asXML());
header('location: index.php');
}

foreach ($tbook->DIR_ENTRY as $DIR_ENTRY) {
		if($DIR_ENTRY['id'] == $_GET['id']) {
		$id =  $DIR_ENTRY['id'];
       	$DIR_ENTRY_NAME_FIRST = $DIR_ENTRY->DIR_ENTRY_NAME_FIRST;
		$DIR_ENTRY_NAME_LAST = $DIR_ENTRY->DIR_ENTRY_NAME_LAST;
       	$DIR_ENTRY_NUMBER_WORK = $DIR_ENTRY->DIR_ENTRY_NUMBER_WORK;
		$DIR_ENTRY_NUMBER_MOBILE = $DIR_ENTRY->DIR_ENTRY_NUMBER_MOBILE;
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

			<td>DIR_ENTRY_NAME_FIRST</td>

			<td><input type="text" name="DIR_ENTRY_NAME_FIRST" value="<?php echo $DIR_ENTRY_NAME_FIRST; ?>"></td>

		</tr>

		<tr>

			<td>DIR_ENTRY_NAME_LAST</td>

			<td><input type="text" name="DIR_ENTRY_NAME_LAST" value="<?php echo $DIR_ENTRY_NAME_LAST; ?>"></td>

		</tr>
		
		<tr>

			<td>DIR_ENTRY_NUMBER_WORK</td>

			<td><input type="text" name="DIR_ENTRY_NUMBER_WORK" value="<?php echo $DIR_ENTRY_NUMBER_WORK; ?>"></td>

		</tr>
		
		<tr>

			<td>DIR_ENTRY_NUMBER_MOBILE</td>

			<td><input type="text" name="DIR_ENTRY_NUMBER_MOBILE" value="<?php echo $DIR_ENTRY_NUMBER_MOBILE; ?>"></td>

		</tr>

		<tr>

		<td>&nbsp;</td>

		<td><input type="submit"  name="submitSave"></td>

		</tr>

	</table>

</form>
</body>
</html>
