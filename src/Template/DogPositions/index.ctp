<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DogPosition[]|\Cake\Collection\CollectionInterface $dogPositions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dog Position'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dog Breeds'), ['controller' => 'DogBreeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dog Breed'), ['controller' => 'DogBreeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dogPositions index large-9 medium-8 columns content">
    <h3><?= __('Dog Positions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dog_breed_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saw_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dogPositions as $dogPosition): ?>
            <tr>
                <td><?= $this->Number->format($dogPosition->id) ?></td>
                <td><?= h($dogPosition->name) ?></td>
                <td><?= $dogPosition->has('dog_breed') ? $this->Html->link($dogPosition->dog_breed->name, ['controller' => 'DogBreeds', 'action' => 'view', $dogPosition->dog_breed->id]) : '' ?></td>
                <td><?= $dogPosition->has('user') ? $this->Html->link($dogPosition->user->username, ['controller' => 'Users', 'action' => 'view', $dogPosition->user->id]) : '' ?></td>
                <td><?= $this->Number->format($dogPosition->latitude) ?></td>
                <td><?= $this->Number->format($dogPosition->longitude) ?></td>
                <td><?= h($dogPosition->saw_at) ?></td>
                <td><?= h($dogPosition->created) ?></td>
                <td><?= h($dogPosition->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dogPosition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dogPosition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dogPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dogPosition->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
