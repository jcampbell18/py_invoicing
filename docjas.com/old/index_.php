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
<div style="font: bold 16px Arial, Tahoma, sans-serif; padding: 0px; margin: 0px; color: #FFFFFF; background: transparent; padding: 4px 0px 12px 8px;">
    <div style=" vertical-align: middle;">JCrew</div>
</div>
<div style="width: 200px; height: 158px; margin: 0px auto; padding-top: 200px;">
  <table style="width: 200px; height: 158px;">
      <tr>
          <td colspan="3" style="background: url('imgs/login_top.gif') no-repeat; color: #FFFFFF; width: 200px; height: 24px;">
              <div style="padding-left: 34px; font: bold 12px Arial, Tahoma, sans-serif;">Login Area</div>
          </td>
      </tr>
      <tr>
          <td style="background: url('imgs/login_left.gif') repeat-y; width: 8px; height: 125px;">
              <img src="imgs/bPx.gif" alt="" style="width: 8px; height: 125px;">
          </td>
          <td style="background: #f7a706; color: #004552; width: 184px; height: 125px;">
              <div style="padding: 8px; width: 168px; margin: 0px auto;">
                  <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td style="padding: 0px 10px 10px 0px; font-weight: bold;">Username:</td>
                            <td style="padding-bottom: 10px;"><input type="text" size="10" name="c_login" value="<?= 'jcryuu'; ?>" style="font: 12px Arial, Tahoma, sans-serif; border: 1px solid #004552; color: #000000;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 10px 10px 0px; font-weight: bold;">Password:</td>
                            <td style="padding-bottom: 10px;"><input type="password" size="10" name="c_password" value="<?= 'blader01'; ?>" style="font: 12px Arial, Tahoma, sans-serif; border: 1px solid #004552; color: #000000;"></td>
                        </tr>
                        <tr>
                          <td colspan="2">
                              <div align="right">
                                  <input type="submit" value="SUBMIT" style="border: 1px solid #004552; background: #FFFFFF; color: #004552; font: 10px Arial, Tahoma, sans-serif;">
                              </div>
                          </td>
                        </tr>
                    </table>
                  </form>
              </div>
          </td>
          <td style="background: url('imgs/login_right.gif') repeat-y; width: 8px; height: 125px;">
              <img src="imgs/bPx.gif" alt="" style="width: 8px; height: 125px;">
          </td>
      </tr>
      <tr>
          <td colspan="3" style="background: url('imgs/login_bot.gif') no-repeat; width: 200px; height: 9px;">
              <img src="imgs/bPx.gif" alt="" style="width: 200px; height: 9px;">
          </td>
      </tr>
  </table>
</div>
</body>
</html>