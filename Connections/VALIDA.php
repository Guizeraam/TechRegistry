<?php
if (empty($_SESSION)) session_start();

if (empty($_SESSION['lastAccess'])) $_SESSION['lastAccess'] = time();
else {
    $_SESSION['lastAccess'] -= time();
}

if ($_SESSION['lastAccess'] > time()+5) {
    session_destroy();
    echo('SESSAO EXPIRADA!');
} ?>