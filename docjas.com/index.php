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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="author" content="Jason L Campbell" />
    <meta name="description" content="DocJas | www.docjas.com | repair &amp; renovation" />
    <link rel="icon" type="image/png" href="imgs/favicon.png" />
</head>
<body style="background: #c9ccd1; color: #000000;">

<div style="width: 1024px; height: 768px; margin: 0px auto; padding: 0px;">
  <table style="width: 1024px; height: 768px; border: 1px solid #3a3a3a; padding: 0px; margin: 0px; border-collapse: collapse; border: 0px;">
      <tr>
          <td colspan="3" style="background: url('imgs/login/topbox.jpg') no-repeat; color: #FFFFFF; width: 1024px; height: 303px; padding: 0px; border: 0px;"><div style="padding: 0px;">&nbsp;</div></td>
      </tr>    
      <tr>
          <td style="background: url('imgs/login/leftbox.jpg') no-repeat; width: 347px; height: 210px; padding: 0px; margin: 0px; border: 0px;"><div style="width: 347px; height: 210px; padding: 0px;">&nbsp;</div></td>
          <td style="background: #3a3a3a; color: #ffffff; width: 308px; height: 210px; padding: 0px; margin: 0px; border: 0px;">
            <form action="common/authentication.php" method="post">
                <table style="margin: 0px auto; padding: 0px; width: 300px; height: 200px; border-collapse: collapse; border: 0px;">
                    <tr>
                        <td style="background: url('imgs/login/box1.jpg') no-repeat; width: 300px; height: 30px; padding: 0px; border: 0px;"><div style="padding: 0px 0px 0px 50px; text-decoration: underline; font-weight: bold; font-size: 24px; font-style:  italic;">LOGIN</div></td>
                    </tr>
                    <tr>
                        <td style="background: url('imgs/login/box2.jpg') no-repeat; width: 300px; height: 60px; padding: 0px; border: 0px; margin: 0px;">
                            <div style="width: 250px; height: 30px; padding: 20px 0px 0px 20px; font-weight: bold;">
                                Username:&nbsp; &nbsp;
                                <input type="text" size="20" name="c_login" value="" style="width: 130px; height: 18px; font: 12px Arial, Tahoma, sans-serif; border: 1px solid #004552; color: #000000; padding: 0px;" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background: url('imgs/login/box3.jpg') no-repeat; width: 300px; height: 60px; padding: 0px; border: 0px;">
                            <div style="width: 250px; height: 30px; padding: 20px 0px 0px 20px; font-weight: bold;">
                                Password:&nbsp; &nbsp;
                                <input type="password" size="20" name="c_password" value="" style="width: 130px; height: 18px; font: 12px Arial, Tahoma, sans-serif; border: 1px solid #004552; color: #000000; padding: 0px;" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background: url('imgs/login/box4.jpg') no-repeat; width: 308px; height: 15px; padding: 0px; border: 0px;">
                            <div style="padding: 0px;">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background: url('imgs/login/box5.jpg') no-repeat; width: 308px; height: 30px; padding: 0px; border: 0px;">
                            <div style="padding: 0px 20px 0px 0px; text-align: right;">
                                <input type="submit" name="submit" value="SUBMIT" style="border: 1px solid #004552; background: #FFFFFF; color: #004552; font: 10px Arial, Tahoma, sans-serif; padding: 0px;" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background: url('imgs/login/box6.jpg') no-repeat; width: 308px; height: 10px; padding: 0px; border: 0px;"><div style="padding: 0px; font: 6px Arial, Tahoma, sans-serif;">&nbsp;</div></td>
                    </tr>
                </table>
            </form>
          </td>
          <td style="background: url('imgs/login/rightbox.jpg') no-repeat; width: 368px; height: 210px; padding: 0px; margin: 0px; border: 0px;"><div style=" width: 368px; height: 210px; padding: 0px;">&nbsp;</div></td>
      </tr>
      <tr>
          <td colspan="3" style="background: url('imgs/login/bottombox.jpg') no-repeat; color: #FFFFFF; width: 1024px; height: 255px; padding: 0px; border: 0px;"><div style="padding: 0px;">&nbsp;</div></td>
      </tr>     
  </table>
</div>
</body>
</html>