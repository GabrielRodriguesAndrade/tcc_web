<?php
include 'autoload.php';

Security::startSession();
Security::sendHeaders();

include 'rotas.php';
