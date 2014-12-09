<?php setcookie("QCM","Test Value"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<?php
  require("inc_entete.php");
  require("inc_select.php");
  global $database;
 
  haut_de_page_qcm ("QCM - Mode creation","Questions à Choix Multiple",
	"Mise à jour du questionnaire");

  $database = pg_Connect("", "", "", "", "qcm"); # connect to the database
  if (!$database) { echo "Connection to database failed."; exit; }
?>

<!-- ------------ Menu principal ------------ -->

 <!-- le formulaire s'appelle lui-même -->

<CENTER>
<TABLE CELLPADDING=8 CELLSPACING=0 BORDER=0 WIDTH="80%">
<TR align="center">
    <TH> Accès à une question</TH>
    <TH>&nbsp;</TH>
    <TH>Autre action</TH>
</TR>
<TR><TD bgcolor="#FFC38B" align="center">
   <FORM method="post" action="<? echo basename($PHP_SELF); ?>">
  	<p>Quel numéro de question ?<br> <input TYPE="text"  NAME="noq" size="12"></p> 
	<p><INPUT type="submit" value="Confirmer"></p>
   </FORM>
</TD><TD>
	&nbsp;
</TD><TD bgcolor="#FFC38B" align="center">
        <center>
	<p><A HREF=".."><img src="./images/creer.png" alt="Créer" border="0"></A></p>
	<p><A HREF=".."><img src="./images/quitter.png" alt="abandon" border="0"></A></p>
	</center>
</TD></TR>
</TABLE>
</CENTER>
</FORM>
<!-- ------------ Bas de page ------------- -->
<?php
	bas_page_qcm ("14 juin 2001");
?>
