<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'phpFiles/headcontents.inc.php';
        ?>
        <link rel ="stylesheet" href="css/items.css"/>
        <script defer src="js/item.js"></script>   
    </head>
    <body>
        <?php
        include "phpFiles/nav.inc.php";
        ?>
        <?php
            include "phpFiles/banner.php";
            ?>
        <!-- Start Connection -->
        <?php
        session_start();
        if (empty($_SESSION['userid'])) {?>
            <script> alert("Please login or register before accessing the store page");
            window.location.href='index.php';</script>
            <?php
            exit();
        } else {
            $u_id = $_SESSION['userid'];   //show login user id
        }
        $errorMsg = "";
        $success = true;
        $config = parse_ini_file('../../private/db1-config.ini');
        $conn = new mysqli($config['servername'], $config['username'],
                $config['password'], $config['dbname']);
        if ($conn->connect_error) {
            $errorMsg = "Error with connection to database";
            $success = false;
        } else {
            //Query for rows that are Tarts
            $stmtTart = $conn->prepare("SELECT * FROM Items WHERE Category ='Tart'");
            $stmtTart->execute();
            //$sqltart = "SELECT * FROM Items WHERE Category ='Tart'";
            //Execute Query and save the results on a variable
            $resulttart = $stmtTart->get_result();
            //Query for rows that are Cakes
            //$sqlcake = "SELECT * FROM Items WHERE Category ='Cake'";
            $stmtCake = $conn->prepare("SELECT * FROM Items WHERE Category ='Cake'");
            $stmtCake->execute();
            //Execute Query and save the results on a variable
            $resultcake = $stmtCake->get_result();
        }
        ?>
        <?php
        if ($success) {
            if ($resulttart->num_rows > 0) {
                ?>
                <main>
                    <!-- Create Section called Tarts -->
                    <section id="Tarts" class = "container">
                        <h2>Tarts</h2>
                        <!-- Create div with rows with the text centered -->
                        <div class = "row text-center">
                            <!-- Create grid with width 540px -->
                            <div class="col-sm">
                                <!-- Create carousel with slides and tells Bootstrap to begin animating the carousel immediately when the page loads. -->
                                <div id = "carouselt" class = "carousel slide" data-ride = "carousel">
                                    <!-- Unordered list for carousel indicators-->
                                    <ul class="carousel-indicators">
                                        <?php
                                        //create int variable to act as a count for each iteration of loop
                                        $j = 0;
                                        //execute when there are rows after executing the query
                                        foreach ($resulttart as $rowt) {
                                            //create a variable to store the active item value for carousel
                                            $actives = '';
                                            if ($j == 0) {
                                                $actives = 'active';
                                            }
                                            ?>
                                            <!-- Create slide list item for carousel indicators for every row -->
                                            <li data-target="#carouselt" data-slide-to="<?= $i; ?>" class ="<?= $actives; ?>"></li>
                                            <?php
                                            $j++;
                                        }
                                        ?>
                                    </ul>
                                    <!-- Create div to contain all the carousel slides -->
                                    <div class = "carousel-inner">
                                        <?php
                                        $j = 0;
                                        foreach ($resulttart as $rowt) {
                                            $actives = '';
                                            if ($j == 0) {
                                                $actives = 'active';
                                            }
                                            ?>
                                            <div class = "carousel-item <?= $actives; ?>">
                                                <img id ="<?= $rowt['ItemID'] ?>" class="img-thumbnail" src="data:image/jpeg;base64,<?= '' . base64_encode($rowt['Img']) . '' ?>" alt = "<?= $rowt['Name'] ?>"/>
                                                <div id ="idDesc<?= $rowt['ItemID'] ?>" id="desc" style = "display:none"><?= $rowt['Description'] ?></div>
                                                <div id ="idPrice<?= $rowt['ItemID'] ?>" id="price" style = "display:none"><?= $rowt['Pricing'] ?></div>
                                            </div>
                                            <?php
                                            $j++;
                                        }
                                        ?>
                                    </div>
                                    <!-- Create a tag to contain all the carousel controls -->
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
                    <?php
                } else {
                    $success = false;
                    $errorMsg = "No Tart data found in database";
                    echo "<p style='position: realtive; padding: 1em 0;margin: 0;text-align:center;'>" . $errorMsg . "</p>";
                }

                if ($resultcake->num_rows > 0) {
                    ?>
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
                                                <img id ="<?= $rowc['ItemID'] ?>" class="img-thumbnail" src="data:image/jpeg;base64,<?= '' . base64_encode($rowc['Img']) . '' ?> " alt = "<?= $rowc['Name'] ?>" />
                                                <div id ="idDesc<?= $rowc['ItemID'] ?>" id="desc" style = "display:none"><?= $rowc['Description'] ?></div>
                                                <div id ="idPrice<?= $rowc['ItemID'] ?>" id="price" style = "display:none"><?= $rowc['Pricing'] ?></div>
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
                    <?php
                } else {
                    $success = false;
                    $errorMsg = "No Cake data found in database";
                    echo "<p style='position: realtive; padding: 1em 0;margin: 0;text-align:center;'>" . $errorMsg . "</p>";
                }
                ?>
                <div id = "myModal" class = "modal">

                    <!--The Close Button-->
                    <!--<span class = "close">X</span>-->
                    <!--Modal Content (The Image) -->
                    <img class = "modal-content" id = "img01" alt ="">
                    <!--Modal Caption (Name Text) -->
                    <div id = "name-content"></div>
                    <!--Modal Caption (Desc Text) -->
                    <div id = "desc-content"></div>
                    <!--Modal Caption (Price Text) -->
                    <div id = "price-content"></div>
                    <form method = "POST" id = "form1" action = "insert_cart.php">
                        <input type = "hidden" id = "itemID" name = "itemID" value = "">
                        <button type = "submit" id = "checkoutBtn" form = "form1" class = "button center">Add to Cart</button>
                    </form>
                    <!--<button type = "submit" id = "checkoutBtn" form = "form1" class = "button center">Add to Cart</button>-->
                </div>
            </main>
            <?php
            $conn->close();
        } else {
            echo "<p style='position: realtive; padding: 1em 0;margin: 0;text-align:center;'>" . $errorMsg . "</p>";
        }
        ?>

        <?php
        include "phpFiles/footer.inc.php"; //add/include the content from footer.inc.php
        ?>
    </body>
</html>


