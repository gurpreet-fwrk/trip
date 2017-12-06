<section class="content-header">
    <h1>
    Transportations
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
                    <h3 class="box-title"><?= h($transportation->title) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Title (English)') ?></th>
                                <td><?= h($transportation->title_en) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Title (Arabic)') ?></th>
                                <td><?= h($transportation->title_ar) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($transportation->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($transportation->created) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($transportation->modified) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>       