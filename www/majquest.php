<?php setcookie("QCM","Test Value"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<?php
  require("inc_entete.php");
  require("inc_select.php");
  global $database;
 
  haut_de_page_qcm ("QCM - MaJ question","Questions � Choix Multiple",
	"Mise � jour d'une question");

  $database = pg_Connect("", "", "", "", "qcm"); # connect to the database
  if (!$database) { echo "Connection to database failed."; exit; }
?>

<!-- ------------ Menu principal ------------ -->

 <!-- le formulaire s'appelle lui-m�me -->

<CENTER>
<TABLE CELLPADDING=8 CELLSPACING=0 BORDER=0 WIDTH="80%">
<TR align="center">
    <TH> Acc�s � une question</TH>
    <TH>&nbsp;</TH>
    <TH>Autre action</TH>
</TR>
<TR><TD bgcolor="#FFC38B" align="center">
   <FORM method="post" action="<? echo basename($PHP_SELF); ?>">
  	<p>Quel num�ro de question ?<br> <input TYPE="text"  NAME="noq" size="12"></p> 
	<p><INPUT type="submit" value="Confirmer"></p>
   </FORM>
</TD><TD>
	&nbsp;
</TD><TD bgcolor="#FFC38B" align="center">
        <center>
	<p><A HREF=".."><img src="./images/envoi.png" alt="Envoi" border="0"></A></p>
	<p><A HREF=".."><img src="./images/quitter.png" alt="abandon" border="0"></A></p>
	</center>
</TD></TR>
<TR><TD ALIGN="center">
	<p><A HREF=".."><img src="./images/envoi.png" alt="Envoi" border="0"></A></p>
</TD><TD>
	&nbsp;
</TD><TD ALIGN="center">
	<p><A HREF=".."><img src="./images/quitter.png" alt="abandon" border="0"></A></p>
</TD></TR>
</TABLE>
</CENTER>
</FORM>
<!-- ------------ Bas de page ------------- -->
<?php
	bas_page_qcm ("14 juin 2001");
?>
