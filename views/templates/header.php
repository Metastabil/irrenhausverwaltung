<?php
/**
 * @var string $title
 */
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <title><?= esc($title) . ' | ' . esc(LANG->project) ?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/application.css') ?>" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/cba80a8d38.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/navigation.js') ?>"></script>
    </head>
    <body>
        <header>
            <a href="javascript:toggleNavigation()" class="nav-compass">
                <i class="fa-solid fa-compass"></i>
            </a>

            <a href="javascript:void(0)" class="nav-profile">
                <i class="fa-solid fa-user"></i>
            </a>

            <nav>
                <!-- Users -->
                <?= render_nav_element(base_url('users'), 'fa-solid fa-users', esc(LANG->navigation->users)) ?>
            </nav>
        </header>
        <main>
