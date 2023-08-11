<?php
    //header('Content-Type: text/html; charset=utf-8');
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $basename = "news";

    $dbc = mysqli_connect($servername, $username, $password, $basename) or die('Neuspjelo spajanje na bazu podataka.'.mysqli_error());
    mysqli_set_charset($dbc, "utf8");

    if ($dbc) {
    /*echo "Uspješno ste spojeni";*/
    }
?>