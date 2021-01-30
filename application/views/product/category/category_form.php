<section class="content-header">
    <h1>
        Category
        <small>every data category in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> </a></li>
        <li class=""><a href="<?= site_url('category'); ?>">Category</a></li>
        <li class="active"><a href="#"><?= $title; ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title; ?> Category</h3>
            <div class="pull-right">
                <a href="<?= site_url('category'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-lg-offset-4">

                    <form action="<?= site_url('category/process'); ?>" method="POST">
                        <input type="hidden" name="id_category" value="<?= $row->id_category; ?>">
                        <div class="form-group">
                            <label for="name">Category Name *</label>
                            <input type="text" name="category_name" id="name" value="<?= $row->name; ?>" class="form-control" required>
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