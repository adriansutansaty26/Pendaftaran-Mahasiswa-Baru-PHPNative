<?php
session_start();

function authSession($level)
{
    if (isset($_SESSION['USER'])) {
        if (isset($_SESSION['USER']['id'])) {
            if ($_SESSION['USER']['level'] != $level) {
                header('Location:index.php?hal=block');
            } else {
                return $_SESSION['USER'];
            }
        }
    } else {
        header('Location:index.php?hal=masuk');
    }
}
function authSessionToDashboard()
{
    if (isset($_SESSION['USER'])) {
        if ($_SESSION['USER']['level'] == 1) {
            header('Location:index.php?admin=daftar_maba');
        } else {
            header('Location:index.php?camaba=dasbor');
        }
    }
}

function authElementShow($level)
{
    if (isset($_SESSION['USER'])) {
        if ($_SESSION['USER']['level'] != $level) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
