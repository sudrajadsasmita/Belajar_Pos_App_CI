<section class="content-header">
    <h1>
        Customer
        <small>every data customer in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> </a></li>
        <li class=""><a href="<?= site_url('customer'); ?>">Customer</a></li>
        <li class="active"><a href="#"><?= $title; ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title; ?> Customer</h3>
            <div class="pull-right">
                <a href="<?= site_url('customer'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-lg-offset-4">

                    <form action="<?= site_url('customer/process'); ?>" method="POST">
                        <input type="hidden" name="id_customer" value="<?= $row->id_customer; ?>">
                        <div class="form-group">
                            <label for="name">Customer Name *</label>
                            <input type="text" name="customer_name" id="name" value="<?= $row->name; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender *</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="">- pilih -</option>
                                <option value="L" <?= $row->gender == 'L' ? 'selected' : null; ?>>Laki-Laki</option>
                                <option value="P" <?= $row->gender == 'P' ? 'selected' : null; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Number Phone *</label>
                            <input type="text" name="phone" id="phone" value="<?= $row->phone; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">address *</label>
                            <textarea type="text" name="address" id="address" class="form-control" required><?= $row->address; ?></textarea>
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