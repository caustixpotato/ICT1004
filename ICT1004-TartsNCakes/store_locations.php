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
        <link rel="stylesheet" href="css/aboutus.css" />

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
        <script defer src="js/ourstores.js"></script>
    </head>

    <body>
        <?php
        include "phpFiles/nav.inc.php"
        ;
        ?> 
        <header id="Content">
            <div class="jumbotron jumbotron-fluid text-center bg-cover" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.15),rgba(255,255,255,0.7)), url(images/sliced.png)">
                <h1 class="display-4">Tarts N' Cakes</h1>
                <hr class="lead">
                <p>Best Thing Since Sliced Bread!</p>
            </div>
        </header>
        <main>
            <article id="stores_info">
                <div class="container">
                    <div class="row">
                        <h2>Our Stores</h2>
                    </div>
                    <div class="row">
                        <!--LOCATION CARD-->
                        <div class="card" style="width: 18rem;">
                            <img id ="card-img"class="card-img-top" src="http://images.nymag.com/images/2/daily/2010/09/20100917_fpbakery_190x190.jpg" alt="Default Bakery Img">
                            <div class="card-body">
                                <h5 id = "card-title" class="card-title">Bakery</h5>
                                <p id = "card-body" class="card-text">Click the countries for more Info!</p>
                                <p>Opening Hours:</p>
                                <p id = "card-operating" class="cardtext"> </p>
                                <a id = "phone-link" href="#">Call Us!</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn-group" role="group" aria-label="Button_Countries">
                            <button id="myBtn1" class="btn btn-secondary">Singapore</button>
                            <button id="myBtn2"class="btn btn-secondary">Malaysia</button>
                            <button id="myBtn3" class="btn btn-secondary">Taiwan</button>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <?php include "phpFiles/footer.inc.php"; ?> 
</body>
</html>