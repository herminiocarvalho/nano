<?php // é on est en utf8 :-)

// ----------------------------------
// Somaire
// ----------------------------------
// 1. Création de fonction
// 2. L'aquisition d'expérience
// 3. La communication en mode texte
// ----------------------------------

// Error(s) show
error_reporting(-1);
ini_set('display_errors', 1);

// Include function(s)
$dir = 'functions';
$dh  = opendir($dir) ;
while (false !== ($filename = readdir($dh)))
{
    $files[] = $filename ;
}
sort($files);
foreach($files as $Cle => $FileName)
{
	if ($FileName != '.' AND $FileName != '..')
	{
		require_once('functions/'.$FileName) ;
	}
}


// 1. Création de fonction
$Content = 'if(\'test\' == \'1\'){}' ;
Create_New_Function('Test', $Content);





?>