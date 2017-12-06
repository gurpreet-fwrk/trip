<section class="content-header">
    <h1>
    <?= __('Meeting Points') ?>  <?php echo $this->Html->link(__('Add Meeting Point'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Meeting Points') ?></li>
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
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('meetingpointtype_id', 'Meeting Point Type') ?></th>
                <th><?= $this->Paginator->sort('title', 'Meeting Point (EN)') ?></th>
                <th><?= $this->Paginator->sort('title', 'Meeting Point (AR)') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($meetingpoints as $meetingpoint): ?>
            <tr>
                <td><?= $this->Number->format($meetingpoint->id) ?></td>
                <td><?= $meetingpoint->has('location') ? $this->Html->link($meetingpoint->location->name_en, ['controller' => 'Locations', 'action' => 'view', $meetingpoint->location->id]) : '' ?></td>
                <td><?= $meetingpoint->has('meetingpointtype') ? $this->Html->link($meetingpoint->meetingpointtype->title_en, ['controller' => 'Meetingpointtypes', 'action' => 'view', $meetingpoint->meetingpointtype->id]) : '' ?></td>
                <td><?= h($meetingpoint->title_en) ?></td>
                <td><?= h($meetingpoint->title_ar) ?></td>
                <td><?= h($meetingpoint->created) ?></td>
                <td><?= h($meetingpoint->modified) ?></td>
                <td>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $meetingpoint->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    )
                    ?>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $meetingpoint->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                        )
                    ?>
                    <?php echo $this->Form->postLink(
                    '<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                     ['action' => 'delete', $meetingpoint->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $meetingpoint->id), 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'Delete']) ?>
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