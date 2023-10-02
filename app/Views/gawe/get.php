<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Gawe &mdash; Marrieds</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Gawe Page</h1>
        <div class="section-header-button">
            <a href="<?= site_url('gawe/add') ?>" class="btn btn-primary">Tambah Data</a>
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
                    <h4>Data Gawe</h4>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Informasi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gawe as $item => $value) : ?>
                                    <tr>
                                        <td><?= $item + 1 ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= date('d/m/Y', strtotime($value->date))  ?></td>
                                        <td><?= $value->info ?></td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= site_url('gawe/edit/' . $value->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form method="POST" action="delete/<?= $value->id; ?>" class="d-inline" id="del-<?= $value->id ?>">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah anda yakin ?" data-confirm-yes="submitDel(<?= $value->id ?>)"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                        <!-- <a href="#" class="btn btn-secondary">Detail</a> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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