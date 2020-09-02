<?
// create invoice
    if ($_POST['submit'] == "create") {

/* Converting Date */
        $pdate = explode("-", $_POST['pdate']);
        $pdate = $pdate[2].'-'.$pdate[0].'-'.$pdate[1];
        
        $subtotal = $_POST['qty'] * $_POST['amount'];
        if ($_POST['ytax'] != 1) {
            $ytax = $_POST['ytax'];
            $tax = ".087" * $subtotal;
            $total = $subtotal + $tax;
        } else {
            $ytax = $_POST['ytax'];
            $tax = 0.00;
            $total = $subtotal + $tax;
        }
        
        $quotes = array('/"/',"/'/");
        $replacements = array('&#34;','&#39;');
        $name = preg_replace($quotes,$replacements,$_POST['name']);

        $sql = "INSERT INTO expense SET invoice_id='{$_POST['invoice_id']}',vendor_id='{$_POST['vendor_id']}',expense_category_id='{$_POST['expense_category_id']}',vehicles_id='{$_POST['vehicles_id']}', pdate='$pdate', name='$name', qty='{$_POST['qty']}', amount='{$_POST['amount']}', ytax='$ytax', subtotal='$subtotal', tax='$tax', total='$total', receipt_reference='{$_POST['receipt_reference']}', image='{$_POST['image']}'";
		mysql_query($sql);

        $status = 'Record created successfully';
        
    }
// update invoice
    if ($_POST['submit'] == "update") {

/* Converting Date */
        $pdate = explode("-", $_POST['pdate']);
        $pdate = $pdate[2].'-'.$pdate[0].'-'.$pdate[1];
        
        $subtotal = $_POST['qty'] * $_POST['amount'];
        if ($_POST['ytax'] != 1) {
            $tax = ".087" * $subtotal;
            $total = $subtotal + $tax;
        } else {
            $tax = 0.00;
            $total = $subtotal + $tax;
        }
        
        $quotes = array('/"/',"/'/");
        $replacements = array('&#34;','&#39;');
        $name = preg_replace($quotes,$replacements,$_POST['name']);

        $sql = "UPDATE expense SET invoice_id='{$_POST['invoice_id']}',vendor_id='{$_POST['vendor_id']}',expense_category_id='{$_POST['expense_category_id']}',vehicles_id='{$_POST['vehicles_id']}', pdate='$pdate', name='$name', qty='{$_POST['qty']}', amount='{$_POST['amount']}', subtotal='$subtotal', ytax='$ytax', tax='$tax', total='$total', receipt_reference='{$_POST['receipt_reference']}', image='{$_POST['image']}' WHERE id='{$_GET['id']}'";        
        mysql_query($sql);
        
        $status = 'Record updated successfully';
	}

// update invoice
    if ($_GET['action'] != 'create') {                     
        $sql = "SELECT * FROM expense WHERE id='{$_GET['id']}'";
    	$sql = mysql_query($sql);
    	extract(mysql_fetch_assoc($sql));
/* Converting Date */
        $pdate = explode("-", $pdate);
        $pdate = $pdate[1].'-'.$pdate[2].'-'.$pdate[0];
/* Switching back from ASCII to normal */
        $quotes = array('/&#34;/','/&#39;/');
        $replacements = array('*',"'");
        $name = preg_replace($quotes,$replacements,$name);
/* Converting Invoice ID to Invoice # */
        if ($invoice_id >= 10) {
		      if ($invoice_id <= 99) {
	       		  $invoice_id = '00'.$invoice_id;		          
		      } else {
		          $invoice_id = '0'.$invoice_id;
		      }
		} else if ($invoice_id <= 9) {
			$invoice_id = '000'.$invoice_id;
        }
    }
?>
                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <form action="" method="post">
                                    <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                        <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                            <tr>
                                                <td style="background: inherit; color: #7e7878; width: 705px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                    <table style="width: 705px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
<? if ($status) { ?>
                                                        <tr>
                                                            <td colspan="4" style="background: inherit; color: #FA1706; font-weight: bold; width: 705px; height: 50px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="width: 705px; padding: 0px 0px 0px 0px; text-align: center;"><?= $status; ?></div>
                                                            </td>
                                                        </tr>
<? } ?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Invoice</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="invoice_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="0">N/A</option>
<?
	$sql_a = "SELECT i.id, p.address, p.city, p.state, p.zipcode, s.name FROM invoice i, projectsites p, sku s WHERE i.project_id=p.id AND s.id=i.sku_id ORDER BY i.id,p.address";
	$sql_a = mysql_query($sql_a);
	while(list($inv_id, $inv_address, $inv_city, $inv_state, $inv_zipcode, $inv_sku) = mysql_fetch_row($sql_a)) {
        $inv_projectsite = $inv_address.', '.$inv_city.', '.$inv_state.' '.$inv_zipcode;	   
/* Converting Invoice ID to Invoice # */
        if ($inv_id >= 10) {
              if ($inv_id <= 99) {
           		  $inv_idA = 'INV_00'.$inv_id;		          
              } else {
                  $inv_idA = 'INV_0'.$inv_id;
              }
        } else if ($inv_id <= 9) {
        	$inv_idA = 'INV_000'.$inv_id;
        }
?>
								                                        <option value="<?= $inv_id ?>" <? if($inv_id == $invoice_id) echo("selected"); ?>><?= $inv_idA.' - '.$inv_projectsite.' ('.$inv_sku.')' ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Vehicle</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="vehicles_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="0">N/A</option>
<?
	$sql_z = "SELECT id,man_year,make,model,submodel FROM vehicles ORDER BY id";
	$sql_z = mysql_query($sql_z);
	while(list($v_id,$man_year,$make,$model,$submodel) = mysql_fetch_row($sql_z)) {
        $vehicle = $man_year.' - '.$make.' '.$model.' '.$submodel;	   
?>
								                                        <option value="<?= $v_id ?>" <? if($v_id == $vehicles_id) echo("selected"); ?>><?= $vehicle ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Vendor</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="vendor_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_b = "SELECT id,shortname FROM vendor";
	$sql_b = mysql_query($sql_b);
	while(list($vid,$vname) = mysql_fetch_row($sql_b)) {
?>
								                                        <option value="<?= $vid ?>" <? if($vendor_id == $vid) echo("selected"); ?>><?= $vname ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Category</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="expense_category_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_c = "SELECT id,name,shortdesc FROM expense_category";
	$sql_c = mysql_query($sql_c);
	while(list($eid,$ename,$eshortdesc) = mysql_fetch_row($sql_c)) {
?>
								                                        <option value="<?= $eid ?>" <? if($expense_category_id == $eid) echo("selected"); ?>><?= $ename." (".$eshortdesc.")" ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Purchase Date (mm-dd-yyyy)</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="pdate" value="<?= $pdate ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Item Description</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="name" value="<?= $name ?>" style="width: 220px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Tax?</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <select name="ytax" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="0" <? if($ytax == 0) echo("selected"); ?>>Y</option>
                                                                        <option value="1" <? if($ytax == 1) echo("selected"); ?>>N</option>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Quantity</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="qty" value="<?= $qty ?>" style="width: 220px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Unit Price</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="amount" value="<?= $amount ?>" style="width: 220px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Subtotal</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                    $<?= number_format($subtotal, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Tax (8.7%)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_columnS.jpg') no-repeat; width: 235px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                    $<?= number_format($tax, 5, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Total</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                    $<?= number_format($total, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Receipt Reference</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="receipt_reference" value="<?= $receipt_reference ?>" style="width: 350px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Image</div>
                                                            </td>
                                                            <td colspan="3" style="background: url('imgs/input_column.jpg') no-repeat; width: 705px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="image" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="0">N/A</option>
<?
    $sqlZ = "SELECT i.id, p.address FROM projectsites AS p, invoice AS i WHERE i.project_id=p.id ORDER BY i.id";
    $sqlZ = mysql_query($sqlZ);
	while(list($inv_num,$address) = mysql_fetch_row($sqlZ)) {
        if ($inv_num >= 10) {
              if ($inv_num <= 99) {
           		  $inv_number = 'INV_00'.$inv_num;		          
              } else {
                  $inv_number = 'INV_0'.$inv_num;
              }
        } else if ($inv_num <= 9) {
        	$inv_number = 'INV_000'.$inv_num;
        }
        
        $folder_path = 'projectsites/'.$address.'/Receipts/'.$inv_number.'/';
        $handle = opendir($folder_path);
        while (false !== ($image_ = readdir($handle))) {
            if ($image_ != "." && $image_ != "..") {	   
?>
								                                        <option value="<?= $image_ ?>" <? if($image == $image_) echo("selected"); ?>><?= $image_." (".$address." - ".$inv_number.")" ?></option>
<?
            }
        }
        closedir($handle);
    }
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="background: inherit; width: 235px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; margin: 0px auto;">
                                                    <div style="width 235px; padding: 43px 25px 0px 25px;">        
                                                        <table style="width: 235px; border-collapse: collapse; margin: 0px auto; padding: 0px 0px 0px 0px;">
                                                            <tr>
                                                                <td style="width: 80px; vertical-align: middle; margin: 0px auto;">
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
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            </td>