<?php $id = $_GET['id'];
$datefavori = $_GET['datefavori'];
$page = $_GET['page'];
if ($page == "mes") {
    header('location: mes_annonces');
    die; } else if ($page == "toutes") {
        header('location: toutes_annonces');
        die; } else if ($page == "une") {
            header('location: annonce');
            die; }
