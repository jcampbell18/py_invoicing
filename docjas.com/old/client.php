<?
   	include("common/author.php");
    include("common/header.php");
?>



<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

    <table>

        <tr>

            <td style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle;  text-align: center;">Clients</td>
            
            <td colspan="7" style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle; text-align: center;"><input type="button" name="add" value="CREATE NEW CLIENT" onclick="window.location='client_.php?action=add';" style="border: 1px solid #FFFFFF; background: #004552; color: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

        </tr>
        <tr>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center; font-weight: bold;">Business Name</td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center; font-weight: bold;">Contact</td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center; font-weight: bold;">Address</td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center; font-weight: bold;">City & State</td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center; font-weight: bold;">Zipcode</td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center; font-weight: bold;">Phone #</td>
            <td colspan="2" style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;">&nbsp;</td>
        </tr>

<?

    $i = 'odd';



    $sql = "SELECT * FROM client ORDER BY ID";

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
?>

        <tr style="background: <?= $bgcolor ?>;">

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><?= $business_name ?></td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><?= $contact_name ?></td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><?= $address ?></td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><?= $city.', '.$state ?></td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><?= $zipcode ?></td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><?= $phone ?></td>
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="update" value="UPDATE" onclick="window.location='client_.php?id=<?= $id ?>&action=update';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="delete" value="DELETE" onclick="JavaScript:if(window.confirm('By deleting this client, you will delete or unlink any records pertaining to this client. Are you sure you wish to DELETE?')) window.location='client_.php?action=delete&id=<?= $id ?>';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

        </tr>

<?

    }

?>

    </table>

</div>



<? include("common/footer.php") ?>