<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Gallery $gallery
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gallery'), ['action' => 'edit', $gallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gallery'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="galleries view large-9 medium-8 columns content">
    <h3><?= h($gallery->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $gallery->has('user') ? $this->Html->link($gallery->user->id, ['controller' => 'Users', 'action' => 'view', $gallery->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($gallery->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($gallery->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gallery->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gallery->modified) ?></td>
        </tr>
    </table>
</div>
