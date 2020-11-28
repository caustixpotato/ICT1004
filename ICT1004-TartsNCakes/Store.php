<html lang="en">
    <head>
        <title>Tarts N's Cake</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
        <link rel="stylesheet"  href="css/items.css">

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
        <script defer src="js/item.js"></script>
    </head>
    <body>
        <?php
        include "phpFiles/nav.inc.php"
        ;
        ?>
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
                        <div id = "carousel" class = "carousel slide" data-ride = "carousel">
                            <div class = "carousel-inner">
                                <ul class="carousel-indicators"></ul>
                                <?php 
                                $i = 0;
                                while ($rowt = mysqli_fetch_array($resulttart)) { 
                                    $actives = '';
                                    if ($i == 0){
                                        $actives = 'active';
                                    }
                                    ?>
                                
                                    <div class = "carousel-item-active">
                                        <?php
                                        echo '<img class="img-thumbnail" src="data:image/jpeg;base64,' . base64_encode($rowt['Img']) . '  "/>';
                                        ?>
                                    </div>
                                <?php } ?>
                                <!-- Controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Cakes" class = "container">
                <h2>Cakes</h2>
                <div class = "row text-center">
                    <div class="col-sm">
                        <div id = "carousel" class = "carousel slide" data-ride = "carousel">
                            <div class = "carousel-inner">
                                <ul class="carousel-indicators"></ul>
                                <?php while ($rowc = mysqli_fetch_array($resultcake)) { ?>
                                    <div class = "carousel-item-active">
                                        <?php echo '<img class="img-thumbnail" src="data:image/jpeg;base64,' . base64_encode($rowc['Img']) . '  "/>' ?>
                                    </div>
                                <?php } ?>
                                <!-- Controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                            </div>
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

