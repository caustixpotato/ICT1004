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
        ;?> 
        <header id="Content">
            <div class="jumbotron jumbotron-fluid text-center bg-cover" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.15),rgba(255,255,255,0.7)), url(images/sliced.png)">
                <h1 class="display-4">Tarts N' Cakes</h1>
                <hr class="lead">
                <p>Best Thing Since Sliced Bread!</p>
            </div>
        </header>
        <main class="container">
            
            
            <section id="About">
        <aside id="cakeimg">
        
           <div id="container">
             
              <img src="images/Chocolate%20Cake.jpg" alt="" class="pic">
              <img src="images/Oreacheese%20Cake.jpg" alt="" class="pic">
              <img src="images/Strawberry%20shortCake.png" alt="" class="pic">
              <img src="images/Almond%20Buttercream%20Macaron.jpg" alt="" class="pic">
              <img src="images/Lemon%20Meringue%20Tart.png" alt="" class="pic">
              <img src="images/cake_genmaichiffon_1.jpg" alt="" class="pic">
            </div>
        
        
        </aside>
                
        <article id="about_info">
             <h2>About us</h2>
                <p>
                   Establised since 2000, Tarts N's Cakes Pte Ltd has grown its operations over the years throughout Singapore.
                   We started our first outlet at Telok Ayer road, over the 21 years we have launched our own main factory to produce
                   our own bakery product.
                   <br>
                   Under our operation of Tarts N's Cakes Pte Ltd, we have launched our first outlets store in Los Angeles, Taiwan, Malaysia 
                   and Korea on 2018. We have establishes numerous collaboration with others brands and have gain quite a reputation in the bakery industries.
                   <br>
                   We offer a huge range of delicacies, from cakes, tarts to bread. All faithfuly recreated daily from the oven. We uses Tarts N's Cakes’s recipes 
                   and baked on site using only the freshest and high quality ingredients for all our outlets over the world. We managed our quality at all stages 
                   such as high quality of bread flour from Japan. We believe that good quality of product represent our reputation and service we provide to our customer's.
                   <br>
                   As one of the leading companies in the bakery industry, we have make continuous effort to keep growing and expand out reputation by introducing unique product and
                   enhance our recipe to meet requirement in the food industry. 
                   <br>
                   <br>
                   <b>[私たちについて]</b>
                   <br>
                   <br>
                   2000年に設立されたTartsN's Cakes Pte Ltdは、シンガポール全土で長年にわたって事業を拡大してきました。
                   テロックエアロードに最初のアウトレットを開始し、21年以上にわたって独自の主要工場を立ち上げて生産しました
                   私たち自身のベーカリー製品。
                   <br>
                   Tarts N's Cakes Pte Ltdの運営の下、ロサンゼルス、台湾、マレーシアに最初のアウトレットストアを立ち上げました。
                   2018年には韓国と韓国。他のブランドとのコラボレーションを数多く確立し、ベーカリー業界で高い評価を得ています。
                   <br>
                   ケーキ、タルト、パンなど、幅広い料理をご用意しております。すべて忠実にオーブンから毎日再現されています。 Tarts N'sCakesのレシピを使用しています
                   世界中のすべての店舗で最も新鮮で高品質の食材のみを使用して、現場で焼き上げました。すべての段階で品質を管理しました
                   日本産の高品質なパン粉など。私たちは、高品質の製品が私たちの評判とお客様に提供するサービスを表すと信じています。
                   <br>
                   ベーカリー業界をリードする企業のひとつとして、独自の商品を投入し、
                   食品業界の要件を満たすためにレシピを強化します。
                </p>
    
                <h3><a href="Login.php" title="promo">Login to view our promotion now!</a></h3>
            
           
        </article>
    </section>
            
            
       
        <?php    include "phpFiles/footer.inc.php";?> 
             </main>
    </body>
</html>