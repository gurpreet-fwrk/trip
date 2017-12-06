<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="trips form large-9 medium-8 columns content">
    <?= $this->Form->create($trip) ?>
    <fieldset>
        <legend><?= __('Edit Trip') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('price');
            echo $this->Form->control('date_added');
            echo $this->Form->control('date_modified');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
