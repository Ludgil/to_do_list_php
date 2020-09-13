<?php

const PATH_TO_SQLITE_FILE = 'db/db_todo.db';

try {
    $bdd = new PDO("sqlite:".PATH_TO_SQLITE_FILE);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Unable to connect";
    echo $e->getMessage();
    die();
}

?>