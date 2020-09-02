<? 
//    include("fckeditor/fckeditor.php");
//    include("ckeditor/ckeditor.php");
include_once "ckeditor/ckeditor.php";    
// create invoice
    if ($_POST['submit'] == "create") {

/* Converting Date */
        $date_start = explode("-", $_POST['date_start']);
        $date_start = $date_start[2].'-'.$date_start[0].'-'.$date_start[1];
        $complete_date = explode("-", $_POST['complete_date']);
        $complete_date = $complete_date[2].'-'.$complete_date[0].'-'.$complete_date[1];
        $paid_date = explode("-", $_POST['paid_date']);
        $paid_date = $paid_date[2].'-'.$paid_date[0].'-'.$paid_date[1];
/* Calculating 35% tax and Actual Net 
        $save_tax = $_POST['amount'] * .35;
*/        
        $sql = "INSERT INTO invoice SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', date_start='$date_start', complete_date='$complete_date', description='{$_POST['description']}', amount='{$_POST['amount']}', complete='{$_POST['complete']}', paid='{$_POST['paid']}', paid_checknum='{$_POST['paid_checknum']}', paid_date='$paid_date', loan_amount='{$_POST['loan_amount']}', loan_paid='{$_POST['loan_paid']}', interest_amount='{$_POST['interest_amount']}', interest_paid='{$_POST['interest_paid']}', project_cost='{$_POST['project_cost']}', save_tax='{$_POST['save_tax']}', actual_net='{$_POST['actual_net']}'";
		mysql_query($sql);
       
        $sqlA = "SELECT p.address, i.id FROM projectsites p, invoice i WHERE p.id='{$_POST['project_id']}' AND i.date_start='$date_start' AND i.amount='{$_POST['amount']}' AND i.sku_id='{$_POST['sku_id']}'";
        $sqlA = mysql_query($sqlA);
        list($p_address,$i_id) = mysql_fetch_row($sqlA);
  /* Converting Invoice ID to Invoice # */
                if ($i_id >= 10) {
        		      if ($i_id <= 99) {
        	       		  $i_inv = '00'.$i_id;		          
        		      } else {
        		          $i_inv = '0'.$i_id;
        		      }
        		} else if ($i_id <= 9) {
        			$i_inv = '000'.$i_id;
                }
 /* Create invoice folder for images */        
        $folder_pathA = 'projectsites/'.$p_address.'/Images/INV_'.$i_inv;
        $folder_pathB = 'projectsites/'.$p_address.'/Receipts/INV_'.$i_inv;
        
        mkdir( "$folder_pathA" ,  0777);
        mkdir( "$folder_pathB" ,  0777);
        
        $status = 'Record created successfully';
        
//		header("Location: main.php?page=invoices");
    }
// update invoice
    if ($_POST['submit'] == "update") {
/* Converting Dates */
        $date_start = explode("-", $_POST['date_start']);
        $date_start = $date_start[2].'-'.$date_start[0].'-'.$date_start[1];        
        $complete_date = explode("-", $_POST['complete_date']);
        $complete_date = $complete_date[2].'-'.$complete_date[0].'-'.$complete_date[1];
        $paid_date = explode("-", $_POST['paid_date']);
        $paid_date = $paid_date[2].'-'.$paid_date[0].'-'.$paid_date[1];
/* Calculating 35% tax and Actual Net */
        if ($_POST['project_cost'] == 'N/A') { $project_cost = '0.00'; } else { $project_cost = $_POST['project_cost']; }
        $save_tax = (($_POST['amount'])-($project_cost)) *.35;
        $actual_net = $_POST['amount'] - $save_tax - $project_cost;
        
        $sql = "UPDATE invoice SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', date_start='$date_start', complete_date='$complete_date', description='{$_POST['description']}', amount='{$_POST['amount']}', complete='{$_POST['complete']}', paid='{$_POST['paid']}', paid_checknum='{$_POST['paid_checknum']}', paid_date='$paid_date', loan_amount='{$_POST['loan_amount']}', loan_paid='{$_POST['loan_paid']}', interest_amount='{$_POST['interest_amount']}', interest_paid='{$_POST['interest_paid']}', project_cost='$project_cost', save_tax='$save_tax', actual_net='$actual_net' WHERE id='{$_GET['id']}'";                
        mysql_query($sql);
        
        $status = 'Record updated successfully';
        
//	    header("Location: main.php?page=invoices");
	}
/*
// remove invoice
    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM invoice WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: main.php?page=invoices");
	}
*/
// update invoice
    if ($_GET['action'] != 'create') {                     
        $sql = "SELECT * FROM invoice WHERE id='{$_GET['id']}'";
    	$sql = mysql_query($sql);
    	extract(mysql_fetch_assoc($sql));
/* Converting Dates */
        $date_start = explode("-", $date_start);
        $date_start = $date_start[1].'-'.$date_start[2].'-'.$date_start[0];
        $complete_date = explode("-", $complete_date);
        $complete_date = $complete_date[1].'-'.$complete_date[2].'-'.$complete_date[0];
        $paid_date = explode("-", $paid_date);
        $paid_date = $paid_date[1].'-'.$paid_date[2].'-'.$paid_date[0];
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
/* Converting Bid ID to Bid # */
            if ($bid_id > 0) {
                if ($bid_id >= 10) {
        		      if ($bid_id <= 99) {
        	       		  $bid = '00'.$bid_id;		          
        		      } else {
        		          $bid = '0'.$bid_id;
        		      }
        		} else if ($bid <= 9) {
        			$bid = '000'.$bid_id;
                }
           } else {
                $bid = 'No Bid';
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
                                                                <div style="padding-right: 10px;">Invoice #</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= $inv ?>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Bid #</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= $bid ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Client</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
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
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
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
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
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
                                                                <div style="padding-right: 10px;">Start Date (mm-dd-yyyy)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="date_start" value="<?= $date_start ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Complete Date</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="complete_date" value="<?= $complete_date ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column_XL.jpg') no-repeat; color: inherit; width: 235px; height: 225px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Description</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column_XL.jpg') no-repeat; width: 705px; height: 225px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding: 0px 15px 0px 15px;">
<?
/*
	$oFCKeditor = new fckeditor('description') ;
	$oFCKeditor->BasePath = 'fckeditor/' ;
	$oFCKeditor->ToolbarSet = "Basic" ;
	$oFCKeditor->Width = 670 ;
	$oFCKeditor->Height = 135 ;
	$oFCKeditor->Value = $description ;
	$oFCKeditor->Create() ;
*/
    $CKEditor = new CKEditor('description');
    $CKEditor->BasePath = 'ckeditor/';
    $config = array();
    $config['toolbar'] = array(
        array( 'Bold', 'Italic', '-','OrderedList','UnorderedList', '-', 'Link', 'Unlink', ),
    );
    $CKEditor->config['width'] = 670;
    $CKEditor->config['height'] = 135;
    $CKEditor->addEventHandler('instanceReady', 'function (evt) { alert("Loaded editor: " + evt.editor.name); }' );
    $CKEditor->editor("description",$description,$config);
    
?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Amount</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    $<input type="text" name="amount" value="<?= $amount ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Completed?</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="complete" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
                                                                        <option value="0" <? if($complete == '0') echo("selected"); ?>>No</option>
                                                                        <option value="1" <? if($complete == '1') echo("selected"); ?>>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Paid Date (mm-dd-yyyy)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <input type="text" name="paid_date" value="<?= $paid_date ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Paid?</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="paid" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
                                                                        <option value="0" <? if($paid == '0') echo("selected"); ?>>No</option>
                                                                        <option value="1" <? if($paid == '1') echo("selected"); ?>>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Check Number</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <input type="text" name="paid_checknum" value="<?= $paid_checknum ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
<?
    if ($_SESSION['username_access'] == 'admin') {
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Loan Amount</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    $<input type="text" name="loan_amount" value="<?= $loan_amount ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Loan Paid?</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="loan_paid" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
                                                                        <option value="0" <? if($loan_paid == '0') echo("selected"); ?>>No</option>
                                                                        <option value="1" <? if($loan_paid == '1') echo("selected"); ?>>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Interest Amount</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    $<input type="text" name="interest_amount" value="<?= $interest_amount ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Interest Paid?</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="interest_paid" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
                                                                        <option value="0" <? if($interest_paid == '0') echo("selected"); ?>>No</option>
                                                                        <option value="1" <? if($interest_paid == '1') echo("selected"); ?>>Yes</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
<?
	$sql_F = "SELECT SUM(total) FROM expense WHERE invoice_id='{$_GET['id']}'";
	$sql_F = mysql_query($sql_F);
    list($project_cost) = mysql_fetch_row($sql_F);
        if ($project_cost != "") {
            $project_profit = $amount - $project_cost;
            $project_cost = number_format($project_cost, 2, '.', ',');  
            $project_profit = '$'.number_format($project_profit, 2, '.', ',');
        } else {
            $project_cost = 'N/A';
            $project_profit = 'N/A';
        }
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Cost of Project</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="project_cost" value="<? if ($_GET['action'] != 'create') { echo($project_cost); } else { echo("N/A"); } ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
<?
    if ($project_cost != 'N/A') {
?>
                                                                    &nbsp; &#40;<a href="main.php?page=expense_details&amp;invoice%5Fid=<?= $_GET['id'] ?>&amp;action=view" target="_blank" style="border: 0px; text-decoration: underline;;">Details</a>&#41;
<?
    }
?>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Profit</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <input type="text" name="project_profit" value="<? if ($_GET['action'] != 'create') { echo($project_profit); } else { echo("N/A"); } ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Save for Taxes (35%)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    $<input type="text" name="save_tax" value="<?= $save_tax ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Actual Net</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    $<input type="text" name="actual_net" value="<?= $actual_net ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
<?
    }
?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background: inherit; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding-top: 10px;">
                                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                        <tr>
                                                            <td style="background: inherit; color: inherit; width: 705px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="width: 705px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                                                    <table style="width: 705px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                                        <tr>
                                                                            <td style="background: url('imgs/invoices_mileage_bar.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 705px; height: 38px;">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="background: #f6f6f6; color: #7e7878; width: 705px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">

<?
    $sqlM = "SELECT * FROM mileage WHERE project_id='$project_id' ORDER BY drive_date ";
    $sqlM = mysql_query($sqlM);
/* Counting Number of Rows, adding divider between each row until the end */ 
    $num_rows = mysql_num_rows($sqlM);      
    $i = 0;
    while($list = mysql_fetch_assoc($sqlM)) {                
        extract($list);
/* Converting Date */
        $drive_date = explode("-", $drive_date);
        $drive_date = $drive_date[1].'-'.$drive_date[2].'-'.$drive_date[0];
        $i++;
/* Narrow down results by showing just this invoice */
        if ($invoice == 'INV_'.$inv || $invoice_2 == 'INV_'.$inv || $invoice_3 == 'INV_'.$inv) {
?>            
                                                                                            <div style="width: 660px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; text-align: left; vertical-align: top;">
                                                                                                <table style="width: 660px;  border-collapse: collapse;">
                                                                                                    <tr>
                                                                                                        <td style="width: 89px; height: 38px; padding-left: 25px;"><?= $drive_date ?></td>
                                                                                                        <td style="width: 84px; height: 38px; padding: 0px;"><?= $start_miles ?></td>
                                                                                                        <td style="width: 115px; height: 38px; padding: 0px;"><?= $end_miles ?></td>
                                                                                                        <td style="width: 85px; height: 38px; padding: 0px;"><?= $subttl ?></td>
                                                                                                        <td style="width: 297px; height: 38px; padding: 0px;"><?= $notes ?></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                           </div>
<?
            if ($i != $num_rows) {
?>
                                                                                            <div style="margin: 0px auto; padding: 0px 14px 0px 15px; border: 0px;"><img src="imgs/divider.jpg" alt="divider" style="width: 660px; height: 3px;"></div>
<?
            }
        }
    }
?>

                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                            <td style="background: inherit; width: 235px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; margin: 0px auto;">
                                                                <div style="width 235px; padding: 43px 25px 0px 25px;">        
                                                                    <table style="width: 235px; border-collapse: collapse; margin: 0px auto; padding: 0px 0px 0px 0px;">
                                                                        <tr>
                                                                            <td style="width: 80px; padding: 0px 0px 5px 0px; margin: 0px auto;">
                                                                                <a href="main.php?page=invoices_images&amp;id=<?= $_GET[id] ?>&amp;pid=<?= $project_id ?>" style="border: 0px; text-decoration: none;"><img src="imgs/images_button.jpg" title="Images" alt="Images" style="width: 80px; height: 80px; border: 0px; padding: 0px; margin: 0px;"></a>
                                                                            </td>
                                                                            <td rowspan="3" style="width: 80px; vertical-align: middle; margin: 0px auto;">
<?
                if ($_SESSION['username_access'] == 'admin') {
?>
                                                                                <input type="submit" style="width: 80px; height: 121px;" name="submit" value="<?= $_GET['action']; ?>" id="<?= $_GET['action']; ?>">
<? 
                } else {
                    echo("&nbsp;");
                }
?>                                                                            
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 80px; padding: 5px 0px 5px 0px; margin: 0px auto;">
<?
                if ($_SESSION['username_access'] == 'admin') {
?>
                                                                                <a href="main.php?page=invoices_receipts&amp;id=<?= $_GET[id] ?>&amp;pid=<?= $project_id ?>" style="border: 0px; text-decoration: none;"><img src="imgs/receipts_button.jpg" title="Receipts" alt="Receipts" style="width: 80px; height: 80px; border: 0px; padding: 0px; margin: 0px;"></a>
<? 
                } else {
                    echo("&nbsp;");
                }
?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 80px; padding: 5px 0px 0px 0px; margin: 0px auto;">
                                                                                <a href="invoice_email.php?id=<?= $_GET['id'] ?>" target="_blank" style="border: 0px; text-decoration: none;"><img src="imgs/print_button.jpg" title="Print" alt="Print" style="width: 80px; height: 80px; border: 0px; padding: 0px; margin: 0px;"></a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
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