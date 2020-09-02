                            <td style="width: 621px; height: 290px; margin: 0px; padding: 40px 0px 0px 40px; border: 0px solid #000; vertical-align: top;">
                                <div style="width: 621px; height: 290px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px; vertical-align: top;">
                                    <table style="width: 621px; height: 278px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                        <tr>
                                            <td style="background: url('imgs/stats_monthly.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 621px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: url('imgs/stats_monthlyBG.jpg') no-repeat; width: 621px; height: 240px; vertical-align: top;">
                                                <div style="padding: 0px 0px 0px 0px; margin: 0px auto; vertical-align: top;">
                                                    <table style="width: 621px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                                        <tr>
                                                            <td style="width: 310px; height: 240px; vertical-align: top;">
                                                                <table style="width: 310px; height: 240px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                                        
<?
    $date_year = date("Y");
    $date_month = date("n");
    for($i=1; $i<=6; $i++){
        $month = date("F",mktime(0, 0, 0, $i, 1));
        $monthS = $date_year."-".$i."-01";
        $monthS_ = $date_year."-".$i."-31";
        $sqlMa = "SELECT SUM(amount) FROM invoice WHERE date_start BETWEEN '{$monthS}' AND '{$monthS_}'";
        $sqlMa = mysql_query($sqlMa);
        list($month_amount) = mysql_fetch_row($sqlMa);
?>
                                                                    <tr>
                                                                        <td style="width: 155px; height: 40px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 30px;">
                                                                            <?= $month ?>
                                                                        </td>
                                                                        <td style="width: 155px; height: 40px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 0px;">
                                                                            <?= "$".number_format($month_amount, 2, '.', ',') ?>
                                                                        </td>
                                                                    </tr>
<?
    }
?>

                                                                </table>
                                                            </td>
                                                            <td style="width: 310px; height: 240px; vertical-align: top;">
                                                                <table style="width: 310px; height: 240px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
<?
    $date_year = date("Y");
    $date_month = date("n");
    for($i=7; $i<=12; $i++){
        $month = date("F",mktime(0, 0, 0, $i, 1));
        $monthS = $date_year."-".$i."-01";
        $monthS_ = $date_year."-".$i."-31";
        $sqlMa = "SELECT SUM(amount) FROM invoice WHERE date_start BETWEEN '{$monthS}' AND '{$monthS_}'";
        $sqlMa = mysql_query($sqlMa);
        list($month_amount) = mysql_fetch_row($sqlMa);
?>
                                                                    <tr>
                                                                        <td style="width: 155px; height: 40px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 30px;">
                                                                            <?= $month ?>
                                                                        </td>
                                                                        <td style="width: 155px; height: 40px; background: inherit; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 3px 0px 0px 0px;">
<? 
            if ($date_month < $i) { 
                echo("N/A"); 
            } else { 
                echo("$".number_format($month_amount, 2, '.', ','));
            }             
?>
                                                                        </td>
                                                                    </tr>
<?
    }
?>
                                                                </table>
                                                            </td>
                                                        </tr>    
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>