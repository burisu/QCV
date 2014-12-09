<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
    <title>Choix par listes</title>
    <style></style>
</head>

<body BGCOLOR="#FFFFC8">
<HR WIDTH=90%>
<CENTER>
<TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0 WIDTH="80%">
<TR>
      <TD ALIGN=CENTER><IMG SRC="./images/logo1.png" BORDER=0 ALT="Logo QCM"></TD>
      <TD>&nbsp;&nbsp;&nbsp;</TD>
      <TD>
         <div align="CENTER">
         <font COLOR="#FF6100" size="+3"><b><i>Questions à choix Multiples</font> </i></b><br>
         <font COLOR="#000000" size="+1">Testez vos connaissances</font>
         </div>
      </TD>
</TR>
</TABLE>
<HR WIDTH=90%>
 
<H2>  Choisissez : </H2>

<?php
  require("pj_select.inc");
  global $database;
  $database = pg_Connect("", "", "", "", "qcm"); # connect to the database
  if (!$database) { echo "Connection to database failed."; exit; }
?>
<form method="POST" action="" >
<table border=0i cellpadding=15>
<tr><td>Un thème<br>
<?php listOptions("refthemes","GDTC-REF"); ?>
</td><td>Un niveau de pertinence<br>
<?php listOptionsLabel("pertinences", "9"); ?>
</td></tr>
<tr><td>Un nombre maximal de questions<br>
<input name="NBRMAX" size=8 type=int value=20>
</td><td>Un niveau de difficulté<br>
<?php listOptionsLabel("difficultes", "9"); ?>
</td></tr>
</table>
<hr>
</CENTER>

<div><FONT COLOR="#FF6003" SIZE=-1>
	<?php echo "Powered by PHP version ". PHP_VERSION ?>
</FONT></div>

<?php echo "Random max =  ". mt_getrandmax() ."<br>\n";
	mt_srand((double)microtime()*1000000);
/*	for($i=0;$i<20;$i++){ $randval = mt_rand(); echo $randval . "<br>\n";}
*/
?>
</body>
</html>
