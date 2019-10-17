<?php
session_start(); // à mettre dans toutes les pages de l'admin
require 'connexion.php';

if (isset($_SESSION['login']) && $_SESSION['login'] == 'connecté') {
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    //echo $_SESSION['login'];
} else {// utilisateur non connecté
    //header('location: authentification.php');
} // ferme le ELSE du IF ISSET
//
// déconnexion de l'admin - à mettre dans toutes les pages de l'admin
if (isset($_GET['logout'])) { // on récupère le terme quitter dans l'URL
    // on vide le contenu des variables
    $_SESSION['login'] = '';
    $_SESSION['id_utilisateur'] = '';
    $_SESSION['prenom'] = '';
    $_SESSION['nom'] = '';

    unset($_SESSION['login']);

    session_destroy();
    header('location:index_1.php');
    echo '<pre>', var_dump($_SESSION);
    echo '</pre>';
}
?>
<!DOCTYPE html>
