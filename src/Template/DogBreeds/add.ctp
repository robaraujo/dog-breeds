<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $dogBreed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dog Breeds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dogBreeds form large-9 medium-8 columns content">
    <?= $this->Form->create($dogBreed) ?>
    <fieldset>
        <legend><?= __('Add Dog Breed') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('size');
            echo $this->Form->control('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
