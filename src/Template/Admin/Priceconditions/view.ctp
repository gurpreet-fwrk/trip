<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Pricecondition $pricecondition
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pricecondition'), ['action' => 'edit', $pricecondition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pricecondition'), ['action' => 'delete', $pricecondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pricecondition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Priceconditions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pricecondition'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="priceconditions view large-9 medium-8 columns content">
    <h3><?= h($pricecondition->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($pricecondition->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pricecondition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($pricecondition->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($pricecondition->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Content') ?></th>
            <td><?= h($pricecondition->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pricecondition->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pricecondition->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($pricecondition->content)); ?>
    </div>
</div>
