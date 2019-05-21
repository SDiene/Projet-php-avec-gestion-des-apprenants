<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/main.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Ajouter un Apprenant</title>
</head>
<body>
    <?php
        include("menu.php");
    ?> <br> 

    <h1 class="title">Ajouter une Apprenant</h1>

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
            <input type="date" name="date" class="form-control" id="inputPassword4" placeholder="Date de naissance" required>
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
                <option selected value="present">Présent</option>
                <option selected value="abscent">Abscent</option>
                <option selected value="exclut">Exclut</option>
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

        <button type="submit" class="btn btn-primary" name="envoyer">Ajouter</button>

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

    $verifie=false;

    $codeapprenant=fopen("../fichier/codeapprenant.txt", "a+");
    while ($text =fgets($codeapprenant)) {
            ;
            $ligne=explode(':',$text);
            if ($ligne[0]==$code || $ligne[4]=$tel || $ligne[5]==$mail) {
                $verifie=true;
                // strcasecmp($produit,$ligne[0])==0) 
            }
            if ($verifie==false) {
                fwrite($codeapprenant,"\n". $code.":".$nom.":".$prenom.":".$date.":".$tel.":".$mail.":".$statut.":".$promo);
            }
    }echo "Ces parametres existent déja";
    fclose($codeapprenant);
    } 
    
    $fichierApp=fopen("../fichier/codeapprenant.txt","r");
    echo "<table class='table table-striped'>";
    echo "<thead>
        <tr>
       <th>Code</th>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Date</th>
       <th>Telephone</th>
       <th>Email</th>
       <th>Statut</th>
       <th>Promotion</th>
        </tr>
    </thead>";
    while (!feof($fichierApp)) {
       $text =fgets($fichierApp);
       $ligne=explode(':',$text);

        echo "<tr>";
           for ($i=0; $i < count($ligne); $i++) { 
               echo "<td>$ligne[$i]</td>";
           }
        echo "</tr>";
   }
      echo "</table>";
      
    fclose($fichierApp);
    ?>
</body>
</html>