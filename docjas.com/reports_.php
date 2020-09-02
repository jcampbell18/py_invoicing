<? include("common/connect.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title>DocJas.com - Invoice Summary</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link href="global.css" rel="stylesheet" type="text/css">
</head>

<body style="background: #ffffff; color: #000000; font: 11px Arial;">

<p>Jason L Campbell<br />
7925 N Scott Rd.<br />
Spokane, WA 99217<br />
(509) 217-8893<br />
jcryuu@gmail.com</p>

<table>
    <tr>
        <td colspan="8" style="font-weight: bold; padding: 10px 0px 6px 0px;">Invoice Summary Report for 2011</td>
    </tr>
    <tr>
        <td style="padding: 10px; text-decoration: underline;">Invoice #</td>
        <td style="padding: 10px; text-decoration: underline;">Date</td>
        <td style="padding: 10px; text-decoration: underline;">Project Site</td>
        <td style="padding: 10px; text-decoration: underline;">Work Performed</td>
        <td style="padding: 10px; text-decoration: underline;">Amount</td>
<? /*        <td style="padding: 10px; text-decoration: underline;">Completed?</td> */ ?>
        <td style="padding: 10px; text-decoration: underline;">Paid?</td>
        <td style="padding: 10px; text-decoration: underline;">Check #</td>
    </tr>

<?
    $sql = "SELECT * FROM invoice WHERE id>19 ORDER BY ID";
    $sql = mysql_query($sql);
/* Counting Number of Rows, adding divider between each row until the end */ 
    $num_rows = mysql_num_rows($sql);      
    $i = 0;
    while($list = mysql_fetch_assoc($sql)) {
        extract($list);
        $i++;
/* Converting ID to Invoice # */
        if ($id >= 10) {
		      if ($id <= 99) {
	       		  $inv = '00'.$id;		          
		      } else {
		          $inv = '0'.$id;
		      }
		} else if ($id <= 9) {
			$inv = '000'.$id;
        }
/* Converting Project Sites id and SKU id to actual name */
        $sqlB = "SELECT p.address,p.city,p.state,p.zipcode,s.name FROM projectsites AS p, sku AS s WHERE p.id='$project_id' AND s.id='$sku_id'";
        $sqlB = mysql_query($sqlB);
        list($address,$city,$state,$zipcode,$sku_name) = mysql_fetch_row($sqlB);
/* converting binary to either checked or unchecked box */
        if ($complete == 1) {
            $complete_checkbox = 'X';
        } else {
            $complete_checkbox = ' ';
        }
        if ($paid == 1) {
            $paid_checkbox = 'X';
        } else {
            $paid_checkbox = ' ';
        }
/* Changing the date to regular format */
        $mdy = explode("-",$date_start);
        $date_start = $mdy[1].'-'.$mdy[2].'-'.$mdy[0];
?>            

    <tr>
        <td style="padding: 10px;">#<?= $inv ?></td>
        <td style="padding: 10px;"><?= $date_start ?></td>
        <td style="padding: 10px;"><?= $address.', '.$city.', '.$state.' '.$zipcode ?></td>
        <td style="padding: 10px;"><?= $sku_name ?></td>
        <td style="padding: 10px;">$<?= number_format($amount, 2, '.', ',') ?></td>
<? /*        <td style="padding: 10px;"><?= $complete_checkbox ?></td> */ ?>
        <td style="padding: 10px;" align="center"><?= $paid_checkbox ?></td> 
        <td style="padding: 10px;"><?= $paid_checknum ?></td>
    </tr>

<?
    }
?>

</table>