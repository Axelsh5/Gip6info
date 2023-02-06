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
            height: 1000px;
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
            width: 50%;
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

        #menu {
            
            float: right !important;
            margin-right: 400px;
            width: 300px;
            height: 300px;
            margin-top: 400px;
            background-color: white;
            color: black;
        }

        
    </style>
</head>

<body>
    <div class="header">
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="producten.php">Producten</a>
            <a href="overons.html">Over ons</a>
            <a class="right" href="login.html">Login</a>
            <a class="right" href="login.php">Winkelmand</a>
        </div>
    
        <div class="welcome">
            <h1>Welkom</h1>
            <div>
                <button type="button">Producten</button>
            </div>
            </div>
            <div id="menu">Suppp</div>
            </div>
    





</body>

</html>