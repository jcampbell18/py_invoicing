<?
   	include("common/author.php");
    include("common/header.php");
?>



<div style="padding: 12px; font: 12px Arial, Tahoma, sans-serif;">

    <table>

        <tr>

            <td style="height: 16px; padding: 0px 24px 16px 24px; font-weight: bold; text-decoration: underline; vertical-align: middle;">INV#</td>

            <td style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle;">Project Site</td>
            
            <td style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle;">Work Performed</td>

            <td style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle;">Amount</td>

            <td style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle;">Completed?</td>

            <td style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle;">Paid?</td>

            <td colspan="4" style="height: 16px; padding: 0px 24px 16px 0px; font-weight: bold; text-decoration: underline; vertical-align: middle; text-align: center;"><input type="button" name="add" value="CREATE NEW INVOICE" onclick="window.location='invoices_.php?action=add';" style="border: 1px solid #FFFFFF; background: #004552; color: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

        </tr>

<?

    $i = 'odd';



    $sql = "SELECT * FROM invoice ORDER BY ID";

    $sql = mysql_query($sql);

    while($list = mysql_fetch_assoc($sql)) {

        extract($list);
		
		if ($id >= 10) {
		      if ($id <= 99) {
	       		  $inv = '00'.$id;		          
		      } else {
		          $inv = '0'.$id;
		      }
		} else if ($id <= 9) {
			$inv = '000'.$id;
        }
/*
        if ($fax == '') $fax = 'unknown';

        if ($i == 'odd') {

            $bgcolor = 'inherit';

            $i = 'even';

        } else {

            $bgcolor = '#fde5b6';

            $i = 'odd';

        }
*/
?>

        <tr style="background: <?= $bgcolor ?>;">

            <td style="height: 20px; padding: 6px 24px 6px 24px; vertical-align: middle; color: inherit;"><?= $inv ?></td>

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;">
<?
	$sqlB = "SELECT p.address,s.name FROM project_site AS p, sku AS s WHERE p.id='$project_id' AND s.id='$sku_id'";
    $sqlB = mysql_query($sqlB);
    list($address,$sku_name) = mysql_fetch_row($sqlB);
	echo $address;
?>
			</td>

			<td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><?= $sku_name ?></td>

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;">$ <?= $amount ?></td>

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><? if ($complete==1) { echo("yes"); } else { echo("no"); } ?></td>

            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit; text-align: center;"><? if ($paid==1) { echo("yes"); } else { echo("no"); } ?></td>

            <td style="height: 20px; padding: 6px 8px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="update" value="UPDATE" onclick="window.location='invoices_.php?id=<?= $id ?>&action=update';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>

            <td style="height: 20px; padding: 6px 8px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="delete" value="DELETE" onclick="JavaScript:if(window.confirm('By deleting this client, you will delete or unlink any records pertaining to this client. Are you sure you wish to DELETE?')) window.location='invoices_.php?action=delete&id=<?= $id ?>';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>
<?php /*
            <td style="height: 20px; padding: 6px 24px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="email" value="SEND EMAIL" onclick="window.location='invoices_.php?action=email&id=<?= $id ?>';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>
*/ ?>

<?
    if ($complete == 1) {
?>

            <td style="height: 20px; padding: 6px 8px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="images" value="IMAGES" onclick="window.location='images.php?pid=<?= $project_id ?>&action=view';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>
            <td style="height: 20px; padding: 6px 12px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="print" value="PRINT ME" onclick="window.open('invoice_email.php?id=<?= $id ?>','Printable Invoice','width =750,height=700')" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>        

<?
    } else {
?>

            <td colspan="2" style="height: 20px; padding: 6px 8px 6px 0px; vertical-align: middle; color: inherit;"><input type="button" name="images" value="IMAGES" onclick="window.location='images.php?pid=<?= $project_id ?>&action=view';" style="border: 1px solid #004552; background: #FFFFFF; font: 10px Arial, Tahoma, sans-serif;"></td>            
            
<?
    }
?>
        </tr>

<?

    }

?>

    </table>

</div>



<? include("common/footer.php") ?>