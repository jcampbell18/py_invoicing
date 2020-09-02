<tr>
    <td style="background-color: #e8e8e8; color: #FFFFFF; width: 1020px; height: 97px; padding: 0px; margin: 0px;">
        <div style="padding: 0px 0px 0px 0px; margin: 0px auto;">
            <table style="width: 1020px; height: 97px; padding: 0px; margin: 0px auto; border: 0px; border-collapse: collapse; background-color: inherit; color: inherit;">
                <tr>
                    <td style="width: 115px; height: 97px; padding: 0px 11px 0px 40px;"><a href="main.php?page=user" style="border: 0px; text-decoration: none;"><img src="imgs/subnav/user_view.jpg" alt="user_add.jpg" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;"></a></td>
<?
    if ($_SESSION['username_access'] == 'admin') {
?>
                    <td style="width: 115px; height: 97px;padding: 0px 11px 0px 11px;"><a href="main.php?page=user&action=create" style="border: 0px; text-decoration: none;"><img src="imgs/subnav/user_add.jpg" alt="user_delete.jpg" style="width: 115px; height: 97px; border: 0px; padding: 0px; margin: 0px;"></a></td>
<?
    }
?>
                    <td colspan="5" style="width: 115px; height: 97px;padding: 0px 11px 0px 11px;">&nbsp;</td>
                </tr>
            </table>
        </div>
    </td>
</tr>