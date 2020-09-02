<? 
    include("fckeditor/fckeditor.php");

    $tb = 'clients';
 
// create invoice
    if ($_POST['submit'] == "create") {
        $sql = "INSERT INTO $tb SET business_name='{$_POST['business_name']}', contact_name='{$_POST['contact_name']}', address='{$_POST['address']}', city='{$_POST['city']}', state='{$_POST['state']}', zipcode='{$_POST['zipcode']}', phone='{$_POST['phone']}', fax='{$_POST['fax']}', email='{$_POST['email']}'";
		mysql_query($sql);
        
        $status = 'Record created successfully';
        
		header("Location: main.php?page=$tb");
    }
// update invoice
    if ($_POST['submit'] == "update") {
        $sql = "UPDATE $tb SET business_name='{$_POST['business_name']}', contact_name='{$_POST['contact_name']}', address='{$_POST['address']}', city='{$_POST['city']}', state='{$_POST['state']}', zipcode='{$_POST['zipcode']}', phone='{$_POST['phone']}', fax='{$_POST['fax']}', email='{$_POST['email']}'";        
        mysql_query($sql);
        
        $status = 'Record updated successfully';
        
	    header("Location: main.php?page=$tb");
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
                                                                <div style="padding-right: 10px;">Business Name</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="business_name" value="<?= $business_name ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
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
                                                                <div style="padding-right: 10px;">Contact Name</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="contact_name" value="<?= $contact_name ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Address</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="address" value="<?= $address ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">City</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="city" value="<?= $city ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">State</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="state" value="<?= $state ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Zipcode</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="zipcode" value="<?= $zipcode ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Phone</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="phone" value="<?= $phone ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Fax</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="fax" value="<?= $fax ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Email</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 594px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <input type="text" name="email" value="<?= $email ?>" style="width: 450px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 0px;">
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