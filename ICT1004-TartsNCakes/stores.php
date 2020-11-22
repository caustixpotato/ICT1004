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
                        <!--STORES-->
                        <div class="col">
                            <h2>Our Stores</h2>
                            <p>
                                WE got many stores ok
                            </p>
                        </div>
                        <!--LOCATION CARDS-->
                        <div class="col">
                            <!--1st Location>-->
                            <button class="btn btn-primary mt-1" type="button" data-toggle="collapse" data-target="#Location1" aria-expanded="false" aria-controls="collapseExample">
                                Singapore
                            </button>
                            </p>
                            <div class="collapse" id="Location1">
                                <div class="card h-75">
                                    <img class="card-img-top LOCATIONRESIZER" src="images/localbake.jpg" alt="Cakes">
                                    <div class="card-body">
                                        <h4 class="card-title">Beigang Road Bakery</h4>
                                        <p class="card-text">
                                            112 Telok Ayer St, Singapore 068581
                                        </p>
                                    </div>
                                    <div class="card-footer py-4">
                                        <a href="#" class="btn btn-secondary">PHONE NUMBER</a>
                                    </div>
                                </div>
                            </div>

                            <!--2nd Location-->
                            <button class="btn btn-primary mt-1" type="button" data-toggle="collapse" data-target="#Location2" aria-expanded="false" aria-controls="collapseExample">
                                Malaysia
                            </button>
                            </p>
                            <div class="collapse" id="Location2">
                                <div class="card h-75">
                                    <img class="card-img-top LOCATIONRESIZER" src="images/Chocolate Cake.jpg" alt="Cakes">
                                    <div class="card-body">
                                        <h4 class="card-title">Beigang Road Bakery</h4>
                                        <p class="card-text">
                                            Jalan Serangkai 2, Taman Bukit Dahlia, 81700 Pasir Gudang, Johor, Malaysia
                                        </p>
                                    </div>
                                    <div class="card-footer py-4">
                                        <a href="#" class="btn btn-secondary">PHONE NUMBER</a>
                                    </div>
                                </div>
                            </div>

                            <!--3rd Location-->
                            <button class="btn btn-primary mt-1" type="button" data-toggle="collapse" data-target="#Location3" aria-expanded="false" aria-controls="collapseExample">
                                Taiwan
                            </button>
                            </p>
                            <div class="collapse" id="Location3">
                                <div class="card h-75">
                                    <img class="card-img-top LOCATIONRESIZER" src="images/taiwanBake.PNG" alt="Cakes">
                                    <div class="card-body">
                                        <h4 class="card-title">Beigang Road Bakery</h4>
                                        <p class="card-text">
                                            No. 102號, Section 2, Beigang Road, Taibao City, Chiayi County, Taiwan 612
                                        </p>
                                    </div>
                                    <div class="card-footer py-4">
                                        <a href="tel:123-456-789" class="btn btn-secondary">PHONE NUMBER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </article>
        </section>
    </main>
    <?php include "phpFiles/footer.inc.php"; ?> 
</body>
</html>