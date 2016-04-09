<?php

function SqlProtectInsert($chaine)
{
	$chaine = str_replace("'", "\'", $chaine) ;
	return $chaine ;
}

function SqlProtectRead($chaine)
{
	$chaine = str_replace("\'", "'", $chaine) ;
	return $chaine ;
}

?>