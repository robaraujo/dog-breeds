<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DogPosition $dogPosition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dog Position'), ['action' => 'edit', $dogPosition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dog Position'), ['action' => 'delete', $dogPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dogPosition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dog Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dog Position'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dog Breeds'), ['controller' => 'DogBreeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dog Breed'), ['controller' => 'DogBreeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dogPositions view large-9 medium-8 columns content">
    <h3><?= h($dogPosition->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($dogPosition->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dog Breed') ?></th>
            <td><?= $dogPosition->has('dog_breed') ? $this->Html->link($dogPosition->dog_breed->name, ['controller' => 'DogBreeds', 'action' => 'view', $dogPosition->dog_breed->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $dogPosition->has('user') ? $this->Html->link($dogPosition->user->username, ['controller' => 'Users', 'action' => 'view', $dogPosition->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dogPosition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($dogPosition->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($dogPosition->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saw At') ?></th>
            <td><?= h($dogPosition->saw_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dogPosition->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dogPosition->modified) ?></td>
        </tr>
    </table>
</div>
