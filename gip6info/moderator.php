<?php
session_start();

if (isset($_SESSION['Naam']) && isset($_SESSION['Voornaam'])) {
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIP 4</title>
    <style>
        body {
            margin: 0px;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background-image: url(img/27120_Oudenaarde_Oudenaarde_Koninklijk_Antheneum_Fortstraat_01.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 937px;
        }

        .navbar {
            background-color: #18222b;
            overflow: hidden;
        }

        .navbar a {
            color: white;
            display: block;
            padding: 14px 16px;
            font-size: 18px;
            float: left;
            text-decoration: none;
            text-align: center;
        }
        .navbar a:hover {
            background-color: #34495e;
        }

        .right {
            float: right !important;
        }

        .welcome {
            width: 100%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            color: #fff;
        }

        .welcome h1 {
            font-size: 60px;
        }

        .welcome p {
            font-weight: 100;
            line-height: 25px;
        }

        button {
            width: 200px;
            padding: 15px 0;
            border-radius: 15px;
            text-align: center;
            margin: 20px 10px;
            font-weight: bold;
            border: black;
            color: black;
            cursor: pointer;
            box-shadow: inset 0 0 0 0 #0bacc2;
            transition: ease-out 0.3s;
            font-size: 16px;
            font-weight: bold;
            outline: none;
        }

        button:hover {
            box-shadow: inset 200px 0 0 0 #0bacc2;
            color: white;
        }

        .alinea1 {
            margin-left: 150px;
            margin-right: 150px;
            margin-top: 5%;
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .alinea1 h1 {
            width: 100%;
            font-size: 32px;
            font-weight: bold;
        }

        .alinea1 p {
            color: #6c6d6d;
            width: 100%;
        }

        .row {
            background-color: #c1d0d181;
            padding: 10px;
        }
        #divAccount{
            display: none;
            text-align: center;
            margin: auto;
            margin-top: 150px;
            height: 370px;
            width: 300px;
            border: 2px solid black;
            font-family: Copperplate, Fantasy;
        }
        #iconpfp{
            margin-top: 20px;
            height: 150px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="navbar">
        <a href="">Home</a>
        <a href="producten.php">Producten</a>
        <a href="about.html">Over ons</a>
        <?php if ($_SESSION['Rolid'] == 2) : ?>
        <a class="right" href="moderator.php">Moderator</a>
        <?php endif; ?>
        <a class="right" href="logout.php">Logout</a>
        <a id="voornaam" class="right"><?php echo $_SESSION['Voornaam'];?></a>
        <a class="right" href="cart.php">Winkelmand</a>

        </div>

        <div class="welcome">
            <h1>Moderator Pagina</h1>
            <div id="welc">
                <button type="button">Producten</button>
            </div>
            <div id="divAccount">
            <img src="img/male-icon.png" id="iconpfp">
            <p>Voornaam: <?php echo $_SESSION['Voornaam']; ?></p>
            <p>Naam: <?php echo $_SESSION['Naam']; ?></p>
            <p>Klas: <?php echo $_SESSION['Klas']; ?></p>
            <p>Rol: <?php echo $_SESSION['Rolid']; ?></p>
            </div>
            <br><button id="terug" style="display: none; margin: auto;">Terug</button>
        </div>
    </div>
    


    <!--<div class="alinea1">
        <div class="row">
            <h1>Home</h1>
            <p>FACTS started in 1993 as a small gathering of</p>
        </div>
        <div class="row">
            <h1>About</h1>
            <p>FACTS started in 1993 as a small gathering of</p>
        </div>
        <div class="row">
            <h1>Support</h1>
            <p>FACTS started in 1993 as a small gathering of </p>
        </div>
    </div>-->

        <script>
            let voornaambtn = document.querySelector("#voornaam");
            voornaambtn.addEventListener("click", showAccDetails);
            function showAccDetails(){
                document.querySelector("#divAccount").style.display = "block";
                document.querySelector("#welc").style.display = "none";
                document.querySelector("#terug").style.display = "block";
            }
            document.querySelector("#terug").addEventListener("click", function keerTerug(){
                document.querySelector("#divAccount").style.display = "none";
                document.querySelector("#welc").style.display = "block";
                document.querySelector("#terug").style.display = "none";
            });
        </script>


</body>
<?php }?>