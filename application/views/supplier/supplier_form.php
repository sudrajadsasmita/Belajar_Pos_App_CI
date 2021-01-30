<section class="content-header">
    <h1>
        Supplier
        <small>every data supplier in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i> </a></li>
        <li class=""><a href="<?= site_url('supplier'); ?>">Supplier</a></li>
        <li class="active"><a href="#"><?= $title; ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title; ?> Supplier</h3>
            <div class="pull-right">
                <a href="<?= site_url('supplier'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-lg-offset-4">

                    <form action="<?= site_url('supplier/process'); ?>" method="POST">
                        <input type="hidden" name="id_supplier" value="<?= $row->id_supplier; ?>">
                        <div class="form-group">
                            <label for="name">Supplier Name *</label>
                            <input type="text" name="supplier_name" id="name" value="<?= $row->name; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Number Phone *</label>
                            <input type="text" name="phone" id="phone" value="<?= $row->phone; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">address *</label>
                            <input type="text" name="address" id="address" value="<?= $row->address; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description *</label>
                            <textarea name="description" id="description" class="form-control"><?= $row->description; ?></textarea>
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