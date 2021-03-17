<?php

require 'contato.class.php';
$contato = new Contato();

if (!empty($_POST['nome'])) {
    $nome = $_POST['nome'];
    $email =  $_POST['email'];

    $contato->adicionar($email, $nome);
    header('Location: index.php');
}

