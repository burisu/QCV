<?php
require("./commun.php");

#--------------------------------------------------------------------------------


function construire_tableau($theme=0,  $pertinence=0, $diff=0, $nbQuestions) {
	$connexion = connect($host, $port, $user, $password, $database);
	//On récupère un recordset correspondant aux critères
	$query = "SELECT Q.noq, Q.question, Q.reponse ".
	"FROM questions Q";

/* ", sujets S, themes T, pertinences P, difficultes D ".
	"WHERE Q.noq = S.noq AND S.theme = T.theme AND ".
	"S.pertinence = P.pertinence AND S.difficulte = D.difficulte".
	"AND S.theme = ". $theme ." AND S.pertinence = ". $pertinence ." AND S.difficulte = ". $diff .";";
*/

	$result = exec_query($connexion,$query);

	$Nbr=numrows($result);
	echo "Nombre d'enregistrements : ". $Nbr."<BR>";

	//Organisation aléatoire des questions
	$ints = range(0,$Nbr - 1);
	srand(time());
	shuffle($ints);	


	if($Nbr < $nbQuestions)
		$nbQuestions = $Nbr;

	// On construit le tableau permettant de trier aléatoirement
	for ($i=0; $i < $nbQuestions && $row = fetch_array($result,$ints[$i]); $i++){
		echo "libelle Q : ". $row[1]."<BR>";
		$tabQ[$i][0] = $row[0];  // recuperation du numero,
		$tabQ[$i][1] = $row[1];  // du libelle,
		$tabQ[$i][2] = $row[2];  // de la reponse a la question
	}
	close($connexion);
	return $tabQ;
}


#-----------------------------------------------------------------------
function affiche_resultats($questions) {
	$nbBonnesReponses = 0;
	for($i=1; $i<=count($questions); $i++) {
	  if($questions[i][2] == $questions[i][3]) {
	?>
	<font color=#0000FF>
	
	<?php	$nbBonnesReponses ++;
  	}
  	else
	?>
    
	<font color=#FF0000>

	<?php  echo "<tr><td>". $questions[i][0]." </td>".
	"<td>". $questions[i][1]."</td>".
  	"<td>". $questions[i][3]."</td>".
  	"<td>". $questions[i][2]."</td></tr></font>";
	}

	echo "</font></TABLE>&nbsp;&nbsp;".
	"<h2><B>Vous avez ". $nbBonnesReponses ." bonne(s) r&eacute;ponse(s).</B></h2>";
}
?>