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
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transportations'), ['controller' => 'Transportations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transportation'), ['controller' => 'Transportations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetingpoints'), ['controller' => 'Meetingpoints', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meetingpoint'), ['controller' => 'Meetingpoints', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Meetingpointtypes'), ['controller' => 'Meetingpointtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meetingpointtype'), ['controller' => 'Meetingpointtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tripfeatures'), ['controller' => 'Tripfeatures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tripfeature'), ['controller' => 'Tripfeatures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Extraconditions'), ['controller' => 'Extraconditions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Extracondition'), ['controller' => 'Extraconditions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tripactivities'), ['controller' => 'Tripactivities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tripactivity'), ['controller' => 'Tripactivities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Triplocations'), ['controller' => 'Triplocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Triplocation'), ['controller' => 'Triplocations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tripprices'), ['controller' => 'Tripprices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tripprice'), ['controller' => 'Tripprices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trips view large-9 medium-8 columns content">
    <h3><?= h($trip->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $trip->has('location') ? $this->Html->link($trip->location->id, ['controller' => 'Locations', 'action' => 'view', $trip->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transportation') ?></th>
            <td><?= $trip->has('transportation') ? $this->Html->link($trip->transportation->id, ['controller' => 'Transportations', 'action' => 'view', $trip->transportation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($trip->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meetinpoint Location') ?></th>
            <td><?= h($trip->meetinpoint_location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meetingpoint') ?></th>
            <td><?= $trip->has('meetingpoint') ? $this->Html->link($trip->meetingpoint->id, ['controller' => 'Meetingpoints', 'action' => 'view', $trip->meetingpoint->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meetingpointtype') ?></th>
            <td><?= $trip->has('meetingpointtype') ? $this->Html->link($trip->meetingpointtype->id, ['controller' => 'Meetingpointtypes', 'action' => 'view', $trip->meetingpointtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tripfeature') ?></th>
            <td><?= $trip->has('tripfeature') ? $this->Html->link($trip->tripfeature->title, ['controller' => 'Tripfeatures', 'action' => 'view', $trip->tripfeature->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extracondition') ?></th>
            <td><?= $trip->has('extracondition') ? $this->Html->link($trip->extracondition->id, ['controller' => 'Extraconditions', 'action' => 'view', $trip->extracondition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Travellers') ?></th>
            <td><?= $this->Number->format($trip->travellers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Child Price') ?></th>
            <td><?= $this->Number->format($trip->child_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Request Photographer') ?></th>
            <td><?= $this->Number->format($trip->request_photographer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($trip->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($trip->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Summary') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->summary)); ?>
    </div>
    <div class="row">
        <h4><?= __('Images') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->images)); ?>
    </div>
    <div class="row">
        <h4><?= __('Schedule') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->schedule)); ?>
    </div>
    <div class="row">
        <h4><?= __('Faq1') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->faq1)); ?>
    </div>
    <div class="row">
        <h4><?= __('Faq2') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->faq2)); ?>
    </div>
    <div class="row">
        <h4><?= __('Extra Expense') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->extra_expense)); ?>
    </div>
    <div class="row">
        <h4><?= __('Operating Days') ?></h4>
        <?= $this->Text->autoParagraph(h($trip->operating_days)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tripactivities') ?></h4>
        <?php if (!empty($trip->tripactivities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Trip Id') ?></th>
                <th scope="col"><?= __('Activity Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trip->tripactivities as $tripactivities): ?>
            <tr>
                <td><?= h($tripactivities->id) ?></td>
                <td><?= h($tripactivities->trip_id) ?></td>
                <td><?= h($tripactivities->activity_id) ?></td>
                <td><?= h($tripactivities->created) ?></td>
                <td><?= h($tripactivities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tripactivities', 'action' => 'view', $tripactivities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tripactivities', 'action' => 'edit', $tripactivities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tripactivities', 'action' => 'delete', $tripactivities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tripactivities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Triplocations') ?></h4>
        <?php if (!empty($trip->triplocations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Trip Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trip->triplocations as $triplocations): ?>
            <tr>
                <td><?= h($triplocations->id) ?></td>
                <td><?= h($triplocations->trip_id) ?></td>
                <td><?= h($triplocations->location_id) ?></td>
                <td><?= h($triplocations->created) ?></td>
                <td><?= h($triplocations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Triplocations', 'action' => 'view', $triplocations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Triplocations', 'action' => 'edit', $triplocations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Triplocations', 'action' => 'delete', $triplocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $triplocations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tripprices') ?></h4>
        <?php if (!empty($trip->tripprices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Trip Id') ?></th>
                <th scope="col"><?= __('Person') ?></th>
                <th scope="col"><?= __('Price Per Person') ?></th>
                <th scope="col"><?= __('Total Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trip->tripprices as $tripprices): ?>
            <tr>
                <td><?= h($tripprices->id) ?></td>
                <td><?= h($tripprices->trip_id) ?></td>
                <td><?= h($tripprices->person) ?></td>
                <td><?= h($tripprices->price_per_person) ?></td>
                <td><?= h($tripprices->total_price) ?></td>
                <td><?= h($tripprices->created) ?></td>
                <td><?= h($tripprices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tripprices', 'action' => 'view', $tripprices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tripprices', 'action' => 'edit', $tripprices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tripprices', 'action' => 'delete', $tripprices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tripprices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
