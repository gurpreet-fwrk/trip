<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Trip $trip
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trips view large-9 medium-8 columns content">
    <h3><?= h($trip->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($trip->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($trip->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Added') ?></th>
            <td><?= h($trip->date_added) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Modified') ?></th>
            <td><?= h($trip->date_modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->description)); ?>
    </div>
</div>
