<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dog Positions

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <!-- <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
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
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
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
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $dogPosition->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dogPosition->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dogPosition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dogPosition->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>