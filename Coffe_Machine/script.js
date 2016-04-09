function CheckIfOrder()
{
	RequeteAjax('', 'http://www.floymon.be/test-Jeff/Coffe_Machine/HaveYouOrder.php', 'ReturnOrder');	
}

function ReturnOrder(ReturnValue)
{
	if (ReturnValue != '')
	{
		//alert('Go Order :-D') ;
		//alert(ReturnValue) ;
		
		//ImgNespresso
		//ImgCoffee
		
		if (ReturnValue == 'expresso' || ReturnValue == 'coffee' || ReturnValue == 'coffeemilk')
		{
			//alert(ReturnValue);
			//alert(document.getElementById(ReturnValue).className);
			document.getElementById(ReturnValue).className = 'BoutonActif Bouton' ;
			//alert(document.getElementById(ReturnValue).className);
			//alert('Img'+ReturnValue);
			document.getElementById('Img'+ReturnValue).style.display = 'block' ;
		}
		else
		{
			alert('Demand is not possible ;-) Just coffee :-D') ;
		}
	}
	
	//document.getElementById('TheBody').innerHTML = ReturnValue ;
	
	setTimeout("CheckIfOrder()",1000);
}

function RequeteAjax(donneedenvoie,Url,Fonction_a_appeler_apres_requete)
{
	//var donneedenvoie = 'MCVcode='+ValeurProposePourLeCodeDeVerif+'&MCVimg='+NomImage+'&MCVlangue='+LangueaUtiliser ;
				
	// on envoie via Ajax
	var xhr_object = null;
	
	if(window.XMLHttpRequest) // Firefox
	{
	   xhr_object = new XMLHttpRequest();
	}
	else
	{
		if(window.ActiveXObject) // Internet Explorer
		{
			xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		}
		else // XMLHttpRequest non supporté par le navigateur
		{
			alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
			return;
		}
	}
	
	var method   = "POST";
	//var filename = document.getElementById(IdDuFormulaire+'UrlForTestSecurityCode').innerHTML ;
	var filename = Url;
	var requete  = donneedenvoie ;
	
	xhr_object.onreadystatechange = function()
	{
		if(xhr_object.readyState == 4)
		{
			ReponseFromAjax = xhr_object.responseText;
			eval(Fonction_a_appeler_apres_requete+"(ReponseFromAjax);");
		}
	}
	   
	xhr_object.open(method, filename, true);
	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr_object.send(requete);
}
