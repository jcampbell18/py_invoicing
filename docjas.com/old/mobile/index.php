<?
    session_start() ;
    unset($_SESSION['admin_']) ;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
  <title>JCrew | www.jcrewsite.com</title>
  <link href="global.css" rel="stylesheet" type="text/css">
</head>

<body style="background: #004552; color: #000000;">

<div style="width: 600px; height: 400px; margin: 0px auto; padding-top: 200px;">
  <table style="width: 600px; height: 400px;">
      <tr>
          <td colspan="3" style="background: url('imgs/login_top.gif') no-repeat; color: #FFFFFF; width: 600px; height: 24px;">
              <div style="padding-left: 16px; font: bold 18px Arial, Tahoma, sans-serif;">Login Area</div>
          </td>
      </tr>
      <tr>
          <td style="background: url('imgs/login_left.gif') repeat-y; width: 8px; height: 367px;">
              <img src="imgs/bPx.gif" alt="" style="width: 8px; height: 367px;">
          </td>
          <td style="background: #f7a706; color: #004552; width: 584px; height: 367px;">
              <div style="padding: 8px; width: 200px; margin: 0px auto;">
                  <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td style="padding: 0px 10px 10px 0px; font-weight: bold; font-size: 32px;">Username:</td>
                            <td style="padding-bottom: 10px;"><input type="text" size="10" name="c_login" value="<?= 'jcryuu'; ?>" style="font: 32px Arial, Tahoma, sans-serif; border: 1px solid #004552; color: #000000;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px 10px 0px; font-weight: bold; font-size: 32px;">Password:</td>
                            <td style="padding-bottom: 10px;"><input type="password" size="10" name="c_password" value="<?= 'blader01'; ?>" style="font: 32px Arial, Tahoma, sans-serif; border: 1px solid #004552; color: #000000;"></td>
                        </tr>
                        <tr>
                          <td colspan="2">
                              <div align="right">
                                  <input type="submit" value="SUBMIT" style="border: 1px solid #004552; background: #FFFFFF; color: #004552; font: 24px Arial, Tahoma, sans-serif;">
                              </div>
                          </td>
                        </tr>
                    </table>
                  </form>
              </div>
          </td>
          <td style="background: url('imgs/login_right.gif') repeat-y; width: 8px; height: 367px;">
              <img src="imgs/bPx.gif" alt="" style="width: 8px; height: 367px;">
          </td>
      </tr>
      <tr>
          <td colspan="3" style="background: url('imgs/login_bot.gif') no-repeat; width: 600px; height: 9px;">
              <img src="imgs/bPx.gif" alt="" style="width: 600px; height: 9px;">
          </td>
      </tr>
  </table>
</div>
</body>
</html>