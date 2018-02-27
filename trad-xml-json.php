<html>
<head>
	<title>XML-Jason Ver. PHP</title>
</head>
<body>

<?php 
		function xml2js($xmlnode) {
    $root = (func_num_args() > 1 ? false : true); //Devuelve el número de argumentos (los nodos) pasados a la función.
    $jsnode = array();

    if (!$root) {
        if (count($xmlnode->attributes()) > 0){
            $jsnode["$"] = array();
            foreach($xmlnode->attributes() as $key => $value)
                $jsnode["$"][$key] = (string)$value;
        }

        $textcontent = trim((string)$xmlnode);
        if (count($textcontent) > 0)
            $jsnode["_"] = $textcontent;

        foreach ($xmlnode->children() as $childxmlnode) {
            $childname = $childxmlnode->getName();
            if (!array_key_exists($childname, $jsnode))
                $jsnode[$childname] = array();
            array_push($jsnode[$childname], xml2js($childxmlnode, true));
        }
        return $jsnode;
    } else {
        $nodename = $xmlnode->getName();
        $jsnode[$nodename] = array();
        array_push($jsnode[$nodename], xml2js($xmlnode, true));
        return json_encode($jsnode);
    }
}   

$xml = simplexml_load_file("arbol.xml");
echo xml2js($xml);
 ?> 
</body>
</html>