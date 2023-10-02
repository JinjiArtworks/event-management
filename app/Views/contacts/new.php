<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<title>Contacts &mdash; Marrieds</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Contacts Page</h1>
    </div>

    <div class="section-body">
        <div class="table-responsive">
            <div class="card">
                <div class="card-header">
                    <div class="section-header-back mr-4">
                        <a href="<?= site_url('contacts') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h4>Tambah Data Contacts</h4>
                </div>
                <div class="card-body col-md-6">
                    <?php $erros = session()->getFlashdata('errors'); ?>
                    <form action="<?= site_url('contacts') ?>" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="">Nama Kontak</label>
                            <input type="text" name="name_contacts" class="form-control  <?= isset($errors['name_contacts']) ? 'is-invalid' : null ?>" value=" <?= old('name_contacts') ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['groups_id']) ? $erros['groups_id'] : null ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Group Contacts</label>
                            <select name="groups_id" id="" class="form-control <?= isset($errors['groups_id']) ? 'is-invalid' : null ?>">
                                <option value="" hidden></option>
                                <?php foreach ($groups as $item => $value) : ?>
                                    <option value="<?= $value->id_groups ?>" <?= old('id_groups') == $value->id_groups ? 'selected' : null ?>>
                                        <?= $value->name_groups ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errors['groups_id']) ? $erros['groups_id'] : null ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alias </label>
                            <input type="text" name="alias_contacts" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Handphone </label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" class="form-control"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Informasi Contacts</label>
                            <textarea name="info_contacts" class="form-control"> </textarea>
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