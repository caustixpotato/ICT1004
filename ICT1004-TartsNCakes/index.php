<!DOCTYPE html>
<html>
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
    </head>

    <body>
        <?php 
        include "phpFiles/nav.inc.php"
        ;?> 
        <header id="Content">
            <div class="jumbotron jumbotron-fluid text-center">
                <h1 class="display-4">Tarts N' Cakes</h1>
                <hr class="lead">
                <p>Fresh, Quality Baked Goods</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Baked!</a>
                <div class="Jumbotron-BG" style="background-image:url(image/calico_small.jpg)"></div> 
            </div>
        </header>
        <main class="container">
            <section id="dogs">
                <h2>Dog shaped like cake!</h2>
                <div class="row">
                    <article id="pooDog" class="col-sm">
                        <h3>Dogake</h3>
                        <figure>
                            <img class="img-thumbnail" src="images/poodle_small.jpg" alt="Poodle"
                                 title="View larger image..." />
                            <figcaption>Standard Poodle (Cake)</figcaption>
                        </figure>
                        <p>
                            Definitely Not A Dog
                            This cake is so realistic and showcases the master craftsmanship of 
                            our finest cake artisans!
                        </p>
                    </article>
                </div>
            </section>
        </main>
        <?php    include "phpFiles/footer.inc.php";?> 
    </body>
</html>