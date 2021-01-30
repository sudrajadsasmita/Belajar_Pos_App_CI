<section class="content-header">
    <h1>
        Unit
        <small>every data unit in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> </a></li>
        <li class=""><a href="<?= site_url('unit'); ?>">Unit</a></li>
        <li class="active"><a href="#"><?= $title; ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title; ?> Unit</h3>
            <div class="pull-right">
                <a href="<?= site_url('unit'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-lg-offset-4">

                    <form action="<?= site_url('unit/process'); ?>" method="POST">
                        <input type="hidden" name="id_unit" value="<?= $row->id_unit; ?>">
                        <div class="form-group">
                            <label for="name">Unit Name *</label>
                            <input type="text" name="unit_name" id="name" value="<?= $row->name; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="<?= $page; ?>">
                                <i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>