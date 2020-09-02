                          <td colspan="2" style="width: 940px; margin: 0px; padding: 20px 36px 40px 40px; border: 0px solid #000;">
                                <div style="width: 940px; margin: 0px; border: 0px; padding: 0px 0px 0px 0px;">
                                    <table style="width: 940px; margin: 0px; padding: 0px 0px 0px 0px; border: 0px; border-collapse: collapse;">
                                        <tr>
                                            <td style="background: #f6f6f6; color: #7e7878; width: 470px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left;">
                                                <div style="padding: 20px;">
                                                    <b><u>KNOWN BUGS</u></b><br />
                                                    <ul>
<?
    $sql_a = "SELECT l.desc FROM changelog l, changelog_category c WHERE l.changelog_id=c.id AND c.id=2 ORDER BY l.id AND l.complete DESC";
	$sql_a = mysql_query($sql_a);
	while(list($desc_a) = mysql_fetch_row($sql_a)) {
?>
                                                        <li style="padding-bottom: 10px;"><?= $desc_a ?></li>								                                        
<?
	}
?>
                                                    </ul>
                                                    
                                                    <b><u>NEED TO UPDATE/ADD-ONS</u></b><br />
                                                    <ul>
<?
    $sql_b = "SELECT l.desc FROM changelog l, changelog_category c WHERE l.changelog_id=c.id AND c.id=3 ORDER BY l.id AND l.complete DESC";
	$sql_b = mysql_query($sql_b);
	while(list($desc_b) = mysql_fetch_row($sql_b)) {
?>
                                                        <li style="padding-bottom: 10px;"><?= $desc_b ?></li>								                                        
<?
	}
?>
                                                    </ul>
                                                </div>        
                                            </td>                                     
                                            <td style="background: #f6f6f6; color: #7e7878; width: 470px; vertical-align: top; font-size: 11px; font-family: Tahoma, Arial, sans-serif; text-align: left; border-left:  1px solid #000000;">
                                                <div style="padding: 20px;">                                                
                                                    <b><u>CHANGELOG</u></b><br />
                                                    <ul>
<?
    $sql_c = "SELECT l.changelog_date, l.desc FROM changelog l, changelog_category c WHERE l.changelog_id=c.id AND c.id=1 ORDER BY l.id";
	$sql_c = mysql_query($sql_c);
	while(list($date_c,$desc_c) = mysql_fetch_row($sql_c)) {
        $date = explode("-", $date_c);
        $date_c = $date[1].'-'.$date[2].'-'.$date[0];
?>
                                                        <li style="padding-bottom: 10px;"><?= $desc_c ?> <b>[<?= $date_c ?>]</b></li>								                                        
<?
	}
?>
                                                    </ul>
                                                    
                                                    <b><u>Submit to Changelog</u></b><br />
                                                    <div style="padding-top: 10px; padding-left: 30px;">
                                                        <select name="sku_id" style="border: 1px solid #7e7878; background: inherit; color: inherit; font-size: 11px; font-family: Tahoma, Arial, sans-serif;">
<?
	$sql_d = "SELECT id,name FROM changelog_category";
	$sql_d = mysql_query($sql_d);
	while(list($cl_id,$cl_name) = mysql_fetch_row($sql_d)) {
?>
                                                            <option value="<?= $cl_id ?>"><?= $cl_name ?></option>
<?
	}
?>
                                                        </select>
                                                    </div>
                                                    <div style="padding-top: 10px; padding-left: 30px;">
                                                        <input type="text" name="desc" value="<?= $desc ?>" style="width: 300px; height: 14px; background: inherit; color: #000000; font-size: 11px; font-family: Tahoma, Arial, sans-serif; border: 1px solid #7e7878;">
                                                        &nbsp;
                                                        <input type="hidden" name="changelog_date" value="<?= date(Y-m-d)?>">
                                                        <input type="submit" style="width: 70px; background: #F7e7878; color: #000000; border: 1px solid #7e7878;" name="submit" value="submit">
                                                    </div>
                                                </div>
                                            </td>                                     
                                        </tr>
                                    </table>
                                </div>
                            </td>