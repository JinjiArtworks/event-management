<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Gawe &mdash; Marrieds</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Gawe Page</h1>
    </div>

    <div class="section-body">
        <div class="table-responsive">
            <div class="card">
                <div class="card-header">
                    <div class="section-header-back mr-4">
                        <a href="<?= site_url('gawe') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h4>Ubah Data Gawe</h4>
                </div>
                <div class="card-body col-md-6">
                    <form action="<?= site_url('gawe/' . $gawe->id) ?>" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="">Nama Gawe</label>
                            <input type="text" name="name" value="<?= $gawe->name ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Gawe</label>
                            <input type="date" name="date" value="<?= $gawe->date ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Informasi Gawe</label>
                            <textarea name="info" class="form-control"><?= $gawe->info ?> </textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success"> <i class="fas fa-paper-plane mr-2"></i>Save</button>
                            <button type="reset" class="btn btn-secondary"> Reset</button>
                        </div>
                    </form>
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