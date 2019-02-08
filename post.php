<?php

// Connect to DB
try { 
    $db = new PDO('mysql:host=localhost;dbname=id7407604_chatwithme;charset=utf8', 'id7407604_aymane', 'aymanehrouch', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // le dernier paramétre est pour afficher les erreurs, hadok li kaykono fel query fhemtinii??  
} 
catch (Exeption $e){ 
    die('Erreur : ' .$e->getMessage()); 
} 

// Making sure the uset input something

if (strlen($_POST['user']) >= 2 and strlen($_POST['msg']) >= 1 ) {
	
// Insert values to DB 

$que = $db->prepare('INSERT INTO minichat(user, msg) VALUES(:user, :msg)');

$que->execute(array(
	'user' => $_POST['user'],
	'msg' => $_POST['msg'],
	));


setcookie('user', $_POST['user'], time() + 36000 * 24);
}

 header('Location: index.php');
?>
