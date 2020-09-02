                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: url('imgs/receipts<? if ($_GET['action'] != "group") { echo("_"); } else { echo("G_"); } ?>bar.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 940px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: #f6f6f6; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="background: inherit; color: inherit; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 0px 0px 0px 0px;">
<?
    if ($_GET['action'] == "view") {
        $sql = "SELECT * FROM expense WHERE invoice_id='{$_GET['invoice_id']}' ORDER BY pdate";
        $sql = mysql_query($sql);  
        while($list = mysql_fetch_assoc($sql)) {
            extract($list);
/* Converting Invoice_ID to Invoice # */
            if ($invoice_id >= 10) {
    		      if ($invoice_id <= 99) {
    	       		  $inv = '00'.$invoice_id;		          
    		      } else {
    		          $inv = '0'.$invoice_id;
    		      }
    		} else if ($invoice_id <= 9) {
    			$inv = '000'.$invoice_id;
            }
/* Changing the date to regular format */
            $pdate = explode("-",$pdate);
            $pdate = $pdate[1].'-'.$pdate[2].'-'.$pdate[0];
/* Converting Vendor id and Expense Category id to actual name */
            $sqlB = "SELECT v.shortname,e.name FROM vendor AS v, expense_category AS e WHERE v.id='$vendor_id' AND e.id='$expense_category_id'";
            $sqlB = mysql_query($sqlB);
            list($vendor_shortname,$expense_category_name) = mysql_fetch_row($sqlB);
?>            
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="width: 80px; height: 37px; padding: 0px;"><?= $pdate ?></td>
                                                                        <td style="width: 135px; height: 37px; padding: 0px;"><?= $vendor_shortname ?></td>
                                                                        <td style="width: 271px; height: 37px; padding: 0px;"><?= $name ?></td>
                                                                        <td style="width: 135px; height: 37px; padding: 0px;"><?= $expense_category_name ?></td>
                                                                        <td style="width: 115px; height: 37px; padding: 0px;"><? echo("Invoice #".$inv); ?></td>
                                                                        <td style="width: 164px; height: 37px; padding: 0px;"><?= $qty." @ $".number_format($amount, 2, '.', ',') ?></td>
                                                                        <td style="width: 44px; height: 37px; padding: 0px;">
                                                                            <a href="main.php?page=expenses_&amp;id=<?= $id ?>&amp;action=update" style="border: 0px; text-decoration: none;">
                                                                                <img src="imgs/icon_view.gif" title="View" alt="View" style="width: 37px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div style="margin: 0px auto; padding: 0px 14px 0px 15px; border: 0px;"><img src="imgs/divider.jpg" alt="divider" style="width: 911px; height: 3px;"></div>
<?
        }
    }
        $sql_A = "SELECT SUM(subtotal),SUM(tax),SUM(total) FROM expense WHERE invoice_id='{$_GET['invoice_id']}'";
	    $sql_A = mysql_query($sql_A);
        list($subtotal,$tax,$total) = mysql_fetch_row($sql_A);
?>
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td colspan="5" style="width: 736px; height: 37px; padding: 0px; text-align: center;">SubTotal</td>
                                                                        <td colspan="2" style="width: 164px; height: 37px; padding: 0px;"><?= "$".number_format($subtotal, 2, '.', ',') ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div style="margin: 0px auto; padding: 0px 14px 0px 15px; border: 0px;"><img src="imgs/divider.jpg" alt="divider" style="width: 911px; height: 3px;"></div>
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td colspan="5" style="width: 736px; height: 37px; padding: 0px; text-align: center;">Tax</td>
                                                                        <td colspan="2" style="width: 164px; height: 37px; padding: 0px;"><?= "$".number_format($tax, 2, '.', ',') ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div style="margin: 0px auto; padding: 0px 14px 0px 15px; border: 0px;"><img src="imgs/divider.jpg" alt="divider" style="width: 911px; height: 3px;"></div>
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td colspan="5" style="width: 736px; height: 37px; padding: 0px; text-align: center;">Total</td>
                                                                        <td colspan="2" style="width: 164px; height: 37px; padding: 0px;"><?= "$".number_format($total, 2, '.', ',') ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div style="margin: 0px auto; padding: 0px 14px 0px 15px; border: 0px;"><img src="imgs/divider.jpg" alt="divider" style="width: 911px; height: 3px;"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>