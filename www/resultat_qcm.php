<?php include("inc_entete.php"); 
include("script/script_qcm.php");
haut_de_page_qcm ("QCM","Questions à choix multiple","Résultat du test");
?>
<CENTER><H1>Voici les r&eacute;sultats du QCM</H1>

<TABLE cellspacing=10 border=1>
<tr><B>
  <th>Num&eacute;ro</th>
  <th>Question</th>
  <th>Votre choix</th>
  <th>Réponse</th>
</B></tr>


<?php affiche_resultats($questions); ?>



&nbsp;&nbsp;
<a href="choix_qcm.php">Retour au sommaire</a>

</CENTER>