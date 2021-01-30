<section class="content-header">
    <h1>
        Unit
        <small>every data unit in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> </a></li>
        <li class="active"><a href="#">Unit</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php if ($this->session->has_userdata('success')) { ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i><?= $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>
    <?php $this->session->unset_userdata('success'); ?>
    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Unit</h3>
            <div class="pull-right">
                <a href="<?= site_url('unit/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-circle-o"></i> Create Unit</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
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
                            <td><?= $data->created; ?></td>
                            <td><?= $data->updated; ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('unit/edit/' . $data->id_unit); ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="<?= site_url('unit/delete/' . $data->id_unit); ?>" onclick="return confirm('apakah anda yakin ingin menghapus <?= $data->name; ?>')" class="btn btn-danger btn-xs">
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