<?php
function redirect_to($url) {
    if (isset($url)) {
        header('location: ' . $url);
    }
}

function sanitize_output($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}

function loggedin() {
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

