<section class="content-header">
    <h1>
        Users
        <small>every data user in here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> </a></li>
        <li class=""><a href="<?= site_url('user'); ?>"> Users</a></li>
        <li class="active"><a href="#"> Update</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-lg-offset-4">
                    <form action="" method="POST">
                        <input type="hidden" name="id_user" value="<?= $this->input->post('id_user') ?? $row->id_user; ?>">
                        <div class="form-group <?= form_error('fullname') ? 'has-error' : null; ?>">
                            <label for="name">Name *</label>
                            <input type="text" name="fullname" id="name" value="<?= $this->input->post('fullname') ?? $row->name; ?>" class="form-control">
                            <?= form_error('fullname'); ?>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null; ?>">
                            <label for="username">Username *</label>
                            <input type="text" name="username" id="username" value="<?= $this->input->post('username') ?? $row->username; ?>" class="form-control">
                            <?= form_error('username'); ?>
                        </div>
                        <div class="form-group <?= form_error('password1') ? 'has-error' : null; ?>">
                            <label for="password1">Password</label> <small>(Birkan kosong jika tidak di ganti)</small>
                            <input type="password" name="password1" id="password1" value="<?= $this->input->post('password1'); ?>" class="form-control">
                            <?= form_error('password1'); ?>
                        </div>
                        <div class="form-group <?= form_error('password2') ? 'has-error' : null; ?>">
                            <label for="password2">Konfirmasi Password</label>
                            <input type="password" name="password2" id="password2" value="<?= $this->input->post('password2'); ?>" class="form-control">
                            <?= form_error('password2'); ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control"><?= $this->input->post('address') ?? $row->address; ?></textarea>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null; ?>">
                            <label for="level">Level *</label>
                            <select name="level" id="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level; ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null; ?>>Kasir</option>
                            </select>
                            <?= form_error('level'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-paper-plane"></i> Save</button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>