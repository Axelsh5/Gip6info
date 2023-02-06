<?php  


if (isset($_POST['Naam']) && isset($_POST['Voornaam']) && isset($_POST['Wachtwoord']) && isset($_POST['Klas'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$Naam = validate($_POST['Naam']);
	$Voornaam = validate($_POST['Voornaam']);
	$Wachtwoord = validate($_POST['Wachtwoord']);
	$Klas = validate($_POST['Klas']);

	if (empty($Naam) || empty($Voornaam) || empty($Wachtwoord) || empty($Klas)) {
		echo "you forgot something";
		header("Location: index.php");
	}else {

		$sql = "INSERT INTO Gebruiker(Naam, Voornaam, Wachtwoord, Klas, Rolid) VALUES('$Naam', '$Voornaam', '$Wachtwoord', '$Klas', '1')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Registered successfully!";
		}else {
			echo "Something went wrong!";
		}
	}

}else {
	header("Location: index.html");
}
?>