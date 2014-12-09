<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
    <title>Choix par listes</title>
    <style></style>
</head>
<body>
  <hr>

<?php  
#-- Listes  sur une table Postgresql avec choix par défaut
#---------------Option simple sans Label--------------------

function listOptions($dataset,$choixdef)
{
  global $database;
  $result = pg_Exec($database, "SELECT * FROM " . $dataset);
  $Nbr=pg_NumRows($result);
  for ($i = 0; $i < $Nbr; $i++)
  { 
	$tablo[$i]=pg_Result($result,$i,0);
  }
  if ($Nbr>2){sort($tablo);}

  echo "<select name=liste_" . $dataset . ">\n";
  for ($i = 0; $i < $Nbr; $i++)
  { 
    if ($tablo[$i] == $choixdef)
	{ echo "  <option selected>".$tablo[$i]."</option>\n";}
    else
	{ echo "  <option>".$tablo[$i]."</option>\n";};
  }
  echo "</select>\n"; 
  return(1);
}
#---------------Option avec Label---------------------------

function listOptionsLabel($dataset,$choixdef)
{
  global $database;
  $result = pg_Exec($database, "SELECT * FROM " . $dataset);
  $Nbr=pg_NumRows($result);
  for ($i = 0; $i < $Nbr; $i++)
  { 
	$tablo[$i]=pg_fetch_array($result,$i);
  }
  if ($Nbr>2){sort($tablo);}

  echo "<select name=liste_" . $dataset . ">\n";
  for ($i = 0; $i < $Nbr; $i++)
  { 
    list($cle,$label)=$tablo[$i];
    if ($cle == $choixdef)
	{ echo "  <option selected>".$cle." = ".$label."</option>\n";}
    else
	{ echo "  <option>".$cle." = ".$label."</option>\n";};
  }
  echo "</select>\n"; 
  return(1);
}
#-----------------------------------------------------------
?>
 
<H2>  Bonjour tout le monde !</H2>
<form method="post" action="">
<?php
  global $database;
  $database = pg_Connect("", "", "", "", "qcm"); # connect to the database
  if (!$database) { echo "Connection to database failed."; exit; }
?>
<hr>
<?php $reftable="refthemes"; $defo="GDTC-REF"; 
	listOptions($reftable, $defo); ?>
<hr>
<?php listOptionsLabel("pertinences", "9"); ?>
<hr>
<?php listOptions("refthemes", "GDTP"); ?>
</form>
<hr>
<div><FONT COLOR="#FF6003" SIZE=-1>
	<?php echo "Powered by PHP version ". PHP_VERSION ?>
</FONT></div>
</FONT> 
</body>
</html>
