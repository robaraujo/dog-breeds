<section class="content-header">
  <h1>
    Dog Position
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($dogPosition->name) ?></dd>
            <dt scope="row"><?= __('Dog Breed') ?></dt>
            <dd><?= $dogPosition->has('dog_breed') ? $this->Html->link($dogPosition->dog_breed->name, ['controller' => 'DogBreeds', 'action' => 'view', $dogPosition->dog_breed->id]) : '' ?></dd>
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $dogPosition->has('user') ? $this->Html->link($dogPosition->user->username, ['controller' => 'Users', 'action' => 'view', $dogPosition->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($dogPosition->id) ?></dd>
            <dt scope="row"><?= __('Latitude') ?></dt>
            <dd><?= $this->Number->format($dogPosition->latitude) ?></dd>
            <dt scope="row"><?= __('Longitude') ?></dt>
            <dd><?= $this->Number->format($dogPosition->longitude) ?></dd>
            <dt scope="row"><?= __('Saw At') ?></dt>
            <dd><?= h($dogPosition->saw_at) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($dogPosition->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($dogPosition->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
