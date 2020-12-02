<html lang="en">
    <head>
        <title>Tarts N's Cake</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css" />
        <link rel ="stylesheet" href="css/items.css"/>



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
        <div class="jumbotron jumbotron-fluid text-center bg-light">
            <div class="container">
                <h1>Tarts N' Cakes</h1>
                <p>Best thing since Sliced Bread</p>
                <?php
                if (!isset($_SESSION['whoami'])) {
                    echo '
                            <a class="btn btn-primary" href="register.php" role="button">Shop Here</a>
                            ';
                } else {
                    echo ' <a class="btn btn-primary" href="#" role="button">Shop Here</a>';
                }
                ?>
            </div>
        </div>
        <?php
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
                                    <div class = "carousel-item <?= $actives; ?>">
                                        <img id ="<?=$rowt['ItemID']?>" class="img-thumbnail" src="data:image/jpeg;base64,<?= '' . base64_encode($rowt['Img']) . '' ?>" alt = "<?=$rowt['Name']?>"/>
                                        <div id ="idDesc<?=$rowt['ItemID']?>" id="desc" style = "display:none"><?=$rowt['Description']?></div>
                                        <div id ="idPrice<?=$rowt['ItemID']?>" id="price" style = "display:none"><?=$rowt['Pricing']?></div>
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

            <section id="Cakes" class = "container">
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
                                        <img id ="<?=$rowc['ItemID']?>" class="img-thumbnail" src="data:image/jpeg;base64,<?= '' . base64_encode($rowc['Img']) . '' ?> " alt = "<?=$rowc['Name']?>" />
                                        <div id ="idDesc<?=$rowc['ItemID']?>" id="desc" style = "display:none"><?=$rowc['Description']?></div>
                                        <div id ="idPrice<?=$rowc['ItemID']?>" id="price" style = "display:none"><?=$rowc['Pricing']?></div>
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
            <div id="myModal" class="modal">

                <!-- The Close Button -->
<!--                <span class="close">X</span>-->
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">
                <!-- Modal Caption (Name Text) -->
                <div id="name-content"></div>
                <!-- Modal Caption (Desc Text) -->
                <div id="desc-content"></div>
                 <!-- Modal Caption (Price Text) -->
                <div id="price-content"></div>
                <form action="POST" id ="form1">
                    <input type="hidden" id="itemID" name="itemID" value="">
                    <button type="submit" id="checkoutBtn" form="form1" class="button center">Add to Cart</button>
                </form>
<!--                <button type="submit" id="checkoutBtn" form="form1" class="button center">Add to Cart</button> -->
            </div>
        </main>
        <?php $conn->close(); ?>

        <?php
        include "phpFiles/footer.inc.php"; //add/include the content from footer.inc.php
        ?>
    </body>
</html>


