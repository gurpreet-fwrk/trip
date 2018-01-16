<section class="content-header">
    <h1>
    <?= __('Trips') ?>  <?php echo $this->Html->link(__('Add Trip'), ['action' => 'add'], ['class' => 'btn btn-warning']); ?>
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i><?= __('Dashboard') ?></a></li>
        <li class="active"><?= __('Trips') ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
        
        <?= $this->Flash->render() ?>
        <?php //echo "<pre>"; print_r($trips); echo "</pre>"; ?>
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id', 'User') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title_en') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title_ar') ?></th>
                <th scope="col"><?php echo 'Status'; ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trips as $trip): ?>
            <tr>
                <td><?= $this->Number->format($trip->id) ?></td>
                <td><?= $trip->has('user') ? $this->Html->link($trip->user->name, ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
                <td><?= h($trip->title_en) ?></td>
                <td><?= h($trip->title_ar) ?></td>
                <td>
                    <?php if($trip->status == 3){ ?>
                    <span class="label label-warning">Pending</span>
                    <?php }elseif($trip->status == 1){ ?>
                    <span class="label label-success">Approved</span>
                    <?php }elseif($trip->status == 0){ ?>
                    <span class="label label-danger">Declined</span>
                    <?php } ?>
                </td>
                <td><?= h($trip->created) ?></td>
                <td>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View') . '</span>',
                        ['action' => 'view', $trip->id],
                        ['escape' => false, 'title' => __('View'), 'class' => 'btn btn-info btn-xs']
                    )
                    ?>
                    <?php echo $this->Html->link(
                        '<span class="fa fa-pencil"></span><span class="sr-only">' . __('Edit') . '</span>',
                        ['action' => 'edit', $trip->id],
                        ['escape' => false, 'title' => __('Edit'), 'class' => 'btn btn-success btn-xs']
                        )
                    ?>
                    <?php echo $this->Form->postLink(
                    '<span class="fa fa-trash"></span><span class="sr-only">' . __('Delete') . '</span>',
                     ['action' => 'delete', $trip->id],
                     ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id), 'class' => 'btn btn-danger btn-xs', 'escape' => false, 'title' => 'Delete']) ?>
                    
                    <?php
                    if($trip->user_id == $loggeduser['id']){
                        $sizes = ['1' => 'Published', '3' => 'Not Published'];
                    }else{
                        $sizes = ['0' => 'Declined', '1' => 'Published', '3' => 'Pending'];
                    }
                    echo $this->Form->select('change_status', $sizes, ['default' => $trip->status, 'data-id' => $trip->id]);
                    ?>
                    
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

<script>
$("select[name='change_status']").change(function(){
    
    $.ajax({
       url: '<?php echo $this->request->webroot ?>admin/trips/ajaxTrip?action=change_status',
       data: {status: $(this).val(), id : $(this).attr('data-id')},
       method: 'post',
       dataType: 'html',
       success: function(response){
           if(response == 'success'){
               location.reload();
           }
       }
    });
    
});   
</script>