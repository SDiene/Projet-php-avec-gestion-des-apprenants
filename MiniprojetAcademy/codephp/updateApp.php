<!DOCTYPE html>
<html lang="en-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>MODIFIER UN APPRENANT</title>
</head>
<body>

    <?php
        include('menu.php');
    ?> <br>
    <h1 class="title">Modifier un Apprenant</h1>
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
        <label for="inputEmail4">Prénom</label>
        <input type="text" name="prenom" class="form-control" id="inputEmail4" placeholder="Prénom" required>
        </div>

        <div class="form-group col-md-2">
        <label for="inputPassword4">Date</label>
        <input type="date" name="date" class="form-control" id="inputPassword4" placeholder="Date" required>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-md-2">
        <label for="inputPassword4">Téléphone</label>
        <input type="number" name="tel" class="form-control" id="inputPassword4" placeholder="Téléphone" required>
        </div>

        <div class="form-group col-md-2">
        <label for="inputEmail4">Email</label>
        <input type="email" name="mail" class="form-control" id="inputEmail4" placeholder="Email" required>
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputState">Statut</label>
        <select id="inputState" class="form-control" name="statut">
            <option selected>Présent</option>
            <option selected>Abscent</option>
            <option selected>Exclut</option>
        </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputState">Promotion</label>
        <select id="inputState" class="form-control" name="promo">
            <option selected>Promo 1</option>
            <option selected>Promo 2</option>
        </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" name="envoyer">Modifier</button>

</div> <br> <br>
    <?php
      if (isset($_POST['envoyer'])) {
        $code=$_POST['code'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $date=$_POST['date'];
        $tel=$_POST['tel'];
        $mail=$_POST['mail'];
        $statut=$_POST['statut'];
        $promo=$_POST['promo'];

        $codeApp = fopen("../fichier/codeapprenant.txt", "r");
        $newligne="";
        while (!feof($codeApp)) {
        $ligne = fgets($codeApp);
        $col = explode(":", $ligne);
        if($code==$col[0]){
            $col[1]=$nom;
            $col[2]=$prenom;
            $col[3]=$date;
            $col[4]=$tel;
            $col[5]=$mail;
            $col[6]=$statut;
            $col[6]=$promo;
            $modif=$code.":".$nom.":".$prenom.":".$date.":".$tel.":".$mail.":".$statut.":".$promo;
        }
        else{
            $modif=$ligne;
        }
        $newligne.=$modif;
    }
        fclose($codeApp);
        $App=fopen("../fichier/codeapprenant.txt","w+");
        fwrite($App,$newligne);
        fclose($App);
    }
    
    ?>

    <?php
        $liste=fopen("../fichier/codeapprenant.txt", "r");
        echo "<table class='table table-striped'>";
            echo "<thead>
            <tr>
            <th scope='col'>Code</th>
            <th scope='col'>Nom</th>
            <th scope='col'>Prénom</th>
            <th scope='col'>Date</th>
            <th scope='col'>Téléphone</th>
            <th scope='col'>Email</th>
            <th scope='col'>Statut</th>
            <th scope='col'>Promotion</th>
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