<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $dogBreed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dog Breed'), ['action' => 'edit', $dogBreed->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dog Breed'), ['action' => 'delete', $dogBreed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dogBreed->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dog Breeds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dog Breed'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dogBreeds view large-9 medium-8 columns content">
    <h3><?= h($dogBreed->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($dogBreed->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= h($dogBreed->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($dogBreed->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dogBreed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dogBreed->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dogBreed->modified) ?></td>
        </tr>
    </table>
</div>
