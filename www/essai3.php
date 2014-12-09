<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<?php
  require("inc_entete.php");
  require("inc_select.php");
  global $database;
 
  haut_de_page_qcm ("Accueil QCM","Questions à choix multiple","Testez vos connaissances");
  echo"<CENTER><H2>  Choisissez : </H2>";

  $database = pg_Connect("", "", "", "", "qcm"); # connect to the database
  if (!$database) { echo "Connection to database failed."; exit; }
?>
<form method="POST" action="" >
<table border=0i cellpadding=15>
  <tr>
    <td>Un thème<br>
	<?php listOptions("refthemes","GDTC-RES"); ?></td>
    <td>Un niveau de pertinence<br>
	<?php listOptionsLabel("pertinences", "2"); ?></td>
  </tr>

  <tr>
    <td>Un nombre maximal de questions<br>
	<input name="NBRMAX" size=8 type=int value=20></td>
    <td>Un niveau de difficulté<br>
	<?php listOptionsLabel("difficultes", "3"); ?></td>
  </tr>
</table>
</form>
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
<?php
	bas_page_qcm ("13 juin 2001");
?>
