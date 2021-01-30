<section class="content-header">
    <h1>
        Users
        <small>every data user in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> </a></li>
        <li class="active"><a href="#">Users</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add'); ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create User</a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomer = 1; ?>
                    <?php foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%;"><?= $nomer; ?></td>
                            <td><?= $data->username; ?></td>
                            <td><?= $data->name; ?></td>
                            <td><?= $data->address; ?></td>
                            <td><?= $data->level == 1 ? 'Admin' : 'Kasir'; ?></td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('user/delete'); ?>" method="post">
                                    <a href="<?= site_url('user/edit/' . $data->id_user); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-pencil"></i> Update
                                    </a>
                                    <input type="hidden" name="id" value="<?= $data->id_user; ?>">
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $data->name; ?>')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php $nomer++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>