<?
  define("DBName","jcrewsite");
  define("HostName","h50mysql119.secureserver.net");
  define("UserName","jcrewsite");
  define("Password","Blader01!");

  $connection = mysql_connect(HostName,UserName,Password);

  if (!$connection) {
      echo("Can not connect database ".DBName."!<BR>");
      echo(mysql_error());
      exit;
  }

  mysql_select_db(DBName,$connection);
?>