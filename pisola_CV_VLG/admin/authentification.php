<?php require 'connexion.php'; ?>
<?php
/*
 * A mettre dans toutes les pages de l'admin, même cette page
 */
session_start();
$msg_log_err = ''; // initialise la variable contenant le message d'erreur
//$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur ='$id_utilisateur' ");
//$ligne_utilisateur = $sql->fetch();
// déconnexion de l'admin - à mettre dans toutes les pages de l'admin
if (isset($_GET['logout'])) { // on récupère le terme quitter dans l'URL
    // on vide le contenu des variables
    $_SESSION['login'] = '';
    $_SESSION['id_utilisateur'] = '';
    $_SESSION['prenom'] = '';
    $_SESSION['nom'] = '';

    unset($_SESSION['login']);

    session_destroy();
    //header('location:../index.php');
}
// echo '<pre>', var_dump($_SESSION);
// echo '</pre>';

if (isset($_POST['login'])) {// on renvoie le formulaire avec l'attribut name du bouton (on a cliqué dessus)
    $email = addslashes($_POST['email']); // ajoute un caractère d'échappement
    $mdp = addslashes($_POST['mdp']);

    $sql = $pdoCV->prepare("SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' "); // on vérifie le mail et le mdp
    $sql->execute();
    $nbr_utilisateur = $sql->rowCount(); // on compte si on a des lignes de résultat à la requête que l'on vient d'exécuter => 1 si l'utilisateur existe et 0 sinon
    if ($nbr_utilisateur == 0) {
        $msg_log_err = "Erreur d'authentification !";
    } else {
        $ligne_utilisateur = $sql->fetch(); // on récupère les infos

        $_SESSION['login'] = 'connecté'; // le name du bouton
        $_SESSION['id_utilisateur'] = $ligne_utilisateur['id_utilisateur'];
        $_SESSION['prenom'] = $ligne_utilisateur['prenom'];
        $_SESSION['nom'] = $ligne_utilisateur['nom'];

        header('location: index.php');
    }
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authentification</title>
        <!--CKEditor-->
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!--Mes styles-->
        <link rel="stylesheet" type="text/css"href="css/style_admin.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body>
        <!--nav en include-->
        <?php //include("include_nav.php");  ?>
        <div class="container">
            <h1>Admin - Authentification</h1>
            <hr>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <!-- Formulaire de connexion à l'admin -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Se connecter à l'espace Admin</h3>
                        </div>
                        <div class="panel-body">
                            <form action="authentification.php" method="POST" class="form-group">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" Placeholder="Email" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" name="mdp" placeholder="Mot de passe" class="form-control" required/>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--	 footer en include-->
            <?php include("include_foot.php"); ?>
        </div>
        <hr>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
</body>
</html>