<?php
    session_start(); 
    include "db_conn.php";
    
    if (isset($_POST['Naam']) && isset($_POST['Voornaam']) && isset($_POST['Wachtwoord'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
     
         $Naam = validate($_POST['Naam']);
         $Voornaam = validate($_POST['Voornaam']);
         $Wachtwoord = validate($_POST['Wachtwoord']);

         if (empty($Naam)) {
            echo "You forgot to fill in your name.";
            header("Location: index.php");
         }else if(empty($Voornaam)){
            echo "You forgot to fill in your first name.";
            header("Location: index.php");
         }else if(empty($Wachtwoord)){
            echo "You forgot to fill in your password.";
            header("Location: index.php");
         }
         else{
            $sql = "SELECT * FROM Gebruiker WHERE Naam='$Naam' AND Voornaam='$Voornaam' AND Wachtwoord='$Wachtwoord'";
            $result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Naam'] === $Naam && $row['Voornaam'] === $Voornaam && $row['Wachtwoord'] === $Wachtwoord) {
            	$_SESSION['Naam'] = $row['Naam'];
            	$_SESSION['Voornaam'] = $row['Voornaam'];
            	$_SESSION['Id'] = $row['Id'];
            	$_SESSION['Klas'] = $row['Klas'];
            	$_SESSION['Rolid'] = $row['Rolid'];
            	header("Location: loggedin.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorrect email or password");
		        exit();
			}
	    	}else{
		    	header("Location: index.php?error=Incorrect email or password");
	          exit();
		    }
	    }
	
        }else{
        header("Location: index.php");
        exit();
    }

?>