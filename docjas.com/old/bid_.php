<?
   	include("common/author.php");
    include("fckeditor/fckeditor.php");
    
    $tablename='bids';

	if ($_POST['submit'] == "update") {
        $sql = "UPDATE $tablename SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', bid_date='{$_POST['bid_date']}', description='{$_POST['description']}', amount='{$_POST['amount']}', approve='{$_POST['approve']}' WHERE id='{$_GET['id']}'";
        mysql_query($sql);
	    header("Location: bid.php");
	}

    if ($_POST['submit'] == "add") {
// insert query
		$sql = "INSERT INTO $tablename SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', bid_date='{$_POST['bid_date']}', description='{$_POST['description']}', amount='{$_POST['amount']}', approve='{$_POST['approve']}'";
        mysql_query($sql);
		header("Location: bid.php");
        
	}
// remove project
    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM $tablename WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: bid.php");
	}

// approving bid and creating invoice    
    if ($_GET['action'] == "approve") {
        
        $sql = "SELECT client_id,sku_id,project_id,description,amount FROM $tablename WHERE id='{$_GET['id']}'";
        $sql = mysql_query($sql);
        list($client_id,$sku_id,$project_id,$description,$amount) = mysql_fetch_row($sql);
        
        $sqlA = "INSERT INTO invoice SET client_id='$client_id',sku_id='$sku_id',project_id='$project_id',bid_id='{$_GET['id']}', description='$description', amount='$amount', complete='0', paid='0'";
		mysql_query($sqlA);
        
        $sqlB = "UPDATE $tablename SET approve='1' WHERE id='{$_GET['id']}'";
        mysql_query($sqlB); 
        
	    header("Location: bid.php");
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
		<td bgcolor="#FAFAFA" class="content" style="font-weight: bold; text-decoration: underline;">Bids</td>
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
						<td class="content" style="padding-bottom: 12px; width: 120px;">Bid Date</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
							<input type="text" name="bid_date" value="<?= $bid_date ?>" style="width: 500px;" class="content" />
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
						<td class="content" style="padding-bottom: 12px; width: 120px;">Approved?</td>
						<td colspan="2" style="padding-bottom: 12px; color: #000000; background: inherit;">
                            <select name="approve">
                                <option value="1" <? if($approve == '1') echo("selected"); ?>>Yes</option>
                                <option value="0" <? if($approve == '0') echo("selected"); ?>>No</option>
                            </select>
                        </td>
					</tr>
                    <tr>
						<td colspan="2">
							<table cellpadding="0" cellspacing="5" style="border: 0px; width: 100%;">
								<tr>
			                        <td align="center" style="padding-top: 20px; width: 50%;">
											<input type="button" class="inputbutton" value="go back" onclick="window.location='bid.php';" />
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