<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Lister</title>
</head>
<body>
    <?php
        include("menu.php");
    ?> <br>
<form class="form-inline" action="test.php" method="POST">
    
    <div class="form-group mx-sm-2 mb-2">
        <label for="inputPassword2" class="sr-only"></label>
        <input type="text" class="form-control" name="codeP" id="inputPassword2" placeholder="Promotion" required
        value="<?php if (isset($_POST['envoyer'])){$codeP=$_POST['codeP']; echo $codeP;}?>" >
    </div>

    <button type="submit" class="btn btn-outline-primary mb-2" name="envoyer" value="Ajouter"> Ajouter </button>

</form>
    
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
            <th scope='col'>Etat</th>
            </tr>
            </thead>";
            
        while (!feof($fichierTrait)) {
            $text =fgets($fichierTrait);
             $ligne=explode(":",$text);
             
             
            echo '<tr>';
                for ($i=0;$i<7;$i++) { 
                       echo  '<td>'.$ligne[$i].'</td>';
                }

                echo"<td><a href='traitement1.php?code=$ligne[0]'>

                <button "; 
                if ($ligne[7]=='Exclu') {
                    echo"style='background-color:red'>$ligne[7]</button></a></td>" ;
                }
                else {
                    echo"style='background-color:lime'>$ligne[7]</button></a></td>" ;
                }
            echo '</tr>';
        
        }

        echo '</table>';
        fclose($fichierTrait);
    ?> 
    
</body>
</html>
