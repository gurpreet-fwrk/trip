<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Extracondition $extracondition
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Extracondition'), ['action' => 'edit', $extracondition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Extracondition'), ['action' => 'delete', $extracondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extracondition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Extraconditions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Extracondition'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="extraconditions view large-9 medium-8 columns content">
    <h3><?= h($extracondition->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($extracondition->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icon') ?></th>
            <td><?= h($extracondition->icon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($extracondition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($extracondition->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($extracondition->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($extracondition->content)); ?>
    </div>
</div>
