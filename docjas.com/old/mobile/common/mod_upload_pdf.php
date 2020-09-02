<?

 // If deleting file, unlink it
 if ($_POST["mod_upload_deleting"] == 'true') {
	$f = $_POST["mod_upload_path"] . "/" . $_POST["mod_upload_filename"];
	if (file_exists($f)) unlink($f);
 }

 // If uploading file, move file to PDF directory.
 $from = $_FILES["mod_upload_userfile"]["tmp_name"];
 $to   = $_FILES["mod_upload_userfile"]["name"];
 if (is_uploaded_file($from)) {
	$to = str_replace("%20","_",$to);
	$to = str_replace("&","_",$to);
	$to = str_replace("`","_",$to);
	$to = str_replace(" ","_",$to);
	$to = str_replace("/","_",$to);
	$to = str_replace("\\","_",$to);
	$to = str_replace("'","_",$to);
	$to = strtolower($to);
	$to = $_POST["mod_upload_path"] . "/" . $to;
	copy($from, $to);
 }

 function write_form($action,$note,$path) { ?>

<a name="mod_upload"></a>
<div style="padding-left:20px; vertical-align: top;">
	<table border="0" cellspacing="0" cellpadding="3">
		<form method="POST" enctype="multipart/form-data">
			<tr>
				<td bgcolor="#EAEAEA" class="content"><b>Note:</b> <?=$note; ?></td>
			</tr>
			<tr>
				<td bgcolor="#FAFAFA" class="content">
					<input type="hidden" name="mod_upload_uploading" value="true">
					<input type="hidden" name="mod_upload_path" value="<?=$path; ?>"><b>Upload file:</b>
					<input type="file" name="mod_upload_userfile" class="inputbox" style="width:200px;">&nbsp;&nbsp;
					<input type="submit" value="upload" class="buttons">
				</td>
			</tr>
		</form>
		<form method="POST" enctype="multipart/form-data">
 <tr>
	<td bgcolor="#EAEAEA" class="content">
		<input type="hidden" name="mod_upload_deleting" value="true">
		<input type="hidden" name="mod_upload_path" value="<?=$path; ?>">
		<b>Delete file:</b>
		<select name="mod_upload_filename" class="selectbox">
<?

	$dirA = opendir($path);
	$items = array();
	while($filename = readdir($dirA)) if (is_file($path."/".$filename)) array_push($items,$filename);
	closedir($dirA);
	asort($items);
	foreach($items as $filename) echo("  <option value=\"$filename\"$s>$filename</option>\n");

?>
		</select>&nbsp;&nbsp;<input type="submit" value="delete" class="buttons">
	</td>
 </tr>
 </form>
</table>
</div>
<?
	}

 function write_uplbox($name,$path,$cur) {
?>

 <select name="<?=$name; ?>" class="selectbox">
	<option value=""></option>

<?
	$dirA = opendir($path);
	$items = array();
	while($filename = readdir($dirA)) if (is_file($path."/".$filename)) array_push($items,$filename);
	closedir($dirA);
	asort($items);
	foreach($items as $filename) {
		if ($filename == $cur) $ss = " selected"; else $ss = "";
		echo("  <option value=\"$filename\"$s>$filename</option>\n");
	}
?>
 </select>
<?
 }
?>