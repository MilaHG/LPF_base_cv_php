<?php

session_start(); // à mettre dans toutes les pages de l'admin
echo '<pre>', var_dump($_SESSION);
echo '</pre>';


