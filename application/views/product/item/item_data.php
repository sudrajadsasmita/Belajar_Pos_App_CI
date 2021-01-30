<section class="content-header">
    <h1>
        Item
        <small>every data item in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> </a></li>
        <li class="active"><a href="#">item</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php if ($this->session->has_userdata('success')) { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i><?= $this->session->flashdata('success'); ?>
        </div>
        <?php $this->session->unset_userdata('success'); ?>
    <?php } ?>

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-circle-o"></i> Create Item</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $nomer = 1; ?>
                    <?php foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $nomer; ?></td>
                            <td>
                                <?= $data->barcode; ?><br>
                                <a href="<?= site_url('item/barcode_qrcode/' . $data->id_item); ?>" class="btn btn-default btn-xs">
                                    Generate barcode <i class="fa fa-barcode"></i>
                                </a>
                            </td>
                            <td><?= $data->name; ?></td>
                            <td><?= $data->category_name; ?></td>
                            <td><?= $data->unit_name; ?></td>
                            <td><?= $data->price; ?></td>
                            <td><?= $data->stock; ?></td>
                            <td><img src="<?= base_url('uploads/product/') . $data->image; ?>" alt="" width="200px"></td>
                            <td><?= $data->created; ?></td>
                            <td><?= $data->updated; ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('item/edit/' . $data->id_item); ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="<?= site_url('item/delete/' . $data->id_item); ?>" onclick="return confirm('apakah anda yakin ingin menghapus <?= $data->name; ?>')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php $nomer++; ?>
                    <?php } ?> -->
                </tbody>
            </table>
        </div>
    </div>

</section>
<script src="<?= base_url('assets'); ?>/bower_components/jquery/dist/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url('item/get_ajax'); ?>',
                type: 'POST'
            },
            columnDefs: [{
                    targets: [5, 6],
                    className: 'text-right'
                },
                {
                    targets: [7, -1],
                    className: 'text-center'
                },
                {
                    targets: [0, 7, -1],
                    orderable: false
                }
            ]
        });
    })
</script>