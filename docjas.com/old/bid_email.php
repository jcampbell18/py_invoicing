<?
   	include("common/author.php");
    
    $sql = "SELECT * FROM bids WHERE id='{$_GET['id']}'";
    $sql = mysql_query($sql);
	extract(mysql_fetch_assoc($sql));
    
    if ($id >= 10) {
		      if ($id <= 99) {
	       		  $bid = '00'.$id;		          
		      } else {
		          $bid = '0'.$id;
		      }
		} else if ($id <= 9) {
			$bid = '000'.$id;
        }
        
    $bid_date = explode("-", $bid_date);
    $bdate = $bid_date[1].'-'.$bid_date[2].'-'.$bid_date[0];
    
    $sqlA = "SELECT c.contact_name,c.business_name,c.address,c.city,c.state,c.zipcode,c.phone,p.address,p.city,p.state,p.zipcode FROM client c, project_site p WHERE p.id='$project_id' AND c.id='$client_id'";
    $sqlA = mysql_query($sqlA);
	list($c_contact_name,$c_business_name,$c_address,$c_city,$c_state,$c_zipcode,$c_phone,$p_address,$p_city,$p_state,$p_zipcode) = mysql_fetch_row($sqlA);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title>JCrew | www.jcrewsite.com</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link href="global.css" rel="stylesheet" type="text/css">
</head>

<body style="background: #ffffff; color: #000000;">

    <table style="width: 700px;">

        <tr>
            <td style="padding: 24px 24px 60px 0px; vertical-align: middle; text-align: left;">
                <?= $c_contact_name ?> w/<br />
                <b><?= $c_business_name ?></b><br />
                <?= $c_address ?><br />
                <?= $c_city.', '.$c_state.', '.$c_zipcode ?><br />
                <?= $c_phone ?>
            </td>
            <td style="padding: 24px 24px 60px 0px; vertical-align: middle; text-align: right;">
                Jason L Campbell<br />
                7925 N Scott Rd.<br />
                Spokane, WA 99216<br />
                (509) 217-8893<br />
                jcryuu@gmail.com
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Date:</b>&nbsp;
                <?= $bdate ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Location:</b><br />
                <blockquote>
                    <?= $p_address ?><br />    
                    <?= $p_city.', '.$p_state.', '.$p_zipcode ?>
                </blockquote>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: left;">
                <b>Work to be performed:</b><br />
                <blockquote>
                    <?= $description ?>
                </blockquote>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 12px 24px 12px 0px; vertical-align: middle; text-align: right;">
                <b>Total Bid:</b>&nbsp;
                $<?= $amount ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 60px 24px 12px 0px; vertical-align: middle; text-align: left; font-size: 10px;">
                <b>Bid Quote #:</b>&nbsp;
                <?= $bid ?>
            </td>
        </tr>
    </table>

</body>
</html>