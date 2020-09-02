                            <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: url('imgs/projectsites_bar.jpg') no-repeat; color: #7e7878; font-size: 11px; font-family: Tahoma, Arial, sans-serif; width: 940px; height: 38px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="background: #f6f6f6; color: #7e7878; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                                    <tr>
                                                        <td style="background: inherit; color: inherit; width: 940px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; padding: 0px 0px 0px 0px;">
<?
    $sql = "SELECT * FROM projectsites ORDER BY ID";
    $sql = mysql_query($sql);
/* Counting Number of Rows, adding divider between each row until the end */ 
    $num_rows = mysql_num_rows($sql);      
    $i = 0;
        while($list = mysql_fetch_assoc($sql)) {
            extract($list);
            $i++;
?>            
                                                            <div style="margin: 0px; padding: 3px 25px 0px 25px; border: 0px; text-align: left; vertical-align: top;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="width: 275px; height: 37px; padding: 0px;">
                                                                            <a href="<?= $map ?>" target="_blank" style="background:  transparent; color: #6d6b6c; text-decoration: none;"><?= $address ?></a>
                                                                        </td>
                                                                        <td style="width: 172px; height: 37px; padding: 0px;"><?= $city ?></td>
                                                                        <td style="width: 105px; height: 37px; padding: 0px;"><?= $state ?></td>
                                                                        <td style="width: 150px; height: 37px; padding: 0px;"><?= $zipcode ?></td>
                                                                        <td style="width: 186px; height: 37px; padding: 0px;"><?= $code ?></td>
                                                                        <td style="width: 71px; height: 37px; padding: 0px;">
                                                                            <a href="main.php?page=projectsites_&amp;id=<?= $id ?>&amp;action=update" style="border: 0px; text-decoration: none;">
                                                                                <img src="imgs/icon_view.gif" title="View" alt="View" style="width: 37px; height: 37px; border: 0px; margin: 0px auto; padding: 0px;">
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
<?
        if ($i != $num_rows) {
?>
                                                            <div style="margin: 0px auto; padding: 0px 14px 0px 15px; border: 0px;"><img src="imgs/divider.jpg" alt="divider" style="width: 911px; height: 3px;"></div>
<?
        }
    }
?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>