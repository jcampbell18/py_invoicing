<? /* Invoices */ ?>
<tr>
    <td style="background-color: #e8e8e8; color: #FFFFFF; width: 1020px; height: 97px; padding: 0px; margin: 0px;">
        <div style="padding: 0px 0px 0px 0px;">
            <table style="width: 345px; height: 97px; padding: 0px; margin: 0px; border: 0px; border-collapse: collapse; background-color: inherit; color: inherit;">
                <tr>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 40px;">
                        <a href="main.php?page=invoices" style="border: 0px; text-decoration: none;">
                            <img src="imgs/subnav/invoices.jpg" alt="invoicing.jpg" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;">
                        </a>
                    </td>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 11px;">
<?
    if ($_SESSION['username_access'] == 'admin') {
?>
                        <a href="main.php?page=invoices_&amp;action=create" style="border: 0px; text-decoration: none;">
                            <img src="imgs/subnav/create.jpg" alt="create.jpg" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;">
                        </a>
<?
    } else { 
?>

                        <img src="imgs/subnav/blank.gif" alt="blank.gif" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;">

<?
    }
?>
                    </td>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 11px;">
<?
    if ($_SESSION['username_access'] == 'admin') {
?>
                        <a href="main.php?page=mileage" style="border: 0px; text-decoration: none;">
                            <img src="imgs/subnav/mileage.jpg" alt="mileage.jpg" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;">
                        </a>
<?
    } else { 
?>

                        <img src="imgs/subnav/blank.gif" alt="blank.gif" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;">

<?
    }
?>
                    </td>
                </tr>
            </table>
        </div>
    </td>
</tr>