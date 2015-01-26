<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NoVolume Shop | Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">NoVolume Shop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#about">Über Uns</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                    <li>
                        <a href="/shop.php">Shop</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div>
        <div>
            <br>
            Insert User<br>
            <form action="shop.php" method="GET">
                <input type="text" placeholder="idUser" name="idUser"></input> <br>
                <input type="text" placeholder="VornameUser" name="vornameUser"></input> <br>
                <input type="text" placeholder="NachnameUser" name="nachnameUser"></input> <br>

                <input type="submit" name="submit" value="click"></input>
                <br>
                <br>
            </form>
        </div>

        <div>
            Insert Item<br>
            <form action="shop.php" method="GET">
            <input type="text" placeholder="idItem" name="idItem"></input>
            <input type="text" placeholder="nameItem" name="nameItem"></input>
            <input type="text" placeholder="preisItem" name="preisItem"></input>

            <input type="submit" name="submitinsertUser" value="insertItem">
            </form>
            <br>
            <br>
        </div>

        <?php
        // Database Connect
        $verbindung = mysql_connect("localhost", "root" , "")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

        mysql_select_db("offshop") or die ("Datenbank konnte nicht ausgewählt werden");

        if(isset($_GET['idUser']))
        {
            $id = $_GET["idUser"];
            $vorname = $_GET["vornameUser"];
            $nachname = $_GET["nachnameUser"]; 
           insertUser($id, $vorname, $nachname);
        }
        else if(isset($_GET["idItem"]))
        {
            $id = $_GET["idItem"];
            $name = $_GET["nameItem"];
            $preis = $_GET["preisItem"];

            insertItem($id,$name,$preis);

        }

        function getData ()
        {
            $getItems = "SELECT *  FROM items";
            $getItemsResult = mysql_query($getItems);

            while ($row = mysql_fetch_array($getItemsResult, MYSQL_ASSOC)) 
            {
                printf("<b>ID: %s </b> <br>  Name: %s <br> Preis: %s <br>", $row["id"], $row["Name"], $row["Preis"]);
                echo "<br>";
            }
            echo "<br>";

           $getUser = "SELECT *  FROM user";
           $getUserResult = mysql_query($getUser);

           while ($row = mysql_fetch_array($getUserResult, MYSQL_ASSOC)) 
            {
                printf("<b>ID: %s </b> <br>  Vorname: %s <br> Nachnamen: %s <br> Guthaben: %s € <br>", $row["id"], $row["Vorname"], $row["Nachname"], $row["Guthaben"]);
                echo "<br>";
            }
        }
        
        function insertUser($id, $vorname, $nachname) {
            $insertUser = "INSERT INTO user (id,vorname,nachname) VALUES ($id, $vorname, $nachname)";
            $insertUserSuccess = mysql_query($insertUser);
        }

        function insertItem($id, $name, $preis)  {
            $insertItem = "INSERT INTO items (id,name,preis) VALUES ($id,$name,$preis)";
            $insertItemSuccess = mysql_query($insertItem);
        }
        getData();
        
        ?>      
    
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
