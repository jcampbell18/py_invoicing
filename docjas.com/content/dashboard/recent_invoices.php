                            <td colspan="2" style="width: 940px; height: 240px; margin: 0px; padding: 0px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: url('imgs/recent_invoices.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 940px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: #f6f6f6; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="background: inherit; color: inherit; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 0px 0px 0px 0px;">
<?
    $i=0;

    $sql = "SELECT * FROM invoice ORDER BY date_start DESC LIMIT 5";
    $sql = mysql_query($sql);
    while($list = mysql_fetch_assoc($sql)) {
        $i++;
        extract($list);
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

/* Changing the date to regular format */
        $mdy = explode("-",$date_start);
        $date_start = $mdy[1].'/'.$mdy[2].'/'.$mdy[0];
?>
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="width: 82px; height: 37px; padding: 0px;">#<?= $inv ?></td>
                                                                        <td style="width: 80px; height: 37px; padding: 0px;"><?= $date_start ?></td>
                                                                        <td style="width: 260px; height: 37px; padding: 0px;"><?= $address.', '.$city.', '.$state.' '.$zipcode ?></td>
                                                                        <td style="width: 145px; height: 37px; padding: 0px;"><?= $sku_name ?></td>
                                                                        <td style="width: 120px; height: 37px; padding: 0px;">$<?= $amount ?></td>
                                                                        <td style="width: 72px; height: 37px; padding: 0px;">
                                                                            <img src="imgs/box_<? if ($complete != '1') echo("un") ?>checked.jpg" alt="box_<? if ($complete != '1') echo("un") ?>checked.jpg" style="width: 20px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                        </td>
                                                                        <td style="width: 60px; height: 37px; padding: 0px;">
                                                                            <img src="imgs/box_<? if ($paid != '1') echo("un") ?>checked.jpg" alt="box_<? if ($paid != '1') echo("un") ?>checked.jpg" style="width: 20px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                        </td>
                                                                        <td style="width: 51px; height: 37px; padding: 0px;">
                                                                            <a href="main.php?page=invoices_&amp;id=<?= $id ?>&amp;action=update" style="border: 0px; text-decoration: none;">
                                                                                <img src="imgs/icon_view.gif" title="View" alt="View" style="width: 37px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
<?
        if ($i != 5) {
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