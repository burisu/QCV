<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">

<?php  
#-- Listes  sur une table avec choix par défaut
#---------------Option simple sans Label--------------------

function listOptions($dataset,$choixdef,$champ)
{
  global $database;
  $i=0;	
  $query= "SELECT ". $champ ." FROM " .$dataset;
  $result = exec_query($database, $query);
  $Nbr=numrows($result);
/*
  for ($i = 0; $i < $Nbr; $i++)
  { 
	$tablo[$i]=pg_Result($result,$i,0);
  }
*/
  while ($i < $Nbr && $row = fetch_array($result,$i)){ //probleme a corriger
	$tablo[$i] = $row[$champ];
	$i++;
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
  $query = "SELECT * FROM " . $dataset;
  $result = exec_query($database,$query);
  $Nbr=numrows($result);
  for ($i = 0; $i < $Nbr; $i++)
  { 
	$tablo[$i]=fetch_array($result,$i);
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

