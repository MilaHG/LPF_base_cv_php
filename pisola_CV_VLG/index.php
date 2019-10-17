<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Site public</title>
         <!-- Bootstrap -->
        <link href="admin/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"href="admin/css/style_admin.css">
        <style>
            .item img{max-height: 55vh;}
        </style>
    </head>
    <body>
    <div class="container">
        <h1 class="alert alert-success">site public Mila</h1>
    

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators - pastilles qui défilent en bas slideshow et permettent de cliquer-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="admin/img/img1.jpg" alt="..." width="100%">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="admin/img/img2.jpg" alt="..." width="100%">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="admin/img/img3.jpg" alt="..." width="100%">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <!-- Controls -->
                <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>
        </div>

    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <!-- appels aux fichiers JS en fin de fichier HTML avant la fermeture </body> ce qui permet améliorer chargement de la page, 1 erreur JS p ê bloquante pour chargement de la page-->
            <script src="admin/js/bootstrap.js"></script>
    </body>
</html>