<?php
  include("inc_entete.php");
  require("script/genere_menu.php");
  require("script/database_functions.php");
  require("script/script_qcm.php");
  require("script/commun.php");
  
  haut_de_page_qcm ("QCM","Questions à choix multiple","Testez vos connaissances");

  if($aConstruire) 
	$questions = construire_tableau($refthemes, $pertinences, $difficultes, $nbQuestions); 

$nbQuestions = count($questions);

  if($nbQuestions == 0) {
  echo "<CENTER><h2>Aucune question correspond à votre demande </h2><BR><BR>".
  "<a href=\"qcm.php\">retour</a></CENTER>";
  exit;
}

	if(isset($choix)) {
		$questions[$numQuestion-1][3] = $choix;	
		echo "choix précédent : ". $choix;
	}

	echo "<CENTER>";
	if($numQuestion < $nbQuestions)
		echo "<form method=\"POST\" action=\"qcm.php\">";
  	else
	?> 
		<form method="POST" action="resultat_qcm.php" >

	<?php echo "<h2>Question ". $numQuestion ." sur ". $nbQuestions ."</h2><BR><BR>" ?>

	<table width=70% bgcolor="#FFC38B" cellpadding=5>
	<tr><td width=100%><center><h3>
	<?php echo $questions[$numQuestion][1]."<BR><BR>"; ?></h3></center></td></tr>
	
	<?php // On recupere les differents choix proposes
	$connexion = connect($host, $port, $user, $password, $database); # connect to the database
	$query = "SELECT choix FROM choix WHERE noq=$questions[$numQuestion][0];";
	$result = exec_query($connexion, $query);
	$nbEnr = numrows($result);
	
	// S'il n'y a aucun choix
	if($nbEnr == 0) { ?>
		<tr><td><CENTER><B>Aucun proposition pour cette question</B></CENTER></td></tr>
		
	<?php
		exit;
	}
	
	for($i=0; $i < $nbEnr && $row = fetch_array($result,$i); $i++) {
		$tabChoix[$i] = $row[0];
	?>
		<tr><td><input type="checkbox" name="choix" value="<?php $row[0] ?>"></td></tr> 

	<!-- <td width = 30%></td> -->

	<?php 
	}
	$numQuestion++;
?>

<input type=HIDDEN name="numQuestion" value=<?php echo $numQuestion++; ?>>
<input type=HIDDEN name="nbQuestions" value=<?php echo $nbQuestions ?>>
<input type=HIDDEN name="questions" value=<?php echo $questions[1] ?>>
<input type=HIDDEN name="aConstruire" value=0>

<input TYPE="submit" NAME="suivant" VALUE="Continuer">
</CENTER>

</form>
