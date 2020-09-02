<?
   	include("common/author.php");
    include("common/header.php");
?>



<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

    <table>

        <tr>

            <td colspan="5" style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle; text-align: left;">Mileage</td>
            
            <td colspan="2" style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle; text-align: center;"><input type="button" name="add" value="CREATE NEW MILEAGE" onclick="window.location='mileage_.php?action=add';" style="border: 1px solid #FFFFFF; background: #004552; color: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

        </tr>

<tr>
<td class="content" style="padding-right: 24px; font-weight: bold; text-decoration: underline;">Date</td>
<td class="content" style="padding-right: 24px; font-weight: bold; text-decoration: underline;">Project Site</td>
<td class="content" style="padding-right: 24px; font-weight: bold; text-decoration: underline;">Start</td>
<td class="content" style="padding-right: 24px; font-weight: bold; text-decoration: underline;">End</td>
<td class="content" style="padding-right: 24px; font-weight: bold; text-decoration: underline;">Miles</td>
<td colspan="2" class="content">&nbsp;</td>
</tr>

<?

    $i = 'odd';

    $sql = "SELECT * FROM mileage ORDER BY id";

    $sql = mysql_query($sql);

    while($list = mysql_fetch_assoc($sql)) {

        extract($list);

        if ($i == 'odd') {

            $bgcolor = 'inherit';

            $i = 'even';

        } else {

            $bgcolor = '#fde5b6';

            $i = 'odd';

        }
        
       	$sql_c = "SELECT address,city,state,zipcode FROM project_site WHERE id='$project_id'";
    	$sql_c = mysql_query($sql_c);
    	list($paddress,$pcity,$pstate,$pzipcode) = mysql_fetch_row($sql_c)
?>

        <tr style="background: <?= $bgcolor ?>;">

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><?= $drive_date ?></td>
            
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><?= $paddress.', '.$pcity.', '.$pstate.' '.$pzipcode ?></td>
            
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><?= $start_miles ?></td>
            
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><?= $end_miles ?></td>
            
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><?= $subttl ?></td>

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="update" value="UPDATE" onclick="window.location='mileage_.php?id=<?= $id ?>&action=update';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="delete" value="DELETE" onclick="JavaScript:if(window.confirm('By deleting this client, you will delete or unlink any records pertaining to this client. Are you sure you wish to DELETE?')) window.location='mileage_.php?action=delete&id=<?= $id ?>';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

        </tr>

<?

    }

?>

    </table>

</div>



<? include("common/footer.php") ?>