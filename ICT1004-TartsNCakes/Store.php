<html lang="en">
    <head>
        <title>Tarts N's Cake</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/item.css" />



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
        <script defer src="js/item.js"></script>
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
        <?php
        $success = true;
        $config = parse_ini_file('../../private/db1-config.ini');
        $conn = new mysqli($config['servername'], $config['username'],
                $config['password'], $config['dbname']);
        $sqltart = "SELECT * FROM Items WHERE Category ='Tart'";
        $resulttart = mysqli_query($conn, $sqltart);
        $sqlcake = "SELECT * FROM Items WHERE Category ='Cake'";
        $resultcake = mysqli_query($conn, $sqlcake);
        ?>
        <main>
            <section id="Tarts" class = "container">
                <h2>Tarts</h2>
                <div class = "row text-center">
                    <div class="col-sm">
                        <div id = "carouselt" class = "carousel slide" data-ride = "carousel">
                            <ul class="carousel-indicators">
                                <?php
                                $i = 0;
                                foreach ($resulttart as $rowt) {
                                    $actives = '';
                                    if ($i == 0) {
                                        $actives = 'active';
                                    }
                                    ?>
                                    <li data-target="#carouselt" data-slide-to="<?= $i; ?>" class ="<?= $actives; ?>"></li>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                            <div class = "carousel-inner">
                                <?php
                                $i = 0;
                                foreach ($resulttart as $rowt) {
                                    $actives = '';
                                    if ($i == 0) {
                                        $actives = 'active';
                                    }
                                    ?>
                                    <!--                                    <div class = "carousel-item $actives; ">-->
                                    <div class = "carousel-item<?= $actives; ?>" style = "background-image: url(data:image/jpeg;base64,<?= base64_encode($rowt['Img']); ?>);
                                    height:100px; width:300px; background-size:cover;background-repeat: no-repeat;background-position: center;margin: auto;">
                                        <img src="data:image/jpeg;base64,<?= base64_encode($rowt['Img']); ?>" style="visibility: hidden;">
                                    </div>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselt" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselt" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Tarts" class = "container">
                <h2>Cakes</h2>
                <div class = "row text-center">
                    <div class="col-sm">
                        <div id = "carouselc" class = "carousel slide" data-ride = "carousel">
                            <ul class="carousel-indicators">
                                <?php
                                $i = 0;
                                foreach ($resultcake as $rowc) {
                                    $actives = '';
                                    if ($i == 0) {
                                        $actives = 'active';
                                    }
                                    ?>
                                    <li data-target="#carouselc" data-slide-to="<?= $i; ?>" class ="<?= $actives; ?>"></li>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                            <div class = "carousel-inner">
                                <?php
                                $i = 0;
                                foreach ($resultcake as $rowc) {
                                    $actives = '';
                                    if ($i == 0) {
                                        $actives = 'active';
                                    }
                                    ?>
                                    <div class = "carousel-item <?= $actives; ?>">
                                        <?php
                                        echo '<img class="img-thumbnail" src="data:image/jpeg;base64,' . base64_encode($rowc['Img']) . '  "/>';
                                        ?>
                                    </div>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselc" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselc" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <?php $conn->close(); ?>

        <?php
        include "footer.inc.php"; //add/include the content from footer.inc.php
        ?>
    </body>
</html>



/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

