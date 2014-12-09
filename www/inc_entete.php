<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<?php  
#-- Début de page QCM

function haut_de_page_qcm ($titrepage, $titre, $soustitre)
{
  echo "<html>";
  echo "<head>";
  echo "    <META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html\";charset=iso-8859-1\">";
  echo "    <title>$titrepage</title>";
  echo "    <style></style>";
  echo "</head>";

  echo "<body BGCOLOR=\"#FFFFC8\">";

  echo "<CENTER>";
  echo "<HR WIDTH=80%>";
  echo "<TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0 WIDTH=\"80%\"BGCOLOR=\"#e8e470\" >";
  echo "<TR>";
  echo "  <TD ALIGN=left><IMG SRC=\"images/logo5.png\" BORDER=0 ALT=\"Logo_QCM\"></TD>";
  echo "  <TD>&nbsp;&nbsp;&nbsp;</TD>";
  echo "  <TD>";
  echo "  <div align=\"CENTER\"><b>";
  echo "    <font COLOR=\"#EE4400\" size=\"+3\"><i>$titre</font> </i><br>";
  echo "    <font COLOR=\"#000000\" size=\"+1\">$soustitre</font></b>";
  echo "  </div>";
  echo "  </TD>";
  echo "</TR>";
  echo "</TABLE>";
  echo "<HR WIDTH=80%>";
  echo "</CENTER>";
}
#--- Bas de page standard
function bas_page_qcm ($date)
{
  echo "<HR WIDTH=100%>";
  echo "<div align=\"right\"><font COLOR=\"#FF4400\" size=\"-1\">Pierre jarillon - $date</font></div>";
  echo "</BODY>";
  echo "</HTML>";
}
?>

