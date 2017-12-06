<section class="content-header">
    <h1>
    Transportation Vehicles
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= h($transportationvehicle->title) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Transportation') ?></th>
                                <td><?= $transportationvehicle->has('transportation') ? $this->Html->link($transportationvehicle->transportation->title_en, ['controller' => 'Transportations', 'action' => 'view', $transportationvehicle->transportation->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Title (English)') ?></th>
                                <td><?= h($transportationvehicle->title_en) ?></td>
                            </tr>

                            <tr>
                                <th><?= __('Title (Arabic)') ?></th>
                                <td><?= h($transportationvehicle->title_ar) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Icon') ?></th>
                                <td><?= h($transportationvehicle->icon) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($transportationvehicle->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($transportationvehicle->created) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($transportationvehicle->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>       