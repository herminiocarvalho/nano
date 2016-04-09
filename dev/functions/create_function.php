<?php //we are in utf8

function Create_New_Function($NameFunction, $Content)
{
	$NewFunction = 'function '.$NameFunction.'()'."\n" ;
	$NewFunction .= '{'."\n" ;
	$NewFunction .= '	'.$Content."\n" ;
	$NewFunction .= '}'."\n" ;
	
	echo $NewFunction ;
}


?>