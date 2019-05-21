<!DOCTYPE html>
<html lang="en-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Ajouter un apprenant dans une promo</title>
</head>
<body>
    <?php
        include("menu.php");
    ?> <br> 

    <form class="form-inline" action="inscription.php" method="POST">
    
        <div class="form-group mx-sm-2 mb-2">
            <label for="inputPassword2" class="sr-only">Code Apprenant</label>
            <input type="text" class="form-control" name="codeA" id="inputPassword2" placeholder="Code Apprenant" required>
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <label for="inputPassword2" class="sr-only">Code Promo</label>
            <input type="text" class="form-control" name="codeP" id="inputPassword2" placeholder="Code Promo" required>
        </div>

        <button type="submit" class="btn btn-outline-primary mb-2" name="envoyer" value="Ajouter"> Ajouter </button>

    </form>
 
     
        <?php
        $variant="";
        if (isset($_POST['envoyer'])) {
            $codeA=$_POST['codeA'];
            $codeP=$_POST['codeP'];
            $fichierApp=fopen("../fichier/codeapprenant.txt", "r");
            $verif1=false;
            $verif2=false;
            while (!feof($fichierApp)) {


                $fichierProm=fopen("../fichier/codepromo.txt", "r");

                while (!feof($fichierProm)) {
                    $ligne=fgets($fichierApp);
                    $colA=explode(":", $ligne);
                    if ($codeA==$colA[0]) {
                        $verif1=true;
                        $Cod=$colA[0].":".$colA[1].":".$colA[2].":".$colA[3].":".$colA[4].":".$colA[5].":".$colA[6].":".$colA[7];
                     }

                    $text=fgets($fichierProm);
                    $colP=explode(":", $text);
                    if ($codeP==$colP[0]) {
                        $verif2=true;
                        $Pad=$colP[0].":".$colP[1].":".$colP[2].":".$colP[3];
                     }
                }
                
                fclose($fichierProm);
            }
           
            fclose($fichierApp);
            if ($verif1==false && $verif2==false) {
               echo "les codes n'existent pas";
            }
            else{
            $fichierTrait=fopen("../fichier/traitement.txt", "r");
            fwrite($fichierTrait,"\n".$Cod.":".$Pad."\n");
            fclose($fichierTrait);
            }
}
          $fichierTrait=fopen("../fichier/traitement.txt","r");
          echo "<table class='table table-striped'>";
            echo "<thead> '<h1 class='title'>Inscrir un Apprenant dans une Promotion</h1>'
            <tr>
            <th scope='col'>Code Apprenant</th>
            <th scope='col'>Nom</th>
            <th scope='col'>Prénom</th>
            <th scope='col'>Date</th>
            <th scope='col'>Téléphone</th>
            <th scope='col'>Email</th>
            <th scope='col'>Statut</th>
            <th scope='col'>Promo</th>
            </tr>
            </thead>";
          
          while ($text =fgets($fichierTrait)) {
             $ligne=explode(':',$text);
                
              echo "<tr>";

              for ($i=0; $i < count($ligne); $i++) { 

                echo "<td>$ligne[$i]</td>";

              }

              echo "</tr>";

         }
         echo "</table>";
            
  fclose($fichierTrait);


?>

</body>
</html>