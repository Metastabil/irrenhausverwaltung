<?php

if (!function_exists('set_message')) {
    function set_message(string $message, string $type = 'success') :void {
        $_SESSION['message'] = [
            'message' => $message,
            'type' => $type
        ];
    }
}

if (!function_exists('unset_message')) {
    function unset_message() :void {
        unset($_SESSION['message']);
    }
}