<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    die("Voce não pode acessar esta página por que não está logado.<p><a href=\"site.php\">Entrar</a></p>");
}
