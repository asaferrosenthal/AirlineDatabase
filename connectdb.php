<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=airlinedb', "root", "");
} catch (PDOException $e) {
    print "Error!: ". $e->getMessage(). "<br/>";
    die();
}
?>
