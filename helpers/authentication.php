<?php

if (!function_exists('redirect_if_not_authenticated')) {
    function redirect_if_not_authenticated() :void {
        if (empty($_SESSION['user'])) {
            redirect('login');
        }
    }
}
