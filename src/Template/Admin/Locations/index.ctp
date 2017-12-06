<section class="content-header">
    <h1>
    <?= __('Locations') ?>  <?php echo $this->Html->link(__('Add Location'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Locations') ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        
        <?= $this->Flash->render() ?>
        
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><?= __('ID') ?></th>
                  <th><?= __('Name (English)') ?></th>
                  <th><?= __('Name (Arabic)') ?></th>
                  <th><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($locations as $location): ?>
                <tr>
                  <td><?= $this->Number->format($location->id) ?></td>
                  <td><?= h($location->name_en) ?></td>
                  <td><?= h($location->name_ar) ?></td>
                  <td>
                  <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $location->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    ) ?>
                    <?= $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $location->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                    ) ?>
                    <a href="<?php echo $this->request->webroot; ?>admin/locations/delete/<?php echo $location->id; ?>" class="btn btn-danger" onclick="if (confirm('Are you sure you want to delete this location?')) { return true; } return false;"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
        
        
        </div>
    </div>
</section>       