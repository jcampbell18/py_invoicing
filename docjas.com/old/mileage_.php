<?
   	include("common/author.php");
    
    $tablename='mileage';

	if ($_POST['submit'] == "update") {
        $sql = "UPDATE $tablename SET drive_date='{$_POST['drive_date']}', project_id='{$_POST['project_id']}', start_miles='{$_POST['start_miles']}', end_miles='{$_POST['end_miles']}', subttl='{$_POST['subttl']}' WHERE id='{$_GET['id']}'";
        mysql_query($sql);
	    header("Location: mileage.php");
	}

    if ($_POST['submit'] == "add") {
		$sql = "INSERT INTO $tablename SET drive_date='{$_POST['drive_date']}', project_id='{$_POST['project_id']}', start_miles='{$_POST['start_miles']}', end_miles='{$_POST['end_miles']}', subttl='{$_POST['subttl']}'";
// print($sql);
// exit();
		mysql_query($sql);
		header("Location: mileage.php");
	}

    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM $tablename WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: mileage.php");
	}

    if ($_GET['action'] != "add") {
        $sql = "SELECT * FROM $tablename WHERE id='{$_GET['id']}'";
		$sql = mysql_query($sql);
		extract(mysql_fetch_assoc($sql));
	}

    include("common/header.php");

?>



<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

<table border="0" cellspacing="0" cellpadding="8" style="width: 100%; border: 0px solid #000000;">
	<tr>
		<td bgcolor="#FAFAFA" class="content" style="font-weight: bold; text-decoration: underline;">Mileage</td>
	</tr>
	<tr>
		<td style="padding: 14px;" class="content">
			<form action="" method="post">
				<table cellpadding="5" cellspacing="0" style="width: 100%; border: 0px;">
                    <tr>
						<td class="content" style="width: 120px;">Date Driven</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="drive_date" value="<?= $drive_date ?>" style="width: 500px;" class="content" />
						 </td>
					</tr>
                    <tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">Project Site</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
                            <select name="project_id">
								<option value="">&nbsp;</option>
<?
	$sql_c = "SELECT id,address,city,state,zipcode FROM project_site";
	$sql_c = mysql_query($sql_c);
	while(list($pid,$paddress,$pcity,$pstate,$pzipcode) = mysql_fetch_row($sql_c)) {
?>
								<option value="<?= $pid ?>" <? if($project_id == $pid) echo("selected"); ?>><?= $paddress.', '.$pcity.', '.$pstate.' '.$pzipcode ?></option>
<?
	}
?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="content" style="width: 120px;">Start Mileage</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="start_miles" value="<?= $start_miles ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td class="content" style="width: 120px;">End Mileage</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="end_miles" value="<?= $end_miles ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td class="content" style="width: 120px;">Total Miles</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<input type="text" name="subttl" value="<?= $subttl ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td colspan="2">
							<table cellpadding="0" cellspacing="5" style="border: 0px; width: 100%;">
								<tr>
			                        <td align="center" style="padding-top: 20px; width: 50%;">
											<input type="button" class="inputbutton" value="go back" onclick="window.location='mileage.php';" />
									</td>
									<td align="center" style="padding-top: 20px; width: 50%;">
											<input type="submit" name="submit" class="inputbutton" value="<?php if ($_GET['action'] != 'add') echo("update"); else echo("add"); ?>" class="inputbutton" />
									</td>
								</tr>
							</table>
			</form>
						</td>
					</tr>
				</table>
		</td>
	</tr>
</table>
</form>

</div>



<? include("common/footer.php") ?>