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
table{width:100%;}
</style>
</head>
<body>
<?php
    $tbook = simplexml_load_file("contacts.xml") or die("xml not loading");
if(isset($_GET['action'])) {

    $id = $_GET['id'];
    $index = 0;
    $i = 0;
     
    foreach($tbook->DIR_ENTRY as $DIR_ENTRY) {
        if ($DIR_ENTRY['id'] == $id) {
            $index = $i;
            break;
        }
        $i++;
    }
    unset($tbook->DIR_ENTRY[$index]);
    file_put_contents('contacts.xml', $tbook->asXML());
    }
?>
<div class="row">
	
	<div class="column">
<div class="large-12 columns">
<table class="table table-hover table-bordered table-sieve" celppadding="2" cellspacing="2" border="1">
<thead>
        <tr>
	    <th>id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Work number</th>
            <th>Mobile number</th>
	    <th>&nbsp;</th>
        </tr>
</thead>
<tbody>
<?php

foreach($tbook->DIR_ENTRY as $DIR_ENTRY) { ?>
<tr>
<td> <?php echo $DIR_ENTRY['id']; ?> </td>
<td> <?php echo $DIR_ENTRY->DIR_ENTRY_NAME_FIRST; ?> </td>
<td> <?php echo $DIR_ENTRY->DIR_ENTRY_NAME_LAST; ?></td>
<td> <?php echo $DIR_ENTRY->DIR_ENTRY_NUMBER_WORK; ?></td>
<td> <?php echo $DIR_ENTRY->DIR_ENTRY_NUMBER_MOBILE; ?></td>
<td align="center"><a class="small button" href="edit.php?id=<?php echo $DIR_ENTRY['id']; ?>"><i class="fa fa-pencil fa-fw"></i>&nbsp; Edit</a> <a class="small button secondary" href="index.php?action=delete&id=<?php echo $DIR_ENTRY['id']; ?>" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
</tr>
<?php } ?>
</tbody>
</table>
				
		<div class="show-for-medium">
		<a class="primary button" href="add.php"><i class="fa fa-plus"></i>  Add a new DIR_ENTRY</a>
		</div>
		
		<div class="show-for-small-only">
			<a class="small button"><i class="fa fa-plus"></i>Add</a>
			
		</div>
</div>
</div>
</div>
</body>
  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="js/jquery.sieve.js"></script>
  <script>
$(document).ready(function() {
    var searchTemplate = "<div class='row form-inline'><label style='float: right;'>Search: <input type='text' class='form-control' placeholder='(start typing)'></label></div>"
    $(".table-sieve").sieve({ searchTemplate: searchTemplate });
}); 
  </script>

</html>
