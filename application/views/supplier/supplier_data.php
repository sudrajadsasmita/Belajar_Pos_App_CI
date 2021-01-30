<section class="content-header">
    <h1>
        Supplier
        <small>every data supplier in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i> </a></li>
        <li class="active"><a href="#">Supplier</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Supplier</h3>
            <div class="pull-right">
                <a href="<?= site_url('supplier/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-truck"></i> Create Supplier</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Shop Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomer = 1; ?>
                    <?php foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $nomer; ?></td>
                            <td><?= $data->name; ?></td>
                            <td><?= $data->phone; ?></td>
                            <td><?= $data->address; ?></td>
                            <td><?= $data->description; ?></td>
                            <td><?= $data->created; ?></td>
                            <td><?= $data->updated; ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('supplier/edit/' . $data->id_supplier); ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="<?= site_url('supplier/delete/' . $data->id_supplier); ?>" onclick="return confirm('apakah anda yakin ingin menghapus <?= $data->name; ?>')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php $nomer++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>