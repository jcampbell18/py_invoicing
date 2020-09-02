                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: url('imgs/bids.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 940px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: #f6f6f6; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="background: inherit; color: inherit; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 0px 0px 0px 0px;">
<?
    $sql = "SELECT * FROM bids WHERE denied=0 ORDER BY id";
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
/* Changing the date to regular format */
        $mdy = explode("-",$bid_date);
        $bid_date = $mdy[1].'-'.$mdy[2].'-'.$mdy[0];
/* Converting Project Sites id and SKU id to actual name */
        $sqlB = "SELECT p.address,p.city,p.state,p.zipcode,s.name FROM projectsites AS p, sku AS s WHERE p.id='$project_id' AND s.id='$sku_id'";
        $sqlB = mysql_query($sqlB);
        list($address,$city,$state,$zipcode,$sku_name) = mysql_fetch_row($sqlB);
/* converting binary to either checked or unchecked box */
        if ($approve == 1) {
            $approve_checkbox = 'checked';
        } else {
            $approve_checkbox = 'unchecked';
        }
?>            
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="width: 82px; height: 37px; padding: 0px;">#<?= $inv ?></td>
                                                                        <td style="width: 80px; height: 37px; padding: 0px;"><?= $bid_date ?></td>
                                                                        <td style="width: 260px; height: 37px; padding: 0px;"><?= $address.', '.$city.', '.$state.' '.$zipcode ?></td>
                                                                        <td style="width: 145px; height: 37px; padding: 0px;"><?= $sku_name ?></td>
                                                                        <td style="width: 120px; height: 37px; padding: 0px;"><?= $amount ?></td>
                                                                        <td style="width: 72px; height: 37px; padding: 0px;">
                                                                            <img src="imgs/box_<?= $approve_checkbox ?>.jpg" alt="box_<?= $approve_checkbox ?>.jpg" style="width: 20px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
 
                                                                        </td>
                                                                        <td style="width: 60px; height: 37px; padding: 0px;">
                                                                            <a href="main.php?page=bids_&amp;id=<?= $id ?>&amp;action=update" style="border: 0px; text-decoration: none;">
                                                                                <img src="imgs/icon_view.gif" title="View" alt="View" style="width: 37px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                            </a>
                                                                        </td>
                                                                        <td style="width: 60px; height: 37px; padding: 0px;">
<?
    if ($approve != 1) {
        if ($_SESSION['username_access'] == 'admin') {
?>                                                                        
                                                                            <input type="image" name="bid" title="Approve" src="imgs/icon_approve.gif" value="approve" onclick="JavaScript:if(window.confirm('By approving this bid, you will create a new invoice. Are you sure you wish to APPROVE?')) window.location='main.php?page=bids_&amp;bid=approve&amp;id=<?= $id ?>';" style="">
<?
        } else {
?>
                                                                            <a href="bid_email.php?id=<?= $id ?>" target="_blank" style="border: 0px; text-decoration: none;">
                                                                                <img src="imgs/icon_print.gif"  title="Print" alt="Print" style="width: 37px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                            </a>
<?            
        }
    } else {
?>
                                                                            <a href="bid_email.php?id=<?= $id ?>" target="_blank" style="border: 0px; text-decoration: none;">
                                                                                <img src="imgs/icon_print.gif"  title="Print" alt="Print" style="width: 37px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                            </a>
<?                        
    }
?>

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
<?
        if ($i != $num_rows) {
?>
                                                            <div style="margin: 0px auto; padding: 0px 14px 0px 15px; border: 0px;"><img src="imgs/divider.jpg" alt="divider" style="width: 911px; height: 3px;"></div>
<?
        }
    }
?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>