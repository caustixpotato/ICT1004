<!DOCTYPE html>
<html lang="en">
    <head> <!--header-->
        <title>Tarts N's Cake</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap 4.5.3 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">

        <!-- Internal CSS-->
        <link rel="stylesheet" href="css/main.css" />

        <!-- Bootstrap 4.5.3 jQuery-->
        <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
        </script>

        <!--Bootstrap 4.5.3 JS-->
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous">
        </script>

        <!-- Internal JS -->
        <script defer src="js/main.js"></script>

        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC&display=swap" rel="stylesheet">

    </head>

    <body>
        <?php
        include "phpFiles/nav.inc.php";
        ?> 
        <main>

            <div class="jumbotron jumbotron-fluid text-center bg-light">
                <div class="container">
                    <h1>Tarts N' Cakes</h1>
                    <p>Best thing since Sliced Bread</p>
                    <a class="btn btn-primary" href="#" role="button">Shop Here</a>
                </div>
            </div>
            
            <!--            Intro Cards-->
            <section id="services" class="container">
                <div class="row text-center">
                    <div class="col-md-6 mb-6">
                        <div class="card h-75">
                            <img class="card-img-top RESIZER" src="images/Almond%20Buttercream%20Macaron.jpg" alt="Tarts">
                            <div class="card-body">
                                <h4 class="card-title">Tangy Tarts</h4>
                                <p class="card-text">
                                    A tart is small pie filled with fruit or custard, with no top crust,
                                    like the cherry tarts you bought at the bakery.
                                </p>
                            </div>
                            <div class="card-footer py-4">
                                <a href="Tarts.php" class="btn btn-secondary">Tarts</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-6">
                        <div class="card h-75">
                            <img class="card-img-top RESIZER" src="images/Chocolate%20Cake.jpg" alt="Cakes">
                            <div class="card-body">
                                <h4 class="card-title">Classic Cakes</h4>
                                <p class="card-text">
                                    A cake is a baked dessert that's often topped with frosting or decorations.
                                    For many people, it's not a proper birthday without a birthday cake.
                                </p>
                            </div>
                            <div class="card-footer py-4">
                                <a href="Cakes.php" class="btn btn-secondary">Cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include "phpFiles/footer.inc.php"; ?> 
    </body>
</html>