<!DOCTYPE html>
<html lang="en-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>MODIFIER UN PROMO</title>
</head>
<body>
    <?php
        include('menu.php');
    ?> <br>
    
    <h1 class="title">Modifier une Promotion</h1>
    
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
        $code=$_POST['code'];
        $nom=$_POST['nom'];
        $mois=$_POST['mois'];
        $année=$_POST['année'];

        $codeApp = fopen("../fichier/codepromo.txt", "r");
        $newligne="";
        while (!feof($codeApp)) {
        $ligne = fgets($codeApp);
        $col = explode(":", $ligne);
        if($code==$col[0]){
            $col[1]=$nom;
            $col[3]=$mois;
            $col[4]=$année;
            $modif=$code.":".$nom.":".$mois.":".$année;
        }
        else{
            $modif=$ligne;
        }
        $newligne.=$modif;
    }
        fclose($codeApp);
        $App=fopen("../fichier/codepromo.txt","w+");
        fwrite($App,$newligne);
        fclose($App);
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
            while ($text=fgets($liste)) {
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
