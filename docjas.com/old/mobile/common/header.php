<?
   	$page = basename($_SERVER['PHP_SELF']);
	list($page_, $extension) = explode('.', $page);

	$btn_1 = array("main", "main_");
	$btn_2 = array("invoices", "invoices_");
	$btn_3 = array("projectsite","projectsite_");

    $btn1 = 'Main';
	$btn2 = 'Invoices';
	$btn3 = 'MISC';

    $btn1_link = 'main';
    $btn2_link = 'invoices';
    $btn3_link = 'projectsite';

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title>JCrew | www.jcrewsite.com</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link href="global.css" rel="stylesheet" type="text/css">
</head>

<body style="background: #484848; color: #000000;">

<div style="width: 740px; height: 1200px; margin: 0px auto;">

<table style="width: 740px; height: 1200px; padding: 4px 0px 4px 0px;">

    <tr>
<?
    if (in_array($page_, $btn_1)) {
        $color1 = '#FFFFFF';
        $tab1 = 'active';
    } else {
        $color1 = '#F7BC00';
        $tab1 = 'nonactive';
    }
?>
        <td style="width: 220px; height: 32px; background: url('imgs/tab_<?= $tab1 ?>.gif') no-repeat; color: #FFFFFF; font: bold 24px Arial,Tahoma,sans-serif; text-align: center;">
            <a href="<?= $btn1_link.'.php'; ?>" style="text-decoration: none; color: <?= $color1 ?>; background: transparent;"><?= $btn1 ?></a>
        </td>
        <td style="width: 4px; height: 32px;"><img src="imgs/bPx.gif" alt="" style="width: 4px; height: 32px;"></td>
<?
    if (in_array($page_, $btn_2)) {
        $color2 = '#FFFFFF';
        $tab2 = 'active';
    } else {
        $color2 = '#F7BC00';
        $tab2 = 'nonactive';
    }
?>
        <td style="width: 220px; height: 32px; background: url('imgs/tab_<?= $tab2 ?>.gif') no-repeat; color: #f7bc00; font: bold 24px Arial,Tahoma,sans-serif; text-align: center;">
            <a href="<?= $btn2_link.'.php'; ?>" style="text-decoration: none; color: <?= $color2 ?>; background: transparent;"><?= $btn2 ?></a>
        </td>
<?
    if (in_array($page_, $btn_3)) {
        $color3 = '#FFFFFF';
        $tab3 = 'active';
    } else {
        $color3 = '#F7BC00';
        $tab3 = 'nonactive';
    }
?>
        <td style="width: 4px; height: 32px;"><img src="imgs/bPx.gif" alt="" style="width: 4px; height: 32px;"></td>
        <td style="width: 220px; height: 32px; background: url('imgs/tab_<?= $tab3 ?>.gif') no-repeat; color: #f7bc00; font: bold 24px Arial,Tahoma,sans-serif; text-align: center;">
            <a href="<?= $btn3_link.'.php'; ?>" style="text-decoration: none; color: <?= $color3 ?>; background: transparent;"><?= $btn3 ?></a>
        </td>
        <td style="width: 72px; height: 32px; text-align: center;">
            <span style="font-size: 14px; vertical-align: middle;">
                <a href="index.php" style="text-decoration: none; color: #CCCCCC; background: transparent;">Logout</a>
            </span>
        </td>
    </tr>
    <tr>
        <td colspan="6" style="width: 740px; height: 16px; background: url('imgs/t_layer.gif') no-repeat;"><img src="imgs/bPx.gif" alt="" style="width: 740px; height: 16px;"></td>
    </tr>
    <tr>
        <td colspan="6" style="width: 740px; background: url('imgs/main.gif') repeat-y; width: 740px; height: 1128px; vertical-align: top;">
            <div style="padding: 8px;">
                <table style="">
                    <tr>
                        <td style="width: 16px; height: 16px; background: url('imgs/whitebox_tl.gif') no-repeat;"><img src="imgs/bPx.gif" alt="" style="width: 16px; height: 16px;"></td>
                        <td style="width: 682px; height: 16px; background: url('imgs/whitebox_t.gif') repeat-x;"><img src="imgs/bPx.gif" alt="" style="width: 682px; height: 16px;"></td>
                        <td style="width: 16px; height: 16px; background: url('imgs/whitebox_tr.gif') no-repeat;"><img src="imgs/bPx.gif" alt="" style="width: 16px; height: 16px;"></td>
                    </tr>
                    <tr>
                        <td style="width: 16px; height: 1056px; background: url('imgs/whitebox_l.gif') repeat-y;"><img src="imgs/bPx.gif" alt="" style="width: 16px; height: 1056px;"></td>
                        <td style="background: #FFFFFF; color: #000000; vertical-align: top;">