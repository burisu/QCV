<?php setcookie("QCM","Test Value"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<?php
  require("inc_entete.php");
  global $database;
 
  haut_de_page_qcm ("Accueil QCM","Questions à choix multiple","Testez vos connaissances");

  $database = pg_Connect("", "", "", "", "qcm"); # connect to the database
  if (!$database) { echo "Connection to database failed."; exit; }
?>
<!-- --------------------------------------------- -->
<CENTER>
<HR WIDTH=90%>
  <FONT COLOR="#4AB0A9"><b>
    Fonctionne grâce aux Logiciels libres : Linux, Apache, PHP, Postgresql
  </b></FONT>
<HR WIDTH=90%>
</CENTER>

<!-- ------------ Menu principal ------------ -->

 <!-- le formulaire s'appelle lui-même -->
<FORM method="post" action="<? echo basename($PHP_SELF); ?>">

<CENTER>
<TABLE CELLPADDING=8 CELLSPACING=0 BORDER=0 WIDTH="90%">
<TR align="left">
    <TH>1 - Identifiez-vous</TH><TH>&nbsp;</TH>
    <TH>2 - Que voulez vous faire&nbsp;?</TH><TH>&nbsp;</TH>
    <TH>3 - Action</TH>
</TR>
<TR><TD bgcolor="#FFC38B">
   Quel est votre nom ?<br> <input TYPE="text"  NAME="utilisateur" value="anonyme" size="32"> 
</TD><TD>
	&nbsp;
</TD><TD bgcolor="#FFC38B">
	<TABLE CELLPADDING=5 CELLSPACING=0 BORDER=0 WIDTH="80%">
	  <TR><TD><input TYPE="radio" NAME="mode" VALUE="TRA"></TD><TD>M'entrainer</TD></TR>
	  <TR><TD><input TYPE="radio" NAME="mode" VALUE="RES"></TD><TD>Voir mes résultats</TD></TR>
	  <TR><TD><input TYPE="radio" NAME="mode" VALUE="CER"></TD><TD>Passer une certification</TD></TR>
	  <TR><TD><input TYPE="radio" NAME="mode" VALUE="MAJ"></TD><TD>Enrichir la base de données</TD></TR>
	</TABLE>
</TD><TD>
	&nbsp;
</TD><TD bgcolor="#FFC38B"><center>
	<p><A HREF=".."><img src="./images/quitter.png" alt="abandon" border="0"></A></p>
	<p><INPUT type="reset"  value="Annuler"></p>
	<p><INPUT type="submit" value="Confirmer"></p>
	</center>
</TD></TR>
</TABLE>
</CENTER>
</FORM>
<!-- ------------ Bas de page ------------- -->
<?php
	bas_page_qcm ("13 juin 2001");
?>
