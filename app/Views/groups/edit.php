<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Groups &mdash; Marrieds</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Groups Page</h1>
    </div>

    <div class="section-body">
        <div class="table-responsive">
            <div class="card">
                <div class="card-header">
                    <div class="section-header-back mr-4">
                        <a href="<?= site_url('groups') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h4>Ubah Data Groups</h4>
                </div>
                <div class="card-body col-md-6">
                    <form action="<?= site_url('groups/update/' . $groups->id_groups) ?>" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="">Nama groups</label>
                            <input type="text" name="name_groups" value="<?= $groups->name_groups ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Informasi groups</label>
                            <textarea name="info_groups" class="form-control"><?= $groups->info_groups ?> </textarea>
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