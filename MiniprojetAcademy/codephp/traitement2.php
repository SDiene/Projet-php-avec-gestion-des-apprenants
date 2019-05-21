<?php

$login=$_GET['code'];
$vide="";
$montab=fopen("../fichier/traitement.txt", "r");
while ($ligne=fgets($montab)) {
    //$ligne=fgets($montab);
    $col=explode(":", $ligne);
    if ($login==$col[0]) {
        if ($col[6]=='Présent' ) {

            $col[6]='Abscent';
            
        }
        else {
            $col[6]='Présent';
        }
   
    $rempli=$col[0].":".$col[1].":".$col[2].":".$col[3].":".$col[4].":".$col[5].":".$col[6].":".$col[7].":\n";
    
        }
        else{
            $rempli=$ligne;
        }
    
    $vide=$vide.$rempli; 
}
fclose($montab);
$montab1=fopen('../fichier/traitement.txt', "w+"); 
fputs($montab1,trim($vide));
fclose($montab1);
header("location:res.php");

?>