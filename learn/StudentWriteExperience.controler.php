<?php

if (isset($_POST['ProfessorSay']) AND $_POST['ProfessorSay'] != '')
{
	$ProfessorSay = $_POST['ProfessorSay'] ;
	WriteExperience($ProfessorSay);
}


?>