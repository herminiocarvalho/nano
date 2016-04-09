<?php

function WriteExperience($Experience)
{
	// Connexion Bdd
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=floymon;charset=utf8', 'floymon', 'Z3ZyfeCpKzDq8HAy');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	$Experience = SqlProtectInsert($Experience);
	
	$reponse = $bdd->query('INSERT INTO ia_experience(id, experience) VALUES(\'\', \''.$Experience.'\')');
}

?>