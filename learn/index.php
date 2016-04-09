<?php // é on est en utf8 :-)

// L'aquisition d'expérience

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


if (isset($_GET['page']))
{
	$Page = $_GET['page'] ;
}
else
{
	$Page = 'ProfessorSay' ;
}

$PagePhp = $Page.'.controler.php' ;
$PageHtml = $Page.'.vue.php' ;


$Head = '<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="description" lang="fr" content="" />
	<meta name="keywords" content="">
	
	<meta charset=iso-8859-1>
	<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	
	<style type="text/css">
		body
		{
			margin-left:50px;
			margin-top:50px;
		}
	</style>
	
	<script type="text/javascript">
	</script>
</head>
<body>
' ;
$Footer = '
</body>
</html>' ;

if (file_exists($PagePhp) AND file_exists($PageHtml))
{
	require_once($PagePhp) ;
	echo $Head ;
	require_once($PageHtml) ;
	echo $Footer ;
}
else
{
	echo 'error no file exist !' ;
}

?>