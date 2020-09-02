<?
/* AUTHENTICATION */
    include("common/author.php");     
/* Header */ 
    include("common/header.php");

$page = $_GET['page'];
$id = $_GET['id'];

include_once "ckeditor/ckeditor.php";    
// create invoice
    if ($_POST['submit'] == "create") {

/* Converting Date */
        $date_start = explode("-", $_POST['date_start']);
        $date_start = $date_start[2].'-'.$date_start[0].'-'.$date_start[1];
        $complete_date = explode("-", $_POST['complete_date']);
        $complete_date = $complete_date[2].'-'.$complete_date[0].'-'.$complete_date[1];
        

        $sql = "INSERT INTO invoice SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', date_start='$date_start', complete_date='$complete_date', description='{$_POST['description']}', amount='{$_POST['amount']}', complete='{$_POST['complete']}', paid='{$_POST['paid']}', paid_checknum='{$_POST['paid_checknum']}', loan_amount='{$_POST['loan_amount']}', loan_paid='{$_POST['loan_paid']}', interest_amount='{$_POST['interest_amount']}', interest_paid='{$_POST['interest_paid']}'";
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

        $sql = "UPDATE invoice SET client_id='{$_POST['client_id']}',sku_id='{$_POST['sku_id']}',project_id='{$_POST['project_id']}', date_start='$date_start', complete_date='$complete_date', description='{$_POST['description']}', amount='{$_POST['amount']}', complete='{$_POST['complete']}', paid='{$_POST['paid']}', paid_checknum='{$_POST['paid_checknum']}', loan_amount='{$_POST['loan_amount']}', loan_paid='{$_POST['loan_paid']}', interest_amount='{$_POST['interest_amount']}', interest_paid='{$_POST['interest_paid']}' WHERE id='{$_GET['id']}'";                
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
<form id="form-1" action="" method="post">
  <fieldset>
    <legend><?= strtoupper($_SESSION['username_access']); ?></legend>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Invoice: &nbsp;#<?= $inv ?></li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Bid: &nbsp;#<?= $bid ?></li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Client: &nbsp;
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
            </li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">SKU: &nbsp;
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
            </li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Project Site: &nbsp;
                <select name="project_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
                    <option value="">&nbsp;</option>
<?
	$sql_c = "SELECT id,address,city,state,zipcode FROM projectsites";
	$sql_c = mysql_query($sql_c);
	while(list($pid,$paddress,$pcity,$pstate,$pzipcode) = mysql_fetch_row($sql_c)) {
	       $combine_address = $paddress.', '.$pcity.', '.$pstate.' '.$pzipcode;
?>
                    <option value="<?= $pid ?>" <? if($project_id == $pid) echo("selected"); ?>><?= $paddress ?></option>
<?
	}
?>
                </select>
            </li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Start Date: &nbsp; 
                <input type="text" name="date_start" value="<?= $date_start ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;"></li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Complete Date: &nbsp; 
                <input type="text" name="complete_date" value="<?= $complete_date ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
            </li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Description:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Amount: &nbsp; 
                $<input type="text" name="amount" value="<?= $amount ?>" style="width: 100px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
            </li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Completed?:</li>
        </ol>       
        <ol>
            <li style="font-size: 12px; font-weight: none;">Paid?:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Check Number:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Loan Amount:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Loan Paid?:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Interest Amount:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Interest Paid?:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Cost of Project:</li>
        </ol>
        <ol>
            <li style="font-size: 12px; font-weight: none;">Profit:</li>
        </ol>
        Image/Receipts/Mileage
  </fieldset>
</form>
<?
/* Footer */ 
    include("common/footer.php");
?>
</html>