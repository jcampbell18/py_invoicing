<?
//   	include("common/author.php");
    include("common/header.php");
?>



<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

    <table>

        <tr>
            <td style="height: 16px; padding: 60px 24px 24px 200px; vertical-align: middle;">
                <input type="button" name="projects" value="Project Site" onclick="window.location='projects.php';" style="border: 1px solid #004552; background: #fde5b6; font: 14px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 16px; padding: 0px 24px 24px 200px; vertical-align: middle;">
                <input type="button" name="invoice" value="Invoicing" onclick="window.location='invoices.php';" style="border: 1px solid #004552; background: #fde5b6; font: 14px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 16px; padding: 0px 24px 24px 200px; vertical-align: middle;">
                <input type="button" name="bid" value="Bids" onclick="window.location='bid.php';" style="border: 1px solid #004552; background: #fde5b6; font: 14px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 16px; padding: 0px 24px 24px 200px; vertical-align: middle;">
                <input type="button" name="client" value="Client" onclick="window.location='client.php';" style="border: 1px solid #004552; background: #fde5b6; font: 14px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 16px; padding: 0px 24px 24px 200px; vertical-align: middle;">
                <input type="button" name="sku" value="SKU" onclick="window.location='sku.php';" style="border: 1px solid #004552; background: #fde5b6; font: 14px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 16px; padding: 0px 24px 24px 200px; vertical-align: middle;">
                <input type="button" name="mileage" value="Mileage" onclick="window.location='mileage.php';" style="border: 1px solid #004552; background: #fde5b6; font: 14px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 16px; padding: 0px 24px 24px 200px; vertical-align: middle;">
                <input type="button" name="terms" value="Terms" onclick="window.location='terms.php';" style="border: 1px solid #004552; background: #fde5b6; font: 14px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 16px; padding: 0px 24px 24px 200px; vertical-align: middle;">
<?
    $sql = "SELECT amount FROM invoice WHERE complete='1' AND paid='0'";
    $sql = mysql_query($sql);
    while (list($amounts) = mysql_fetch_row($sql)) {
//        print_r($amounts);
        $amount[] = $amounts;
        $sum = array_sum($amount);
    }
?>
                <b>Unpaid Invoices $<?= $sum ?></b>
               
            </td>
        </tr>
        
    </table>

</div>



<? include("common/footer.php") ?>