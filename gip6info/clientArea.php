<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['user'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elfbar.lol | Client Area</title>
     <style>
        body{
            background-image: url('img/backgr.jpg');
        }
        #intro{
            width: 400px;
            border: 4px solid #ccc;
            padding: 30px;
            border-radius: 15px;
            margin: auto;
            margin-top: 250px;
            height: 200px;
            text-align: center;
        }
        #btnMainMenu {
            margin: auto;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-top: 30px;
            margin-right: 10px;
            border: none;
            font-size: 20px;
        }
        #btnMainMenu:hover{
            opacity: .7;
        }
        #divShop{
            display: none;
            text-align: center;
            margin: auto;
            margin-top: 125px;
            height: 640px;
            width: 600px;
            border: 2px solid black;
        }
        #productPicture{
            height: 300px;
            width: 300px;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 15px;
        }
        #TopRight{
            margin: auto;
            border: 5px solid black;
            width: 300px;
            height: 75px;
            text-align: center;
            opacity: 0.0;
        }
        .toprightelements{
            margin: 10px;
            margin-top: 20px;
            font-Size: 15px;
            background: #555;
            color: #fff;
	        border-radius: 5px;
            padding: 10px 15px;
            border: 2px solid black;
        }
        #userTopRight{
            
        }
        #TOPlogOut{
            color: white;
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
        #btnAdd2Cart{
            margin: auto;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-top: 30px;
            margin-right: 10px;
            border: none;
            font-size: 14px;
        }
        #slctProduct{
            border: none;
            border-radius: 5px;
            border: none;
        }
    </style>
</head>
<body>
    <div id="TopRight">
       <button class="toprightelements" id="userTopRight"><?php echo $_SESSION['user']; ?></button>
       <button class="toprightelements" id="storeTopRight">Store</button>
       <button class="toprightelements"><a id="TOPlogOut" href="logout.php">Logout</a></button>
    </div>
    <div id="intro">
       <h1>Hi <?php echo $_SESSION['user']; ?> !</h1>
       <button id="btnMainMenu">Main Menu</button><br><br><br>
       <a href="logout.php">Logout</a>
    </div>
    <div id="divAccount">
       <img src="img/male-icon.png" id="iconpfp">
       <p>Username: <?php echo $_SESSION['user']; ?></p>
       <p>First Name: <?php echo $_SESSION['firstName']; ?></p>
       <p>Last Name: <?php echo $_SESSION['lastName']; ?></p>
       <p>Email: <?php echo $_SESSION['email']; ?></p>
       <p>Phone: <?php echo $_SESSION['phone']; ?></p>
    </div>
    <form id="divShop" action="cart.php" method="post">
       <select id="slctProduct" style="margin: auto; margin-top: 15px;">
           <option>Waar ben je naar op zoek?</option>
       </select>
           <select id="slctFlavour" style="margin: auto;">
           </select>
           <select id="slctNicLevel" style="margin: auto; margin-top: 15px;">
               <option value="20mg">20 mg</option>
           </select>
       <img id="productPicture" src="img/Cola.jpg"><br>
       <input id="cbTos" style="opacity: 0.0;" type="checkbox"><label id="lblcbTos" style="opacity: 0.0;" for="cbTos">I accept the <a href="">terms and conditions</a>.</label><br><br>
       <button id="btnAdd2Cart" type="submit" style="opacity: 0.0;">Add to cart</button><br><br>
       <a style="float: right; padding-right: 10px; opacity: 0.0;" id="backtobegin" href="">Back to begin</a>
    </form>
</body>
<script>
    let introduction = document.querySelector("#intro");
    let btnUserTRight = document.querySelector("#userTopRight");
    let btnStoreTRight = document.querySelector("#storeTopRight");
    let btnAddToCart = document.querySelector("#btnAdd2Cart");
    let shopdiv = document.querySelector("#divShop");
    let accdiv = document.querySelector("#divAccount");
    let btnMainMenu = document.querySelector("#btnMainMenu");
    btnMainMenu.addEventListener("click", function enterMainMenu(){
        document.querySelector("#TopRight").style.opacity = "1.0";
        introduction.style.display = "none";
        accdiv.style.display = "none";
        shopdiv.style.display = "block";
    });
    btnUserTRight.addEventListener("click", function enterAccount(){
        introduction.style.display = "none";
        shopdiv.style.display = "none";
        accdiv.style.display = "block";
    });
    btnStoreTRight.addEventListener("click", function enterStore(){
        introduction.style.display = "none";
        accdiv.style.display = "none";
        shopdiv.style.display = "block";
    });

    let products = ["Elfbars"];
    let flavoursElfbar = ["Cola", "Blueberry", "Banana Ice", "Strawberry Banana", "Pink Lemonade", "Strawberry Ice", "Strawberry Ice Cream", "Cotton Candy Ice"];
    let flavoursAromaKing = [];
    let SelectProduct = document.querySelector("#slctProduct");
    let SelectFlavour = document.querySelector("#slctFlavour");
    let SelectNicotine = document.querySelector("#slctNicLevel");
    let ProductPicture = document.querySelector("#productPicture");
    
    productPicture.style.display = "none";
    SelectFlavour.style.display = "none";
    SelectNicotine.style.display = "none";
    SelectFlavour.style.marginTop = "20px";
    for (let y = 0; y < products.length; y++){
        let optie = document.createElement("option");
        optie.innerHTML = products[y];
        SelectProduct.appendChild(optie);
    }
    SelectProduct.addEventListener("change", updateProduct);
    function updateProduct(){
        document.querySelector("#cbTos").style.opacity = "1.0";
        document.querySelector("#backtobegin").style.opacity = "1.0";
        document.querySelector("#lblcbTos").style.opacity = "1.0";
        document.querySelector("#btnAdd2Cart").style.opacity = "1.0";
        productPicture.style.display = "block";
        SelectNicotine.style.display = "block";
        SelectFlavour.style.display = "block";
        let gekozenProduct = SelectProduct.value;
        if (gekozenProduct == products[0]) {
            SelectFlavour.innerHTML = "";
            for (let q = 0; q < flavoursElfbar.length; q++){
                let smaken = document.createElement("option");
                smaken.innerHTML = flavoursElfbar[q];
                SelectFlavour.appendChild(smaken);
            }
        }
    }
    SelectFlavour.addEventListener("change", updateFlavour);
    function updateFlavour(){
        let gekozenFlavour = SelectFlavour.value;
        if (gekozenFlavour == flavoursElfbar[0]) {ProductPicture.src = "img/Cola.jpg";}
        if (gekozenFlavour == flavoursElfbar[1]) {ProductPicture.src = "img/Blueberry.jpg";}
        if (gekozenFlavour == flavoursElfbar[2]) {ProductPicture.src = "img/BananaIce.jpg";}
        if (gekozenFlavour == flavoursElfbar[3]) {ProductPicture.src = "img/StrawberryBanana.jpg";}
        if (gekozenFlavour == flavoursElfbar[4]) {ProductPicture.src = "img/PinkLemonade.jpg";}
        if (gekozenFlavour == flavoursElfbar[5]) {ProductPicture.src = "img/StrawberryIce.jpg";}
        if (gekozenFlavour == flavoursElfbar[6]) {ProductPicture.src = "img/StrawberryIceCream.jpg";}
        if (gekozenFlavour == flavoursElfbar[7]) {ProductPicture.src = "img/CottonCandyIce.jpg";}
    }


    let colorPicker = 0;
    let colors = ["lightblue", "cyan", "blue", "darkblue", "lightred", "orange", "red", "lightgreen", "lime", "green"];
    let userTopRight = document.querySelector("#userTopRight");
    let hInterval = setInterval(switchColor1, 125)
    function switchColor1(){
        colorPicker++;
        userTopRight.style.color = colors[colorPicker];
        if (colorPicker == 10) {
            colorPicker = 0;
            userTopRight.style.color = colors[colorPicker];
        }
    }

</script>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>