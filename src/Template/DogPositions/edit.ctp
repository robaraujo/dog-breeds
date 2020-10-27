<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DogPosition $dogPosition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dogPosition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dogPosition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dog Positions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Dog Breeds'), ['controller' => 'DogBreeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dog Breed'), ['controller' => 'DogBreeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dogPositions form large-9 medium-8 columns content">
    <?= $this->Form->create($dogPosition) ?>
    <fieldset>
        <legend><?= __('Edit Dog Position') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('dog_breed_id', ['options' => $dogBreeds]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('saw_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
