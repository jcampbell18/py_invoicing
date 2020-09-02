<?
	session_start() ;
	unset($_SESSION['username']) ;
	unset($_SESSION['username_access']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>DocJas | www.docjas.com | repair &amp; renovation</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="author" content="Jason L Campbell" />
  <meta name="description" content="DocJas | www.docjas.com | repair &amp; renovation" />
  <meta name="keywords" content="DocJas,Jason L Campbell,jcryuu,Repair,Renovation,Foreclosure,Installation,Contractor,Subcontractor,Spokane,Spokane Valley,WA,Washington,Doc J Nicolson,Jas,Doc" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <link href="global.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/png" href="../imgs/favicon.png" />
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25642875-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>
<form id="form-1" action="common/authentication.php" method="post">
  <fieldset>
    <legend>LOGIN</legend>
    <ol style="margin-bottom: 30px;">
      <li style="padding-bottom: 22px;"><label for="field1">Username:</label></li>
      <li style="padding-bottom: 12px;"><input type="text" id="field1" name="c_login" value="" required/></li>
    </ol>
    <ol style="margin-bottom: 30px;">
      <li style="padding-bottom: 22px;"><label for="field2">Password:</label></li>
      <li style="padding-bottom: 12px;"><input type="password" id="field2" name="c_password" /></li>
    </ol>
    <ol class="buttons" style="margin-bottom: 30px;">
      <li style="padding-left: 20px;"><input type="reset" class="button" value="Reset" /></li>
      <li><input type="submit" class="button" value="Submit" /></li>
    </ol>
  </fieldset>
</form>

</body>
</html>