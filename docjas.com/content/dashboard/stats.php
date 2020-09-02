<?
    $report_year = date("Y").'-01-01';
/* Paid Invoices */
    $sqlP = "SELECT SUM(amount) FROM invoice WHERE complete='1' AND paid='1' and date_start>'{$report_year}'";
    $sqlP = mysql_query($sqlP);
    list($paid) = mysql_fetch_row($sqlP);
        if ($paid < 1) {
            $paid = '0.00';
        }
/* Unpaid/Completed Invoices */
    $sqlU = "SELECT SUM(amount) FROM invoice WHERE complete='1' AND paid='0' and date_start>'{$report_year}'";
    $sqlU = mysql_query($sqlU);
    list($unpaid_c) = mysql_fetch_row($sqlU);
        if ($unpaid_c < 1) {
            $unpaid_c = '0.00';
        }
/* Unpaid/Uncompleted Invoices */
    $sqlV = "SELECT SUM(amount) FROM invoice WHERE complete='0' AND paid='0' and date_start>'{$report_year}'";
    $sqlV = mysql_query($sqlV);
    list($unpaid_u) = mysql_fetch_row($sqlV);
        if ($unpaid_u < 1) {
            $unpaid_u = '0.00';
        }
/* Total */
    $sqlT = "SELECT SUM(amount) FROM invoice WHERE date_start>'{$report_year}'";
    $sqlT = mysql_query($sqlT);
    list($total) = mysql_fetch_row($sqlT);
        if ($total < 1) {
            $total = '0.00';
        }
?>
                            <td style="width: 300px; height: 225px; margin: 0px; padding: 40px 35px 0px 0px; border: 0px solid #000; vertical-align: top;">
                                <div style="width: 300px; height: 225px; margin: 0px; border: 0px; padding: 0px 0px 0px 11px; vertical-align: top;">
                                    <table style="width: 300px; height: 213px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                        <tr>
                                            <td style="background: url('imgs/body_stats.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 300px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: url('imgs/body_statsBG.jpg') no-repeat; width: 300px; height: 175px; vertical-align: top;">
                                                <div style="padding: 0px 0px 0px 0px; margin: 0px auto; vertical-align: top;">
                                                    <table style="width: 300px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                                        <tr>
                                                            <td style="width: 207px; height: 44px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 30px;">
                                                                Paid
                                                            </td>
                                                            <td style="width: 93px; height: 44px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 3px 30px 0px 0px;">
                                                                $<?= number_format($paid, 2, '.', ',') ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 207px; height: 44px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 30px;">
                                                                Unpaid (Completed Projects)
                                                            </td>
                                                            <td style="width: 93px; height: 44px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 3px 30px 0px 0px;">
                                                                $<?= number_format($unpaid_c, 2, '.', ',') ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 207px; height: 44px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 30px;">
                                                                Unpaid (Uncompleted Projects)
                                                            </td>
                                                            <td style="width: 93px; height: 44px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 3px 30px 0px 0px;">
                                                                $<?= number_format($unpaid_u, 2, '.', ',') ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 207px; height: 43px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 30px;">
                                                                Total (for <?= date("Y"); ?>)
                                                            </td>
                                                            <td style="width: 93px; height: 43px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 3px 30px 0px 0px;">
                                                                $<?= number_format($total, 2, '.', ',') ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>