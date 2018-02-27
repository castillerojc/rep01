<html>
<head>
	<title>Misteriosisimo PHP</title>
</head>
<body>
<?php 
	if(isset($_REQUEST['ok']))
	{
		$xml = new DOMDocument("1.0","UTF-8");
		$xml->load("arbol.xml");

		$rootTag = $xml->getElementsByTagName("ontologia")->item(0);

		$dataTag = $xml->createElement("metodos");

		$subtag = $xml->createElement("asignacion");

		$aTag = $xml->createElement("metodo16",$_REQUEST['metodo1']);
		$bTag = $xml->createElement("metodo2",$_REQUEST['metodo2']);
		$cTag = $xml->createElement("metodo3",$_REQUEST['metodo3']);
		$dTag = $xml->createElement("asignacion1",$_REQUEST['asignacion1']);
		$v1Tag = $xml->createElement("valor11",$_REQUEST['valor11']);
		$v2Tag = $xml->createElement("valor12",$_REQUEST['valor12']);
		
	
		if (empty($_POST['metodo1']))  //
		{
				
		}
		else
		{
			$dataTag->appendChild($aTag);
			if (empty($_POST['asignacion1']))
			{

			}
			else
			{
				$aTag->appendChild($dTag);
				if ((empty($_POST['valor11'])) && (empty($_POST['valor12'])))
			{

			}
			else
			{
				if (empty($_POST['valor11'])){}  else{$dTag->appendChild($v1Tag);}
				if (empty($_POST['valor12'])){}  else{$dTag->appendChild($v2Tag);}
			}
			}

		}
		
		if (empty($_POST['metodo2'])) 
		{
				
		}
		else
		{
			$dataTag->appendChild($bTag);
		}

		if (empty($_POST['metodo3'])) 
		{
				
		}
		else
		{
			$dataTag->appendChild($cTag);
		}
		

		$rootTag->appendChild($dataTag);
		$dataTag->appendChild($subtag);


		$xml->save("arbol.xml");
	}

 ?>
<form action="index.php" method="post">
	<input type="text" name="metodo1" placeholder="Método 1"/>
	<input type="text" name="metodo2" placeholder="Método 2" />
	<input type="text" name="metodo3" placeholder="Método 2" />
	<br>
	<input type="text" name="asignacion1" placeholder="Asignación 1" />
	<br>
	<input type="text" name="valor11" placeholder="valor 1" />
	<br>
	<input type="text" name="valor12" placeholder="valor 2" />

	<input type="submit" name="ok" value="add"/>

</form>

</body>
</html>
