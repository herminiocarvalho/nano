<?php // é on est en utf8 :-)


if (isset($_POST['ProfessorSay']) AND $_POST['ProfessorSay'] != '')
{
	$ProfessorSay = $_POST['ProfessorSay'] ;
	
	//$Eval = EleveLearn($ProfessorSay);
	//$Student = 'The result is = '.eval($ProfessorSay).'' ;
	$Student = '' ;
}

?>