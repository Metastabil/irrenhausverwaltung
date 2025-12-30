<?php

if (!function_exists('render_nav_element')) {
    function render_nav_element(string $href, string $font_awesome_class, string $text, string $class = '') :string {
        return "
            <div class='nav-element-wrapper'>
                <a href='$href'>
                    <span class='nav-icon'>
                        <i class='$font_awesome_class'></i>
                    </span>
                    $text
                </a>
            </div>
        ";
    }
}

if (!function_exists('render_search_form')) {
    function render_search_form(string $action, string $value = '') :string {
        return "
            <form action='$action' method='post' class='search-form'>
                <input type='search' name='search' id='search' placeholder='Suchen' value='$value' />
                <button type='submit' title='Suchen' class='btn btn-blue'>
                    <i class='fa-solid fa-magnifying-glass'></i>
                </button>
                <a href='$action' class='btn btn-blue'>
                    <i class='fa-solid fa-rotate'></i>
                </a>
            </form>
        ";
    }
}

if (!function_exists('render_flash_message')) {
    function render_flash_message() :string {
        $type = $_SESSION['message']['type'];
        $message = $_SESSION['message']['message'];

        return "
            <p class='flash-message $type'>
                $message
            </p>
        ";
    }
}

if (!function_exists('render_default_table')) {
    function render_default_table(array $elements, string $show_link, string $display_column, string $font_awesome_class) :string {
        $html = "<table class='default-table'>";

        foreach ($elements as $e) {
            $html .= "
                <tr onclick='window.location.href=\"$show_link/{$e['id']}\"'>
                    <td>
                        <span class='table-icon-wrapper'>
                            <i class='$font_awesome_class'></i>
                        </span>
                        {$e[$display_column]}
                    </td>
                </tr>
            ";
        }

        $html .= "</table>";

        return $html;
    }
}