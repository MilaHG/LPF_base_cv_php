<?php
session_start(); // à mettre dans toutes les pages de l'admin
require 'connexion.php';

if (isset($_SESSION['login']) && $_SESSION['login'] == 'connecté') {
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    //echo $_SESSION['login'];
} else {// utilisateur non connecté
    header('location: authentification.php');
} // ferme le ELSE du IF ISSET
//
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur ='$id_utilisateur' "); // $id_utilisateur qui vient de la variable de session
        $ligne_utilisateur = $sql->fetch();
        ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin : <?php echo($ligne_utilisateur['pseudo']); ?></title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!--Mes styles-->
        <link rel="stylesheet" type="text/css" href="css/style_admin.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>
    <body>
        <!--nav en include-->
        <?php include("include_nav.php"); ?>
        <div class="container-fluid geometrique"><!--container-fluid pour un container full width-->
            <div class="row">
                <br>
                <div class="col-md-6 col-md-offset-3 fond_fonce">
                    <h1 class="text-center">Admin - Port-folio : <?php echo($ligne_utilisateur['prenom']) . ' ' . ($ligne_utilisateur['nom']); ?></h1>
                </div>
            </div>
            <hr>
        </div>
        <div class="container"><!--container pour un container fixed width-->
            <div class="row text-center">
                <div class="col-md-6 col-lg-5 text-left">
                    <br><br>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <address>
                                <strong><?php echo($ligne_utilisateur['prenom']) . ' ' . ($ligne_utilisateur['nom']); ?></strong><br>
                                <?php echo($ligne_utilisateur['adresse']) . '<br>' . ($ligne_utilisateur['code_postal']) . ' ' . ($ligne_utilisateur['ville']); ?><br>
                                <abbr title="Phone">Tél :</abbr> <?php echo($ligne_utilisateur['telephone']); ?>
                            </address>
                            <address>
                                <strong><?php echo($ligne_utilisateur['pseudo']); ?></strong><br>
                                <a href="mailto:<?php echo($ligne_utilisateur['email']); ?>"><?php echo($ligne_utilisateur['email']); ?></a>
                            </address>
                            <address>
                                <a href="<?php echo($ligne_utilisateur['site_web']); ?>"><strong><?php echo($ligne_utilisateur['site_web']); ?></strong></a>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3 col-lg-offset-0 col-lg-7"><p>&nbsp;</p><img src="img/popolasca_grate.jpg" alt="Placeholder image" class="img-responsive"></div>
            </div>
            <hr>
            <div class="row">
                <div class="text-justify col-sm-4">« Longtemps, je me suis couché de bonne heure. Parfois, à peine ma bougie éteinte, mes yeux se fermaient si vite que je n’avais pas le temps de me dire : « Je m’endors. » Et, une demi-heure après, la pensée qu’il était temps de chercher le sommeil m’éveillait ; je voulais poser le volume que je croyais avoir encore dans les mains et souffler ma lumière ; je n’avais pas cessé en dormant de faire des réflexions sur ce que je venais de lire, mais ces réflexions avaient pris un tour un peu particulier ; ... »</div>
                <div class="col-sm-4 text-justify">Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo. Macondo era entonces una aldea de 20 casas de barro y cañabrava construidas a la orilla de un río de aguas diáfanas que se precipitaban por un lecho de piedras pulidas, blancas y enormes como huevos prehistóricos. El mundo era tan reciente, que muchas cosas carecían de nombre, y para mencionarlas había que señalarlas con el dedo</div>
                <div class="col-sm-4 text-justify">
                    <h2>Accroche du site</h2>
                    <blockquote>
                            <!--<p><?php echo($ligne_utilisateur['accroche']); ?></p>-->
                    </blockquote>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="text-center col-md-12">
                    <div class="well"><strong>Composants Bootstrap de base</strong></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-center">
                    <h4>Boutons</h4>
                    <p>Quickly add buttons to your page by using the button component in the insert panel. </p>
                    <button type="button" class="btn btn-info btn-sm">Info bouton</button>
                    <button type="button" class="btn btn-success btn-sm">Success bouton</button>
                </div>
                <div class="text-center col-sm-4">
                    <h4>Labels ou étiquettes Bootstrap</h4>
                    <p>Using the insert panel, add labels to your page by using the label component.</p>
                    <span class="label label-warning">Info Label</span><span class="label label-danger">Danger Label</span> </div>
                <div class="text-center col-sm-4">
                    <h4><strong>Glyphicons</strong></h4>
                    <p>You can also add glyphicons to your page from within the insert panel.</p>
                    <div class="row">
                        <div class="col-xs-4"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></div>
                        <div class="col-xs-4"><span class="glyphicon glyphicon-home" aria-hidden="true"> </span> </div>
                        <div class="col-xs-4"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <!--<hr>-->
        <!--<div class="row">-->
        <!--	 footer en include-->
        <?php include("include_foot.php"); ?>
        <!--</div>-->
        <!--<hr>-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
    </body>
</html>
