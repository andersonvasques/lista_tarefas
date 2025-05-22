<?php 

session_start();

if(!$_SESSION['nome']) {

    header('Location: ../lista_tarefas/index.php');
    exit();

}