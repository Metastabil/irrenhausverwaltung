<?php
/**
 * @var array $elements
 * @var string $search
 * @var string $title
 */
?>

<h1 class="title">
    <?= esc($title) ?>
    <a href="<?= base_url('create-user') ?>" class="btn btn-blue">
        <i class="fa-solid fa-plus"></i>
    </a>
</h1>

<?php if (!empty($_SESSION['message'])) : ?>
    <?= render_flash_message() ?>
    <?php unset_message() ?>
<?php endif ?>

<?= render_search_form(base_url('users'), $search) ?>

<?= render_default_table($elements, base_url('show-user'), 'email', 'fa-solid fa-user') ?>