<?php
// Connexion à la BD
try {
    $db = new PDO('mysql:host=localhost;dbname=commerce;charset=utf8','root','');
} catch (Exception $excep) {
    die('Error : ' .$excep->getMessage());
}
?>