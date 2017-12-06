<section class="content-header">
    <h1>
    <?= __('Trip Features') ?>  <?php echo $this->Html->link(__('Add Trip Feature'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Trip Features') ?></li>
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
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('date_added') ?></th>
                <th><?= $this->Paginator->sort('date_modified') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tripfeatures as $tripfeature): ?>
            <tr>
                <td><?= $this->Number->format($tripfeature->id) ?></td>
                <td><?= h($tripfeature->title) ?></td>
                <td><?= h($tripfeature->date_added) ?></td>
                <td><?= h($tripfeature->date_modified) ?></td>
                <td>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $tripfeature->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info']
                    )
                    ?>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $tripfeature->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success']
                        )
                    ?>
                    <?php echo $this->Form->postLink(
                    '<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                     ['action' => 'delete', $tripfeature->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $tripfeature->id), 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'Delete']) ?>
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