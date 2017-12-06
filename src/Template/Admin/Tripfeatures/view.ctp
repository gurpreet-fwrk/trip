<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Tripfeature $tripfeature
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tripfeature'), ['action' => 'edit', $tripfeature->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tripfeature'), ['action' => 'delete', $tripfeature->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tripfeature->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tripfeatures'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tripfeature'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tripfeatures view large-9 medium-8 columns content">
    <h3><?= h($tripfeature->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($tripfeature->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tripfeature->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Added') ?></th>
            <td><?= h($tripfeature->date_added) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Modified') ?></th>
            <td><?= h($tripfeature->date_modified) ?></td>
        </tr>
    </table>
</div>
