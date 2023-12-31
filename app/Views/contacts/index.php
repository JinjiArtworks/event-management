<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Contacts &mdash; Marrieds</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Contacts Page</h1>
        <div class="section-header-button">
            <a href="<?= site_url('contacts/new') ?>" class="btn btn-primary">Tambah Data Kontak</a>
        </div>
    </div>

    <div class="section-body">
        <div class="table-responsive">
            <?php if (session()->getFlashdata('Success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Success!</b>
                        <?= session()->getFlashdata('Success') ?>
                    </div>
                </div>
            <?php elseif (session()->getFlashdata('Error')) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Gagal!</b>
                        <?= session()->getFlashdata('Error') ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card">

                <div class="card-header">
                    <h4>Data contacts</h4>

                </div>
                <div class="card-header">
                    <form action="" method="GET" autocomplete="off">
                        <div class="float-left">
                            <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control" style="width:155pt;" placeholder="Keyword Pencarian">
                        </div>
                        <div class="float-right ml-2">
                            <button type="submit" class="btn btn-primary "> <i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <!-- id ="table1" -->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kontak</th>
                                    <th>Alias</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Info</th>
                                    <th>Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $no = 1 + (10 * ($page - 1)); // dimulai dri angka 1
                                foreach ($contacts as $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->name_contacts ?></td>
                                        <td><?= $value->alias_contacts ?></td>
                                        <td><?= $value->phone ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->address ?></td>
                                        <td><?= $value->info_contacts ?></td>
                                        <td><?= $value->name_groups ?></td>
                                        <td class="text-center" style="width: 15%">
                                            <a href="<?= site_url('contacts/' . $value->id_contacts . '/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form method="POST" action=" <?= site_url('contacts/' . $value->id_contacts) ?>" class=" d-inline" id="del-<?= $value->id_contacts ?>">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah anda yakin ?" data-confirm-yes="submitDel(<?= $value->id_contacts ?>)"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                        <!-- <a href="#" class="btn btn-secondary">Detail</a> -->

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="float-left">
                            <i>Showing <?= 1 + (10 * ($page - 1)); ?> to <?= $no - 1 ?> of <?= $pager->getTotal() ?> entries</i>
                        </div>
                        <div class="float-right">
                            <?= $pager->links('default', 'pagination') ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>