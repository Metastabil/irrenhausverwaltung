<?php
/**
 * @var string $title
 */
?>

<h1 class="title">
    <?= esc($title) ?>
</h1>

<form action="<?= base_url('create-user') ?>" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="first-name">
            <?= esc(LANG->users->attributes->first_name) ?>
            <span class="required">*</span>
        </label>

        <input type="text" name="first-name" id="first-name" placeholder="<?= esc(LANG->users->attributes->first_name) ?>" required />
    </div>

    <div class="input-wrapper">
        <label for="last-name">
            <?= esc(LANG->users->attributes->last_name) ?>
            <span class="required">*</span>
        </label>

        <input type="text" name="last-name" id="last-name" placeholder="<?= LANG->users->attributes->last_name ?>" required />
    </div>

    <div class="input-wrapper">
        <label for="email">
            <?= esc(LANG->users->attributes->email) ?>
            <span class="required">*</span>
        </label>

        <input type="email" name="email" id="email" placeholder="<?= LANG->users->attributes->email ?>" required />
    </div>

    <div class="input-wrapper">
        <label for="password">
            <?= esc(LANG->users->attributes->password) ?>
            <span class="required">*</span>
        </label>

        <input type="password" name="password" id="password" placeholder="<?= LANG->users->attributes->password ?>" required />
    </div>

    <div class="input-wrapper">
        <button type="submit" class="btn btn-blue">
            <i class="fa-solid fa-check"></i>
        </button>

        <a href="<?= base_url('users') ?>" class="btn btn-red">
            <i class="fa-solid fa-xmark"></i>
        </a>
    </div>
</form>