<section class="content-header">
    <h1>
        Extra Conditions
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
                    <h3 class="box-title"><?= h($extracondition->title_en) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($extracondition->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Title (English)') ?></th>
                                <td><?= h($extracondition->title_en) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Title (Arabic)') ?></th>
                                <td><?= h($extracondition->title_ar) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Icon') ?></th>
                                <td>
                                    <?php if($extracondition->icon != ''){ ?>
                                    <img src="<?php echo $this->request->webroot.'images/uploads/'.$extracondition->icon ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                                    <?php }else{ ?>
                                    <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                        <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Icon (Selected)') ?></th>
                                <td>
                                    <?php if($extracondition->selected_icon != ''){ ?>
                                    <img src="<?php echo $this->request->webroot.'images/uploads/'.$extracondition->selected_icon ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                                    <?php }else{ ?>
                                    <img src="<?php echo $this->request->webroot.'images/website/no-image.png' ?>" style="width: 140px; margin-top: 20px;" class="previewHolder">
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Content (English)') ?></th>
                                <td><?= h($extracondition->content_en) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Content (Arabic)') ?></th>
                                <td><?= h($extracondition->content_ar) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($extracondition->created) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($extracondition->modified) ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>




        </div>
    </div>
</section>       