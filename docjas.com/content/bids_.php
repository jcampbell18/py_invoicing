<? 
    include("fckeditor/fckeditor.php");

// approving bid and creating invoice    
    if ($_GET['bid'] == "approve") {
        
        $sql = "SELECT client_id,sku_id,project_id,description,amount FROM bids WHERE id='{$_GET['id']}'";
        $sql = mysql_query($sql);
        list($client_id,$sku_id,$project_id,$description,$amount) = mysql_fetch_row($sql);
            $quotes = array('/"/',"/'/");
            $replacements = array('&quot;','&apos;');
            $new_description = preg_replace($quotes,$replacements,$description);
            $date_start = date("Y/m/d");
       
        $sqlA = "INSERT INTO invoice SET client_id='$client_id',sku_id='$sku_id',project_id='$project_id',bid_id='{$_GET['id']}', date_start='$date_start', description='$new_description', amount='$amount', complete='0', paid='0'";
		mysql_query($sqlA);     
        $sqlB = "UPDATE bids SET approve='1' WHERE id='{$_GET['id']}'";
        mysql_query($sqlB);
/* Create folder for the invoice */      
        $sqlC = "SELECT p.address, i.id FROM projectsites p, invoice i WHERE p.id='$project_id' AND i.bid_id='{$_GET['id']}'"; 
        $sqlC = mysql_query($sqlC);
        list($p_address,$i_id) = mysql_fetch_row($sqlC);
        
            if ($i_id >= 10) {
        		      if ($i_id <= 99) {
        	       		  $i_inv = '00'.$i_id;		          
        		      } else {
        		          $i_inv = '0'.$i_id;
        		      }
      		} else if ($i_id <= 9) {
        			$i_inv = '000'.$i_id;
            }
        
            $folder_pathA = 'projectsites/'.$p_address.'/Images/INV_'.$i_inv;
            $folder_pathB = 'projectsites/'.$p_address.'/Receipts/INV_'.$i_inv;
        
        mkdir( "$folder_pathA" ,  0777);
        mkdir( "$folder_pathB" ,  0777);
        
        $status = 'Record created successfully';
        
//	    header("Location: main.php?page=bids");
	}

// create invoice
    if ($_POST['submit'] == "create") {

/* Converting Date */
        $bid_date = explode("-", $_POST['bid_date']);
        $bid_date = $bid_date[2].'-'.$bid_date[0].'-'.$bid_date[1];

        $sql = "INSERT INTO bids SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', bid_date='$bid_date', description='{$_POST['description']}', amount='{$_POST['amount']}', approve='{$_POST['approve']}', denied='{$_POST['denied']}'";
		mysql_query($sql);
        
        $status = 'Record created successfully';
        
//		header("Location: main.php?page=bids");
    }
// update bid
    if ($_POST['submit'] == "update") {

/* Converting Date */
        $bid_date = explode("-", $_POST['bid_date']);
        $bid_date = $bid_date[2].'-'.$bid_date[0].'-'.$bid_date[1];

        $sql = "UPDATE bids SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', bid_date='$bid_date', description='{$_POST['description']}', amount='{$_POST['amount']}', approve='{$_POST['approve']}', denied='{$_POST['denied']}' WHERE id='{$_GET['id']}'";        
        mysql_query($sql);
        
        if ($_POST['approve'] == "1") {
            $sqlA = "INSERT INTO invoices SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', bid_id='{$_GET['id']}', description='$description', amount='$amount', complete='0', paid='0'";
		  mysql_query($sqlA);
        }
        
        $status = 'Record updated successfully';
        
//	    header("Location: main.php?page=bids");
	}
/*
// remove invoice
    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM bids WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: main.php?page=bids");
	}
*/
// update invoice
    if ($_GET['action'] != 'create') {                     
        $sql = "SELECT * FROM bids WHERE id='{$_GET['id']}'";
    	$sql = mysql_query($sql);
    	extract(mysql_fetch_assoc($sql));
/* Converting Date */
        $bid_date = explode("-", $bid_date);
        $bid_date = $bid_date[1].'-'.$bid_date[2].'-'.$bid_date[0];
/* Converting Invoice ID to Invoice # */
        if ($id >= 10) {
		      if ($id <= 99) {
	       		  $inv = '00'.$id;		          
		      } else {
		          $inv = '0'.$id;
		      }
		} else if ($id <= 9) {
			$inv = '000'.$id;
        }
    }
?>
                            
                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <form action="" method="post">
                                    <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                        <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                            <tr>
                                                <td style="background: inherit; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
<? if ($status) { ?>
                                                        <tr>
                                                            <td colspan="4" style="background: inherit; color: #FA1706; font-weight: bold; width: 940px; height: 50px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="width: 940px; padding: 0px 0px 0px 0px; text-align: center;"><?= $status; ?></div>
                                                            </td>
                                                        </tr>
<? } ?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Bid #</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= $inv ?>
                                                                </div>
                                                            </td>
                                                            <td rowspan="9" style="background: inherit; color: inherit; width: 111px; vertical-align: middle; border: 0px; padding: 0px 0px 0px 0px; margin: 0px auto;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="submit" style="width: 80px; height: 121px;" name="submit" value="<?= $_GET['action']; ?>" id="<?= $_GET['action']; ?>">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Client</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="client_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_a = "SELECT id,business_name FROM clients";
	$sql_a = mysql_query($sql_a);
	while(list($cid,$cname) = mysql_fetch_row($sql_a)) {
?>
								                                        <option value="<?= $cid ?>" <? if($client_id == $cid) echo("selected"); ?>><?= $cname ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">SKU</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="sku_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
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
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Project Site</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="project_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_c = "SELECT id,address,city,state,zipcode FROM projectsites";
	$sql_c = mysql_query($sql_c);
	while(list($pid,$paddress,$pcity,$pstate,$pzipcode) = mysql_fetch_row($sql_c)) {
?>
								                                        <option value="<?= $pid ?>" <? if($project_id == $pid) echo("selected"); ?>><?= $paddress.', '.$pcity.', '.$pstate.' '.$pzipcode ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Bid Date (mm-dd-yyyy)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="bid_date" value="<?= $bid_date ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column_L.jpg') no-repeat; color: inherit; width: 235px; height: 165px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Description</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column_L.jpg') no-repeat; width: 594px; height: 165th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding: 0px 15px 0px 15px;">
<?
	$oFCKeditor = new fckeditor('description') ;
	$oFCKeditor->BasePath = 'fckeditor/' ;
	$oFCKeditor->ToolbarSet = "Basic" ;
	$oFCKeditor->Width = 585 ;
	$oFCKeditor->Height = 135 ;
	$oFCKeditor->Value = $description ;
	$oFCKeditor->Create() ;
?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Amount</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    $<input type="text" name="amount" value="<?= $amount ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Approved?</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="approve" value="<? if ($approve != 0) { echo("Yes"); } else { echo("No"); } ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            <? /* <div style="padding-left: 10px;">
                                                                    <select name="approve" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
                                                                        <option value="1" <? if($approve == '1') echo("selected"); ?>>Yes</option>
                                                                        <option value="0" <? if($approve == '0') echo("selected"); ?>>No</option>
                                                                    </select>
                                                                </div> */ ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Denied or Expired?</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="denied" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
                                                                        <option value="0" <? if($denied == '0') echo("selected"); ?>>No</option>
                                                                        <option value="1" <? if($denied == '1') echo("selected"); ?>>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </td>