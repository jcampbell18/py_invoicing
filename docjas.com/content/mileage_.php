<? 
    include("fckeditor/fckeditor.php");

    $tb = 'mileage';
    
// create invoice
    if ($_POST['submit'] == "create") {

/* Converting Date */
        $drive_date = explode("-", $_POST['drive_date']);
        $drive_date = $drive_date[2].'-'.$drive_date[0].'-'.$drive_date[1];

        $sql = "INSERT INTO $tb SET project_id='{$_POST['project_id']}', vehicle_id='{$_POST['vehicle_id']}', drive_date='$drive_date', invoice='{$_POST['invoice']}', invoice_2='{$_POST['invoice_2']}', invoice_3='{$_POST['invoice_3']}', start_miles='{$_POST['start_miles']}', end_miles='{$_POST['end_miles']}', subttl='{$_POST['subttl']}', notes='{$_POST['notes']}'";
		mysql_query($sql);
        
        $status = 'Record created successfully';
        
//		header("Location: main.php?page=$tb");
    }
// update invoice
    if ($_POST['submit'] == "update") {

/* Converting Date */
        $drive_date = explode("-", $_POST['drive_date']);
        $drive_date = $drive_date[2].'-'.$drive_date[0].'-'.$drive_date[1];

        $sql = "UPDATE $tb SET project_id='{$_POST['project_id']}', vehicle_id='{$_POST['vehicle_id']}', drive_date='$drive_date', invoice='{$_POST['invoice']}', invoice_2='{$_POST['invoice_2']}', invoice_3='{$_POST['invoice_3']}', start_miles='{$_POST['start_miles']}', end_miles='{$_POST['end_miles']}', subttl='{$_POST['subttl']}', notes='{$_POST['notes']}' WHERE id='{$_GET['id']}'";        
        mysql_query($sql);
        
        $status = 'Record updated successfully';
        
//	    header("Location: main.php?page=$tb");
	}
/*
// remove invoice
    if ($_GET['action'] == "delete") {
		$sql = "DELETE FROM $tb WHERE id='{$_GET['id']}'";
		mysql_query($sql);
		header("Location: main.php?page=$tb");
	}
*/
// update invoice
    if ($_GET['action'] != 'create') {                     
        $sql = "SELECT * FROM $tb WHERE id='{$_GET['id']}'";
    	$sql = mysql_query($sql);
    	extract(mysql_fetch_assoc($sql));
/* Converting Date */
        $drive_date = explode("-", $drive_date);
        $drive_date = $drive_date[1].'-'.$drive_date[2].'-'.$drive_date[0];
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
                                                                <div style="padding-right: 10px;">Drive Date (MM-DD-YYYY)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="drive_date" value="<?= $drive_date ?>" style="width: 70px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                            <td rowspan="5" style="background: inherit; color: inherit; width: 124px; vertical-align: top; border: 0px; padding: 0px 0px 0px 0px; margin: 0px auto;">
                                                                <div style="padding-left: 24px;">
                                                                    <a href="main.php?page=invoices_receipts&amp;id=<?= $_GET[id] ?>&amp;pid=<?= $project_id ?>" style="border: 0px; text-decoration: none;">
                                                                        <img src="imgs/receipts_button.jpg" alt="Receipts" style="width: 80px; height: 80px; border: 0px; padding: 0px; margin: 0px;">
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td rowspan="7" style="background: inherit; color: inherit; width: 111px; vertical-align: middle; border: 0px; padding: 0px 0px 0px 0px; margin: 0px auto;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="submit" style="width: 80px; height: 121px;" name="submit" value="<?= $_GET['action']; ?>" id="<?= $_GET['action']; ?>">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Project Site</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
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
                                                                <div style="padding-right: 10px;">Vehicle Used</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 10px;">
                                                                    <select name="vehicle_id" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_e = "SELECT id,man_year,make,model,submodel,engine,notes FROM vehicles";
	$sql_e = mysql_query($sql_e);
	while(list($vid,$v_year,$v_make,$v_model,$v_submodel,$v_engine,$v_notes) = mysql_fetch_row($sql_e)) {
?>
								                                        <option value="<?= $vid ?>" <? if($vehicle_id == $vid) echo("selected"); ?>><?= $v_year.' '.$v_make.' '.$v_model.' - '.$v_submodel ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Starting Mileage</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="start_miles" value="<?= $start_miles ?>" style="width: 250px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Ending Mileage</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="end_miles" value="<?= $end_miles ?>" style="width: 250px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Subtotal Mileage</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="subttl" value="<?= $subttl ?>" style="width: 250px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Notes</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="notes" value="<?= $notes ?>" style="width: 350px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Invoice Reference</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <select name="invoice" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_d = "SELECT i.id, p.address, p.city, p.state, p.zipcode, s.name FROM invoice i, projectsites p, sku s WHERE i.project_id=p.id AND s.id=i.sku_id ORDER BY i.id,p.address";
	$sql_d = mysql_query($sql_d);
	while(list($inv_id, $inv_address, $inv_city, $inv_state, $inv_zipcode, $inv_sku) = mysql_fetch_row($sql_d)) {
        $inv_projectsite = $inv_address.', '.$inv_city.', '.$inv_state.' '.$inv_zipcode;	   
/* Converting Invoice ID to Invoice # */
        if ($inv_id >= 10) {
              if ($inv_id <= 99) {
           		  $inv_id = 'INV_00'.$inv_id;		          
              } else {
                  $inv_id = 'INV_0'.$inv_id;
              }
        } else if ($inv_id <= 9) {
        	$inv_id = 'INV_000'.$inv_id;
        }
?>
								                                        <option value="<?= $inv_id ?>" <? if($inv_id == $invoice) echo("selected"); ?>><?= $inv_id.' - '.$inv_projectsite.' ('.$inv_sku.')' ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Invoice Reference #2</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <select name="invoice_2" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_f = "SELECT i.id, p.address, p.city, p.state, p.zipcode, s.name FROM invoice i, projectsites p, sku s WHERE i.project_id=p.id AND s.id=i.sku_id ORDER BY i.id,p.address";
	$sql_f = mysql_query($sql_f);
	while(list($inv_idB, $inv_addressB, $inv_cityB, $inv_stateB, $inv_zipcodeB, $inv_skuB) = mysql_fetch_row($sql_f)) {
        $inv_projectsiteB = $inv_addressB.', '.$inv_cityB.', '.$inv_stateB.' '.$inv_zipcodeB;	   
/* Converting Invoice ID to Invoice # */
        if ($inv_idB >= 10) {
              if ($inv_idB <= 99) {
           		  $inv_idB = 'INV_00'.$inv_idB;		          
              } else {
                  $inv_idB = 'INV_0'.$inv_idB;
              }
        } else if ($inv_idB <= 9) {
        	$inv_idB = 'INV_000'.$inv_idB;
        }
?>
								                                        <option value="<?= $inv_idB ?>" <? if($inv_idB == $invoice_2) echo("selected"); ?>><?= $inv_idB.' - '.$inv_projectsiteB.' ('.$inv_skuB.')' ?></option>
<?
	}
?>
    							                                     </select>
                                                                </div>
                                                            </td>
                                                        </tr>
<tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Invoice Reference #3</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 470px; height: 36th; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <select name="invoice_3" style="background: inherit; color: inherit; border: 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
    								                                    <option value="">&nbsp;</option>
<?
	$sql_g = "SELECT i.id, p.address, p.city, p.state, p.zipcode, s.name FROM invoice i, projectsites p, sku s WHERE i.project_id=p.id AND s.id=i.sku_id ORDER BY i.id,p.address";
	$sql_g = mysql_query($sql_g);
	while(list($inv_idC, $inv_addressC, $inv_cityC, $inv_stateC, $inv_zipcodeC, $inv_skuC) = mysql_fetch_row($sql_g)) {
        $inv_projectsiteC = $inv_addressC.', '.$inv_cityC.', '.$inv_stateC.' '.$inv_zipcodeC;	   
/* Converting Invoice ID to Invoice # */
        if ($inv_idC >= 10) {
              if ($inv_idC <= 99) {
           		  $inv_idC = 'INV_00'.$inv_idC;		          
              } else {
                  $inv_idC = 'INV_0'.$inv_idC;
              }
        } else if ($inv_idC <= 9) {
        	$inv_idC = 'INV_000'.$inv_idC;
        }
?>
								                                        <option value="<?= $inv_idC ?>" <? if($inv_idC == $invoice_3) echo("selected"); ?>><?= $inv_idC.' - '.$inv_projectsiteC.' ('.$inv_skuC.')' ?></option>
<?
	}
?>
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