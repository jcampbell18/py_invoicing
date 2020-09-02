                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: url('imgs/mileage_bar.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 940px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: #f6f6f6; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="background: inherit; color: inherit; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 0px 0px 0px 0px;">
<?
    $sql = "SELECT * FROM mileage ORDER BY ID";
    $sql = mysql_query($sql);
/* Counting Number of Rows, adding divider between each row until the end */ 
    $num_rows = mysql_num_rows($sql);      
    $i = 0;
        while($list = mysql_fetch_assoc($sql)) {
            extract($list);
            $i++;
/* Converting Project Sites id to actual name */
            $sqlB = "SELECT address,city,state,zipcode FROM projectsites WHERE id='$project_id'";
            $sqlB = mysql_query($sqlB);
            list($address,$city,$state,$zipcode) = mysql_fetch_row($sqlB);
/* Changing the date to regular format */
            $mdy = explode("-",$drive_date);
            $drive_date = $mdy[1].'-'.$mdy[2].'-'.$mdy[0];
?>            
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="width: 82px; height: 37px; padding: 0px;"><?= $drive_date ?></td>
                                                                        <td style="width: 327px; height: 37px; padding: 0px;"><?= $address.', '.$city.', '.$state.' '.$zipcode.' (#'.$invoice.')' ?></td>
                                                                        <td style="width: 151px; height: 37px; padding: 0px;"><?= $start_miles ?></td>
                                                                        <td style="width: 159px; height: 37px; padding: 0px;"><?= $end_miles ?></td>
                                                                        <td style="width: 100px; height: 37px; padding: 0px;"><?= $subttl ?></td>
                                                                        <td style="width: 60px; height: 37px; padding: 0px;">
                                                                            <a href="main.php?page=mileage_&amp;id=<?= $id ?>&amp;action=update" style="border: 0px; text-decoration: none;">
                                                                                <img src="imgs/icon_view.gif" title="View" alt="View" style="width: 37px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                            </a>
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