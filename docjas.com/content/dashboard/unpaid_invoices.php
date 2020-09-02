                            <td style="width: 621px; height: 213px; margin: 0px; padding: 40px 0px 0px 40px; border: 0px solid #000;">
                                <div style="width: 621px; height: 213px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 621px; height: 213px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: url('imgs/unpaid_invoices.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 621px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: url('imgs/unpaid_invoicesBG.jpg') no-repeat; width: 621px; height: 118px; vertical-align: top;">
                                                <div style="padding: 0px 0px 0px 0px; margin: 0px auto; vertical-align: top;">
                                                    <table style="width: 621px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
<?
    $sql = "SELECT * FROM invoice WHERE paid='0' AND complete='1' ORDER BY date_start DESC LIMIT 3";
    $sql = mysql_query($sql);
    while($list = mysql_fetch_assoc($sql)) {
        extract($list);
        
/* Converting Project Sites id and SKU id to actual name */
        $sqlB = "SELECT p.address,p.city,p.state,p.zipcode,s.name FROM projectsites AS p, sku AS s WHERE p.id='$project_id' AND s.id='$sku_id'";
        $sqlB = mysql_query($sqlB);
        list($address,$city,$state,$zipcode,$sku_name) = mysql_fetch_row($sqlB);

/* Changing the date to regular format */
        $mdy = explode("-",$date_start);
        $date_start = $mdy[1].'/'.$mdy[2].'/'.$mdy[0];
?>
                                                        <tr>
                                                            <td style="width: 175px; height: 37px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 30px;">
                                                                <?= $date_start ?>
                                                            </td>
                                                            <td style="width: 207px; height: 37px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 0px;">
                                                                <?= $address ?>
                                                            </td>
                                                            <td style="width: 168px; height: 37px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 0px;">
                                                                <?= $sku_name ?>
                                                            </td>
                                                            <td style="width: 71px; height: 37px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 3px 30px 0px 0px;">
                                                                $<?= $amount ?>
                                                            </td>
                                                        </tr>
<?
    }
?>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>