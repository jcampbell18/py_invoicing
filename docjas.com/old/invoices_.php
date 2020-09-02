<?
   	include("common/author.php");
    include("fckeditor/fckeditor.php");
    
    $tablename='invoice';

	if ($_POST['submit'] == "update") {
        $sql = "UPDATE $tablename SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', date_start='{$_POST['date_start']}', description='{$_POST['description']}', amount='{$_POST['amount']}', complete='{$_POST['complete']}', paid='{$_POST['paid']}' WHERE id='{$_GET['id']}'";
        mysql_query($sql);
	    header("Location: invoices.php");
	}

    if ($_POST['submit'] == "add") {
// insert query
		$sql = "INSERT INTO $tablename SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', date_start='{$_POST['date_start']}', description='{$_POST['description']}', amount='{$_POST['amount']}', complete='{$_POST['complete']}', paid='{$_POST['paid']}'";
		mysql_query($sql);
		header("Location: invoices.php");
	}
// remove project
    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM $tablename WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: invoices.php");
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
		<td bgcolor="#FAFAFA" class="content" style="font-weight: bold; text-decoration: underline;">Invoices</td>
	</tr>
	<tr>
		<td style="padding: 14px;" class="content">
			<form action="" method="post">
				<table cellpadding="5" cellspacing="0" style="width: 100%; border: 0px;">
                    <tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">Client</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
                            <select name="client_id">
								<option value="">&nbsp;</option>
<?
	$sql_a = "SELECT id,business_name FROM client";
	$sql_a = mysql_query($sql_a);
	while(list($cid,$cname) = mysql_fetch_row($sql_a)) {
?>
								<option value="<?= $cid ?>" <? if($client_id == $cid) echo("selected"); ?>><?= $cname ?></option>
<?
	}
?>
							</select>
                        </td>
					</tr>
					<tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">SKU</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
                            <select name="sku_id">
								<option value="">&nbsp;</option>
<?
	$sql_b = "SELECT id,name FROM sku";
	$sql_b = mysql_query($sql_b);
	while(list($sid,$sname) = mysql_fetch_row($sql_b)) {
?>
								<option value="<?= $sid ?>" <? if($sku_id == $sid) echo("selected"); ?>><?= $sname ?></option>
<?
	}
?>
							</select>
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
						<td class="content" style="padding-bottom: 12px; width: 120px;">Start Date</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
							<input type="text" name="date_start" value="<?= $date_start ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">Description</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
						      <?
								$oFCKeditor = new fckeditor('description') ;
								$oFCKeditor->BasePath = 'fckeditor/' ;
								$oFCKeditor->ToolbarSet = "Basic" ;
								$oFCKeditor->Width = 650 ;
								$oFCKeditor->Height = 150 ;
								$oFCKeditor->Value = $description ;
								$oFCKeditor->Create() ;
							?>
						</td>
					</tr>
                    <tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">Amount</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
							<input type="text" name="amount" value="<?= $amount ?>" style="width: 500px;" class="content" />
						</td>
					</tr>
                    <tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">Mileage</td>
                        <td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
                            <table style="border:  1px solid #000000;">
                                <tr>
                                    <td class="content" style="padding-left: 20px; padding-bottom: 6px; width: 120px; font-weight: bold; text-decoration: underline;">Date</td>
                                    <td class="content" style="padding-bottom: 6px; width: 120px; font-weight: bold; text-decoration: underline;">Start</td>
                                    <td class="content" style="padding-bottom: 6px; width: 120px; font-weight: bold; text-decoration: underline;">End</td>
                                    <td class="content" style="padding-bottom: 6px; width: 120px; font-weight: bold; text-decoration: underline;">Total Miles</td>
                                </tr>
<?php
	$sql_d = "SELECT drive_date,start_miles,end_miles,subttl FROM mileage WHERE project_id='$project_id'";
// print($sql_d);
	$sql_d = mysql_query($sql_d);
	while(list($drive_date,$start_miles,$end_miles,$subttl) = mysql_fetch_row($sql_d)) {
?>
                                <tr>
                                    <td class="content" style="padding-left: 20px; padding-bottom: 6px; width: 120px;"><?= $drive_date ?></td>
                                    <td class="content" style="padding-bottom: 6px; width: 120px;"><?= $start_miles ?></td>
                                    <td class="content" style="padding-bottom: 6px; width: 120px;"><?= $end_miles ?></td>
                                    <td class="content" style="padding-bottom: 6px; width: 120px;"><?= $subttl ?></td>
                                </tr>
<?php
    }
?>
                            </table>
                        </td>
                    </tr>
                    <tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">Images and Receipts</td>
                        <td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
                            <input type="button" name="images" value="IMAGES" onclick="window.location='images.php?pid=<?= $project_id ?>&action=view';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;">
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <input type="button" name="receipts" value="RECEIPTS" onclick="window.location='images.php?pid=<?= $project_id ?>&action=view';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;">
                        </td>
                    </tr>
                    <tr>
						<td class="content" style="padding-bottom: 12px; width: 120px;">Completed?</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
                            <select name="complete">
                                <option value="1" <? if($complete == '1') echo("selected"); ?>>Yes</option>
                                <option value="0" <? if($complete == '0') echo("selected"); ?>>No</option>
                            </select>
                        </td>
					</tr>
                    <tr>
						<td class="content" style="width: 120px;">Paid?</td>
						<td colspan="2" style="color: #000000; background: inherit;">
							<select name="paid">
                                <option value="1" <? if($paid == '1') echo("selected"); ?>>Yes</option>
                                <option value="0" <? if($paid == '0') echo("selected"); ?>>No</option>
                            </select>
						</td>
					</tr>
                    <tr>
						<td colspan="2">
							<table cellpadding="0" cellspacing="5" style="border: 0px; width: 100%;">
								<tr>
			                        <td align="center" style="padding-top: 20px; width: 50%;">
											<input type="button" class="inputbutton" value="go back" onclick="window.location='invoices.php';" />
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