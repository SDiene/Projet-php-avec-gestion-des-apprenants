<!DOCTYPE html>
<html lang="en-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>AJOUTER UNE PROMO</title>
</head>
<body>
    <?php
        include("menu.php");
    ?>  <br>

    <h1 class="title">Ajouter une Promotion</h1>

<form class="form-horizontal col-lg-12" action="" method="POST">

<div class="container-fluid">

    <div class="form-row">
        
        <div class="form-group col-md-2">
        <label for="inputEmail4">Code</label>
        <input type="number" name="code" class="form-control" id="inputEmail4" placeholder="Code" required>
        </div>

        <div class="form-group col-md-2">
        <label for="inputPassword4">Nom</label>
        <input type="text" name="nom" class="form-control" id="inputPassword4" placeholder="Nom" required>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-2">
        <label for="inputEmail4">Mois</label>
        <input type="text" name="mois" class="form-control" id="inputEmail4" placeholder="Mois" required>
        </div>

        <div class="form-group col-md-2">
        <label for="inputPassword4">Année</label>
        <input type="number" name="année" class="form-control" id="inputPassword4" placeholder="Année" required>
        </div>

    </div>

    <button type="submit" class="btn btn-primary" name="envoyer">Ajouter</button>

</div>

</form>

<?php
   if (isset($_POST['envoyer'])) {

    $promo=fopen("../fichier/codepromo.txt", "a+");
    $code=$_POST['code'];
    $nom=$_POST['nom'];
    $mois=$_POST['mois'];
    $année=$_POST['année'];
    $verif=false;
    while ($text=trim(fgets($promo))) {
        $col=explode(":", $text);
        if ($code==$col[0] || $nom==$col[1] || $mois==$col[2] || $année==$col[3]) {
            $verif=true;
            echo "Ces parametres existent deja";
        }
        if ($verif==false) {
            fwrite($promo,"\n".$code.":".$nom.":".$mois.":".$année);
        }
    }
    fclose($promo);
   
    }
?>
<?php
        $liste=fopen("../fichier/codepromo.txt", "r");
            echo "<table class='table table-striped'>";
            echo "<thead>
            <tr>
            <th scope='col'>Code</th>
            <th scope='col'>Nom</th>
            <th scope='col'>Mois</th>
            <th scope='col'>Année</th>
            </tr>
            </thead>";
            while ($text=trim(fgets($liste))) {
                $ligne=explode(":",$text);
                echo "<tr>";
                for ($i=0; $i < count($ligne); $i++) { 
                    echo "<td>$ligne[$i]</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        fclose($liste);
    ?>
</body>
</html>