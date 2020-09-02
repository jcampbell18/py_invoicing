<?
    if(!$_GET['archive_year']) {
        $date_year = date("Y");            
    } else {
        $date_year = $_GET['archive_year'];
    }
    
    $date_month = date("n");
    
    $year_start = $date_year."-01-01";
    $year_end = $date_year."-12-31";
?>
                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 455px; vertical-align: top;">
                                                <div style="padding: 0px 0px 0px 0px; margin: 0px auto; vertical-align: top;">
                                                    <table style="width: 455px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                                        <tr>
                                                            <td colspan="4" style="color: inherit; width: 455px; height: 36px; vertical-align: middle; font-weight: bold; font-size: 13px; font-family: Tahoma, Arial, sans-serif; text-align: center; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Current Year Stats</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 150px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Month</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Income ($)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Miles</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Taxes</div>
                                                            </td>
                                                        </tr>
                                                        
<?
    for($i=1; $i<=12; $i++){
        $month = date("F",mktime(0, 0, 0, $i, 1));
        $monthS = $date_year."-".$i."-01";
        $monthS_ = $date_year."-".$i."-31";
        $sqlA = "SELECT SUM(amount) FROM invoice WHERE paid_date BETWEEN '{$monthS}' AND '{$monthS_}'";
        $sqlA = mysql_query($sqlA);
        list($month_income) = mysql_fetch_row($sqlA);
            if ($month_income == "0") { 
                $month_income = "N/A"; 
            } else {
                $month_income = "$".number_format($month_income, 2, '.', ',');
            }
        $sqlB = "SELECT SUM(subttl) FROM mileage WHERE drive_date BETWEEN '{$monthS}' AND '{$monthS_}'";
        $sqlB = mysql_query($sqlB);
        list($month_miles) = mysql_fetch_row($sqlB);
            if ($month_miles == "") { 
                $month_miles = 0; 
            }
        $sqlC = "SELECT SUM(save_tax) FROM invoice WHERE paid_date BETWEEN '{$monthS}' AND '{$monthS_}'";
        $sqlC = mysql_query($sqlC);
        list($for_taxes) = mysql_fetch_row($sqlC);
            if ($for_taxes == "") { 
                $for_taxes = '$0.00'; 
            } else {
                $for_taxes = "$".number_format($for_taxes, 2, '.', ',');
            }
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 155px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;"><?= $month ?></div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= $month_income ?>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= $month_miles ?>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= $for_taxes ?>
                                                                </div>
                                                            </td>
                                                        </tr>

<?
    }
    $sqlA = "SELECT SUM(amount) FROM invoice WHERE paid_date BETWEEN '$year_start' AND '$year_end'";
    $sqlA = mysql_query($sqlA);
    list($year_income) = mysql_fetch_row($sqlA);
    $sqlB = "SELECT SUM(subttl) FROM mileage WHERE drive_date BETWEEN '$year_start' AND '$year_end'";
    $sqlB = mysql_query($sqlB);
    list($year_miles) = mysql_fetch_row($sqlB);
    $sqlC = "SELECT SUM(save_tax) FROM invoice WHERE paid_date BETWEEN '$year_start' AND '$year_end'";
    $sqlC = mysql_query($sqlC);
    list($year_taxes) = mysql_fetch_row($sqlC);
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; font-weight: bold; color: inherit; width: 155px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Total</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($year_income, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= number_format($year_miles, 0, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($year_taxes, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="color: inherit; width: 355px; height: 36px; vertical-align: middle; font-weight: bold; font-size: 13px; font-family: Tahoma, Arial, sans-serif; text-align: center; padding: 40px 0px 10px 0px;">
                                                                <div style="padding-right: 10px;">Unpaid Loans/Interest</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 150px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Invoice (#)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Loan ($)</div>
                                                            </td>
                                                            <td colspan="2" style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Interest ($)</div>
                                                            </td>
                                                        </tr>
<?
    $sqlG = "SELECT * FROM invoice WHERE loan_paid=0 AND loan_amount>'0.00' AND interest_paid=0 AND interest_amount>'0.00'";
    $sqlG = mysql_query($sqlG);
    while($list = mysql_fetch_assoc($sqlG)) {
        extract($list);
/* Converting Invoice ID to Invoice # */
        if ($id >= 10) {
		      if ($id <= 99) {
	       		  $i_inv = '00'.$id;		          
		      } else {
		          $i_inv = '0'.$id;
		      }
		} else if ($i_id <= 9) {
			$i_inv = '000'.$id;
        }
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 155px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">#<?= $i_inv ?></div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($loan_amount, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                            <td colspan="2" style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($interest_amount, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
<?
    }
    $sqlH = "SELECT SUM(loan_amount),SUM(interest_amount) FROM invoice WHERE loan_paid=0 AND loan_amount>'0.00' AND interest_paid=0 AND interest_amount>'0.00'";
    $sqlH = mysql_query($sqlH);
    list($total_loan,$total_interest) = mysql_fetch_row($sqlH);
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; font-weight: bold; color: inherit; width: 155px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Total</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($total_loan, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                            <td colspan="2" style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($total_interest, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="color: inherit; width: 355px; height: 36px; vertical-align: middle; font-weight: bold; font-size: 13px; font-family: Tahoma, Arial, sans-serif; text-align: center; padding: 40px 0px 10px 0px;">
                                                                <div style="padding-right: 10px;">Paid Loans/Interest</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 150px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Invoice (#)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Loan ($)</div>
                                                            </td>
                                                            <td colspan="2" style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Interest ($)</div>
                                                            </td>
                                                        </tr>
<?
    $sqlG = "SELECT * FROM invoice WHERE loan_paid=1 AND loan_amount>'0.00' AND complete_date BETWEEN '$year_start' AND '$year_end'";
    $sqlG = mysql_query($sqlG);
    while($list = mysql_fetch_assoc($sqlG)) {
        extract($list);
/* Converting Invoice ID to Invoice # */
        if ($id >= 10) {
		      if ($id <= 99) {
	       		  $i_inv = '00'.$id;		          
		      } else {
		          $i_inv = '0'.$id;
		      }
		} else if ($i_id <= 9) {
			$i_inv = '000'.$id;
        }
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 155px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">#<?= $i_inv ?></div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($loan_amount, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                            <td colspan="2" style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($interest_amount, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
<?
    }
    $sqlH = "SELECT SUM(loan_amount),SUM(interest_amount) FROM invoice WHERE loan_paid=1 AND loan_amount>'0.00' AND complete_date BETWEEN '$year_start' AND '$year_end'";
    $sqlH = mysql_query($sqlH);
    list($total_loan,$total_interest) = mysql_fetch_row($sqlH);
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; font-weight: bold; color: inherit; width: 155px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Total</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($total_loan, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                            <td colspan="2" style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($total_interest, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td style="width: 335px; vertical-align: top;">
                                                <div style="padding: 0px 0px 0px 0px; margin: 0px auto; vertical-align: top;">
                                                    <table style="width: 335px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                                        <tr>
                                                            <td colspan="2" style="color: inherit; width: 335px; height: 36px; vertical-align: middle; font-weight: bold; font-size: 13px; font-family: Tahoma, Arial, sans-serif; text-align: center; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Current Year Expenses</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Category</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">Expense ($)</div>
                                                            </td>
                                                        </tr>
<?
    $sql = "SELECT id,name,shortdesc FROM expense_category ORDER BY name";
    $sql = mysql_query($sql);  
    while(list($cid,$cname,$cshortdesc) = mysql_fetch_row($sql)) {
        $sqlE = "SELECT SUM(total) FROM expense WHERE expense_category_id=$cid AND pdate BETWEEN '$year_start' AND '$year_end'";
        $sqlE = mysql_query($sqlE);
        list($expense_amount) = mysql_fetch_row($sqlE);
?>

                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;" title="<?= $cshortdesc ?>"><?= $cname ?></div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;"><?= "$".number_format($expense_amount, 2, '.', ',') ?></div>
                                                            </td>
                                                        </tr>

<?
    }
    $sqlF = "SELECT SUM(total) FROM expense WHERE pdate BETWEEN '$year_start' AND '$year_end'";
    $sqlF = mysql_query($sqlF);
    list($expense_total) = mysql_fetch_row($sqlF); 
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; font-weight: bold; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Total</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; font-weight: bold; width: 100px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;"><?= "$".number_format($expense_total, 2, '.', ',') ?></div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 385px; vertical-align: top;">
                                                <div style="padding: 0px 0px 0px 0px; margin: 0px auto; vertical-align: top;">
                                                    <table style="width: 385px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                                        <tr>
                                                            <td colspan="2" style="color: inherit; width: 385px; height: 36px; vertical-align: middle; font-weight: bold; font-size: 13px; font-family: Tahoma, Arial, sans-serif; text-align: center; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Vehicles</div>
                                                            </td>
                                                        </tr>
<?
    $sqlL = "SELECT * FROM vehicles ORDER BY id";
    $sqlL = mysql_query($sqlL);
    while(list($vid,$man_year,$make,$model) = mysql_fetch_row($sqlL)) {
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Vehicle</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px; font-weight: bold;"><?= $man_year." ".$make." ".$model ?></div>
                                                            </td>
                                                        </tr>
<?
        $sqlS = "SELECT start_miles FROM mileage WHERE vehicle_id='$vid' AND drive_date BETWEEN '$year_start' AND '$year_end' LIMIT 1";
        $sqlS = mysql_query($sqlS);
        list($odometerA) = mysql_fetch_row($sqlS);
        
        $sqlT = "SELECT end_miles FROM mileage WHERE vehicle_id='$vid' AND drive_date BETWEEN '$year_start' AND '$year_end' ORDER BY id DESC LIMIT 1";
        $sqlT = mysql_query($sqlT);
        list($odometerB) = mysql_fetch_row($sqlT);       
        
        $pb_mileage = $odometerB - $odometerA;
        
        $sqlP = "SELECT sum(subttl) FROM mileage WHERE vehicle_id='$vid' AND drive_date BETWEEN '$year_start' AND '$year_end'";
        $sqlP = mysql_query($sqlP);
        list($business_mileage) = mysql_fetch_row($sqlP);
?>

                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Starting Odometer</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= number_format($odometerA, 0, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Ending Odometer</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= number_format($odometerB, 0, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Total mileage for Vehicle (Personal & Business)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= number_format($pb_mileage, 0, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Total Business Miles</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= number_format($business_mileage, 0, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
<?
        $year_startA = $date_year."-01-01";
        $year_endA = $date_year."-06-30";
        $sqlQ = "SELECT sum(subttl) FROM mileage WHERE vehicle_id='$vid' AND drive_date BETWEEN '$year_startA' AND '$year_endA'";
        $sqlQ = mysql_query($sqlQ);
        list($mileageA) = mysql_fetch_row($sqlQ);
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Mileage (Jan 1st - Jun 30th)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= number_format($mileageA, 0, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
<?
        $year_startB = $date_year."-07-01";
        $year_endB = $date_year."-12-31";
        $sqlR = "SELECT sum(subttl) FROM mileage WHERE vehicle_id='$vid' AND drive_date BETWEEN '$year_startB' AND '$year_endB'";
        $sqlR = mysql_query($sqlR);
        list($mileageB) = mysql_fetch_row($sqlR);
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Mileage (Jul 1st - Dec 31st)</div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= number_format($mileageB, 0, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
<?
//        }
        $sqlM = "SELECT id,name FROM expense_category WHERE id IN (2,3,4,5,24,26,27,28,29) ORDER BY id";
        $sqlM = mysql_query($sqlM);
        while(list($expense_id,$expense_name) = mysql_fetch_row($sqlM)) {
            $sqlN = "SELECT sum(TOTAL) FROM expense WHERE vehicles_id=$vid AND expense_category_id='$expense_id' AND pdate BETWEEN '$year_start' AND '$year_end'";
            $sqlN = mysql_query($sqlN);
            list($expense_sum) = mysql_fetch_row($sqlN);
?>
                                                        <tr>
                                                            <td style="background: url('imgs/main_column.jpg') no-repeat; color: inherit; width: 235px; height: 36px; vertical-align: middle; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: right; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;"><?= $expense_name ?></div>
                                                            </td>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 150px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                                <div style="padding-left: 15px;">
                                                                    <?= "$".number_format($expense_sum, 2, '.', ',') ?>
                                                                </div>
                                                            </td>
                                                        </tr>
<?
        }
    }
?>
                                                    </table>
                                                </div>
                                            </td>
                                            <td style="width: 315px; vertical-align: top;">
                                                <div style="padding: 0px 0px 0px 0px; margin: 0px auto; vertical-align: top;">
                                                    <table style="width: 315px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse; vertical-align: top;">
                                                        <tr>
                                                            <td style="color: inherit; width: 235px; height: 36px; vertical-align: middle; font-weight: bold; font-size: 13px; font-family: Tahoma, Arial, sans-serif; text-align: center; padding: 0px 0px 0px 0px;">
                                                                <div style="padding-right: 10px;">Archives</div>
                                                            </td>
                                                        </tr>
<?
    $first_year = '2010';
    $last_year = date("Y") - 1;
    for ($archive_year = $first_year; $archive_year <= $last_year; $archive_year++) {
?>
                                                        <tr>
                                                            <td style="background: url('imgs/input_column.jpg') no-repeat; width: 235px; height: 36px; vertical-align: middle; color: #000000; padding: 0px 0px 0px 0px; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: center;">
                                                                <div style="padding-left: 15px; font-weight: bold;">
                                                                    <a href="main.php?page=reports&amp;archive_year=<?= $archive_year ?>" style="border: 0px; text-decoration: none; color: #000000; background-color: inherit;"><?= $archive_year ?></a>
                                                                </div>
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