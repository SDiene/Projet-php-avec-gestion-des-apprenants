<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>boutton present</title>
</head>
<body>
    <?php
        include("menu.php");
    ?> <br>
    
   <?php
    $fichierTrait=fopen("../fichier/traitement.txt","r");
    echo "<table class='table table-striped'>";
            echo "<tr>
            <th scope='col'>Code Apprenant</th>
            <th scope='col'>Nom</th>
            <th scope='col'>Prénom</th>
            <th scope='col'>Date</th>
            <th scope='col'>Téléphone</th>
            <th scope='col'>Email</th>
            <th scope='col'>Statut</th>
            </tr>
            </thead>";
            
        while (!feof($fichierTrait)) {
            $text =fgets($fichierTrait);
             $ligne=explode(":",$text);
             
             
            echo '<tr>';
                for ($i=0;$i<6;$i++) { 
                       echo  '<td>'.$ligne[$i].'</td>';
                }

                echo"<td><a href='traitement2.php?code=$ligne[0]'>

                <button "; 
                if ($ligne[6]=='Présent') {
                    echo"style='background-color:red'>$ligne[6]</button></a></td>" ;
                }
                else {
                    echo"style='background-color:green'>$ligne[6]</button></a></td>" ;
                }
                echo '</tr>';
        
        }

        echo '</table>';
        fclose($fichierTrait);
    ?> 
    
</body>
</html>
