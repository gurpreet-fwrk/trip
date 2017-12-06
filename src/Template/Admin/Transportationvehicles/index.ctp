<section class="content-header">
    <h1>
    <?= __('Transportation Vehicle') ?>  <?php echo $this->Html->link(__('Add Transportation Vehicle'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Transportation Vehicle') ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        
        <?= $this->Flash->render() ?>
        
        <div class="box">
            <div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('transportation_id') ?></th>
                <th><?= $this->Paginator->sort('title_en', 'Title (English)') ?></th>
                <th><?= $this->Paginator->sort('title', 'Title (Arabic)') ?></th>
                <th><?= $this->Paginator->sort('icon') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transportationvehicles as $transportationvehicle): ?>
            <tr>
                <td><?= $this->Number->format($transportationvehicle->id) ?></td>
                <td><?= $transportationvehicle->has('transportation') ? $this->Html->link($transportationvehicle->transportation->title_en, ['controller' => 'Transportations', 'action' => 'view', $transportationvehicle->transportation->id]) : '' ?></td>
                <td><?= h($transportationvehicle->title_en) ?></td>
                <td><?= h($transportationvehicle->title_ar) ?></td>
                <td>
                    <?php if($transportationvehicle->icon != ''){ ?>
                    <img src="<?php echo $this->request->webroot.'images/transport_vehicles/'.$transportationvehicle->icon ?>" style="width: 80px; margin-top: 20px;">
                    <?php }else{ ?>
                    <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 80px; margin-top: 20px;">
                    <?php } ?>
                </td>
                <td><?= h($transportationvehicle->created) ?></td>
                <td><?= h($transportationvehicle->modified) ?></td>
                <td>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $transportationvehicle->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    )
                    ?>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $transportationvehicle->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                        )
                    ?>
                    <?php echo $this->Form->postLink(
                    '<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                     ['action' => 'delete', $transportationvehicle->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $transportationvehicle->id), 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'Delete']) ?>
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