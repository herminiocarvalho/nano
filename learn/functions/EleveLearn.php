<?php

function EleveLearn($ProfessorSay)
{
	$Eval = eval($ProfessorSay) ;
	return $Eval.'@' ;
}

?>