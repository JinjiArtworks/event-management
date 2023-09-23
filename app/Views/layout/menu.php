<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li><a href="<?= site_url('/home') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
    <li><a href="<?= site_url('gawe') ?>" class="nav-link" href="blank.html"><i class="far fa-calendar"></i> <span>Gawe Acara</span></a></li>

    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-address-book"></i> <span>Kontak</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url('groups') ?>">Grup Kontak</a></li>
            <li><a class="nav-link" href="<?= site_url('contacts') ?>">Kontak Saya</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-envelope"></i> <span>Undangan</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Saya Mengundang</a></li>
            <li><a class="nav-link" href="layout-default.html">Saya Diundang</a></li>
        </ul>
    </li>
</ul>