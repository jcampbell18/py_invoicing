<? 
/* Content */ 

    if ($_SESSION['username_access'] == 'admin') {
?>

<tr>
    <td style="background-color: #e8e8e8; color: #FFFFFF; width: 1020px; height: 97px; padding: 0px; margin: 0px;">
        <div style="padding: 0px 0px 0px 0px; margin: 0px auto;">
            <table style="width: 1020px; height: 97px; padding: 0px; margin: 0px auto; border: 0px; border-collapse: collapse; background-color: inherit; color: inherit;">
                <tr>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 40px;"><a href="main.php?page=expenses" style="border: 0px; text-decoration: none;"><img src="imgs/subnav/expenses.jpg" alt="Expenses" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;"></a></td>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 11px;"><a href="main.php?page=expenses&amp;action=group" style="border: 0px; text-decoration: none;"><img src="imgs/subnav/group_receipts.jpg" alt="Group Receipts" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;"></a></td>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 11px;"><a href="main.php?page=expenses_&amp;action=create" style="border: 0px; text-decoration: none;"><img src="imgs/subnav/create.jpg" alt="create.jpg" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;"></a></td>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 11px;"><a href="main.php?page=expenses_multi&amp;action=create" style="border: 0px; text-decoration: none;"><img src="imgs/subnav/create_multi.jpg" alt="create_multi.jpg" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;"></a></td>
                    <td style="width: 548px; height: 97px; padding: 0px 38px 0px 11px;" colspan="">&nbsp;</td>
                </tr>
            </table>
        </div>
    </td>
</tr>
<?
    } else {
?>

<tr>
    <td style="background-color: #e8e8e8; color: #FFFFFF; width: 1020px; height: 97px; padding: 0px; margin: 0px;">
        <div style="padding: 0px 0px 0px 0px; margin: 0px auto;">
            <table style="width: 115px; height: 97px; padding: 0px; margin: 0px auto; border: 0px; border-collapse: collapse; background-color: inherit; color: inherit;">
                <tr>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 40px;"><a href="main.php?page=changelog" style="border: 0px; text-decoration: none;"><img src="imgs/subnav/changelog.jpg" alt="Changelog" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;"></a></td>
                    <td style="width: 778px; height: 97px; padding: 0px 38px 0px 11px;" colspan="">&nbsp;</td>
                </tr>
            </table>
        </div>
    </td>
</tr>

<?
    }
?>