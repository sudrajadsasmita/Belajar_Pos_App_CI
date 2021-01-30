<section class="content-header">
    <h1>
        Item
        <small>every data item in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> </a></li>
        <li class=""><a href="<?= site_url('item'); ?>">Item</a></li>
        <li class="active"><a href="#"><?= $title; ?> Item</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php if ($this->session->has_userdata('error')) { ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i><?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error'))); ?>
        </div>
        <?php $this->session->unset_userdata('error'); ?>
    <?php } ?>
    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title; ?> Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-lg-offset-4">
                    <?= form_open_multipart('item/process') ?>
                    <input type="hidden" name="id_item" value="<?= $row->id_item; ?>">
                    <div class="form-group">
                        <label for="barcode">Barcode *</label>
                        <input type="text" name="barcode" id="barcode" value="<?= $row->barcode; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name *</label>
                        <input type="text" name="item_name" id="name" value="<?= $row->name; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category *</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">- pilih -</option>
                            <?php foreach ($category->result() as $key => $data) { ?>
                                <option value="<?= $data->id_category; ?>" <?= $data->id_category == $row->category_id ? 'selected' : null; ?>><?= $data->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit *</label>
                        <?= form_dropdown('unit', $unit, $selected_unit, ['class' => 'form-control', 'required' => 'required']); ?>
                    </div>
                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input type="number" name="price" id="price" value="<?= $row->price; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image </label>
                        <?php if ($page == 'edit') {
                            if ($row->image != null) { ?>
                                <div style="margin-bottom: 10px;">
                                    <img src="<?= base_url('uploads/product/') . $row->image; ?>" alt="" width="200px">
                                </div>
                        <?php }
                        } ?>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada'; ?>)</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="<?= $page; ?>">
                            <i class="fa fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</section>