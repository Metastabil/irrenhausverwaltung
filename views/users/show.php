<?php
/**
 * @var array $element
 * @var string $title
 */
?>

<h1 class="title">
    <?= esc($title) ?>
</h1>

<form action="javascript:void(0)" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="first-name">
            <?= esc(LANG->users->attributes->first_name) ?>
            <span class="required">*</span>
        </label>

        <input type="text" name="first-name" id="first-name" placeholder="<?= esc(LANG->users->attributes->first_name) ?>" value="<?= esc($element['first_name']) ?>" disabled />
    </div>

    <div class="input-wrapper">
        <label for="last-name">
            <?= esc(LANG->users->attributes->last_name) ?>
            <span class="required">*</span>
        </label>

        <input type="text" name="last-name" id="last-name" placeholder="<?= LANG->users->attributes->last_name ?>" value="<?= esc($element['last_name']) ?>" disabled />
    </div>

    <div class="input-wrapper">
        <label for="email">
            <?= esc(LANG->users->attributes->email) ?>
            <span class="required">*</span>
        </label>

        <input type="email" name="email" id="email" placeholder="<?= LANG->users->attributes->email ?>" value="<?= esc($element['email']) ?>" disabled />
    </div>

    <div class="input-wrapper">
        <a href="<?= base_url('users') ?>" class="btn btn-blue">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <a href="<?= base_url('update-user/' . $element['id']) ?>" class="btn btn-blue">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <a href="javascript:void(0)" class="btn btn-red">
            <i class="fa-solid fa-trash-can"></i>
        </a>
    </div>
</form>