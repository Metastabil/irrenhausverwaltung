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
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login.css') ?>" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/cba80a8d38.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <div class="login-container">
                <h1 class="title">
                    <?= esc($title) ?>
                </h1>

                <form action="<?= base_url('login') ?>" method="post" class="default-form">
                    <div class="input-wrapper">
                        <label for="email">
                            <?= esc(LANG->users->attributes->email) ?>
                            <span class="required">*</span>
                        </label>

                        <input type="email" name="email" id="email" placeholder="<?= esc(LANG->users->attributes->email) ?>" required>
                    </div>

                    <div class="input-wrapper">
                        <label for="password">
                            <?= esc(LANG->users->attributes->password) ?>
                            <span class="required">*</span>
                        </label>

                        <input type="password" name="password" id="password" placeholder="<?= esc(LANG->users->attributes->password) ?>" required>
                    </div>

                    <div class="input-wrapper">
                        <button type="submit" class="btn btn-blue">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </body>