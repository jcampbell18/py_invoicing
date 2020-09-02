<?
/* AUTHENTICATION */
    include("common/author.php");     
/* Header */ 
    include("common/header.php");
    
$page = $_GET['page'];
?>
<form id="form-1" action="" method="post">
  <fieldset>
    <legend><?= strtoupper($_SESSION['username_access']); ?></legend>
<? /*        <div style="font-weight: bold; font-size: 12px; text-align: center; padding: 0px 0px 20px 0px;"><?= ucfirst($page); ?></div> */ ?>
        <ol class="buttons">
            <li style="padding-left: 20px; font-size: 14px; vertical-align: middle;"><?= ucfirst($page); ?></li>
            <li style=""><input type="submit" class="button" value="Create" /></li>
        </ol>
<?
    $sql = "SELECT * FROM invoice ORDER BY ID DESC";
    $sql = mysql_query($sql);
/* Counting Number of Rows, adding divider between each row until the end */ 
    $num_rows = mysql_num_rows($sql);      
    $i = 0;
    while($list = mysql_fetch_assoc($sql)) {
        extract($list);
        $i++;
/* Converting ID to Invoice # */
        if ($id >= 10) {
		      if ($id <= 99) {
	       		  $inv = '00'.$id;		          
		      } else {
		          $inv = '0'.$id;
		      }
		} else if ($id <= 9) {
			$inv = '000'.$id;
        }
/* Converting Project Sites id and SKU id to actual name */
        $sqlB = "SELECT p.address,p.city,p.state,p.zipcode,s.name FROM projectsites AS p, sku AS s WHERE p.id='$project_id' AND s.id='$sku_id'";
        $sqlB = mysql_query($sqlB);
        list($address,$city,$state,$zipcode,$sku_name) = mysql_fetch_row($sqlB);
/* converting binary to either checked or unchecked box */
        if ($complete == 1) {
            $complete_checkbox = 'checked';
        } else {
            $complete_checkbox = 'unchecked';
        }
        if ($paid == 1) {
            $paid_checkbox = 'checked';
        } else {
            $paid_checkbox = 'unchecked';
        }
/* Changing the date to regular format */
        $mdy = explode("-",$date_start);
        $date_start = $mdy[1].'-'.$mdy[2].'-'.$mdy[0];
?>
        <ol style="margin-bottom: 20px;">
            <li style="height: 60px; font-size: 12px; font-weight: none; padding: 10px 10px 10px 10px;">
            <a href="content_.php?page=invoices&amp;id=<?= $id ?>&amp;action=update" style="border: 0px; text-decoration: none; color: inherit;">
                <table style="height: 60px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                    <tr>
                        <td style="width: 180px; padding: 0px; margin: 0px; border: 0px;">
                            Invoice #<?= $inv ?><br />
                            <?= $date_start ?><br />
                            <?= $address ?><br />
                            <?= $sku_name ?> &nbsp; &nbsp; $<?= number_format($amount, 2, '.', ',') ?>
                            </td>
                        <td style="width: 60px; padding: 0px; margin: 0px; border: 0px; font-size: 11px;">
                            <ol style="width: 60px; height: 40px;">
                                <li>
                            Done?<img src="imgs/box_<?= $complete_checkbox ?>.png" alt="box_<?= $complete_checkbox ?>.png" style="width: 16px; height: 20px; border: 0px; margin: 0px auto; padding: 0px;" /><br />
                            Paid?&nbsp;&nbsp;<img src="imgs/box_<?= $paid_checkbox ?>.png" alt="box_<?= $paid_checkbox ?>.png" style="width: 16px; height: 20px; border: 0px; margin: 0px auto; padding: 0px;" />
                                </li>
                            </ol>
                        </td>
                    </tr>
                </table>
<? /*
                <div style="float:  left;"><a href="content_.php?page=invoices&id=1" style="border: 0px; text-decoration: none; color: inherit;">
                Invoice #<?= $inv ?> - <?= $date_start ?><br />
                <b><?= $address ?></b><br />
                <?= $sku_name ?> &nbsp; &nbsp; &nbsp; $<?= number_format($amount, 2, '.', ',') ?>
            </a></div>
            <div style="float: right; font-size: 11px; font-weight: none; vertical-align: top;">
                Done?<img src="imgs/box_<?= $complete_checkbox ?>.png" alt="box_<?= $complete_checkbox ?>.png" style="width: 16px; height: 20px; border: 0px; margin: 0px auto; padding: 0px;" /><br />
                Paid?<img src="imgs/box_<?= $paid_checkbox ?>.png" alt="box_<?= $paid_checkbox ?>.png" style="width: 16px; height: 20px; border: 0px; margin: 0px auto; padding: 0px;" />
            </div>
*/ ?>
            </li>
        </ol>
<?
    }
?>
  </fieldset>
</form>
<?
/* Footer */ 
    include("common/footer.php");
?>
</html>