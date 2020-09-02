<?
   	include("common/author.php");
    include("common/header.php");
?>



<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

    <table>

        <tr>
            <td style="height: 120px; padding: 20px 24px 24px 20px; vertical-align: middle;">
                <input type="button" name="projects" value="Project Site" onclick="window.location='../mobile/projects.php';" style="border: 1px solid #004552; background: #fde5b6; font: 44px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 120px; padding: 0px 24px 24px 20px; vertical-align: middle;">
                <input type="button" name="invoice" value="Invoicing" onclick="window.location='../mobile/invoices.php';" style="border: 1px solid #004552; background: #fde5b6; font: 44px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 120px; padding: 0px 24px 24px 20px; vertical-align: middle;">
                <input type="button" name="client" value="Client" onclick="window.location='../mobile/client.php';" style="border: 1px solid #004552; background: #fde5b6; font: 44px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 120px; padding: 0px 24px 24px 20px; vertical-align: middle;">
                <input type="button" name="sku" value="SKU" onclick="window.location='../mobile/sku.php';" style="border: 1px solid #004552; background: #fde5b6; font: 44px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        <tr>
            <td style="height: 120px; padding: 0px 24px 24px 20px; vertical-align: middle;">
                <input type="button" name="terms" value="Terms" onclick="window.location='../mobile/terms.php';" style="border: 1px solid #004552; background: #fde5b6; font: 44px Arial, Tahoma, sans-serif;">
            </td>
        </tr>
        
    </table>

</div>



<? include("common/footer.php") ?>