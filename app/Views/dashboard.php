<?= $this->extend('layout/master'); ?>
<?= $this->section('content'); ?>
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-hotel"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Hotel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-air-freshener"></i>
                <span>Fasilitas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kamar') ?>">
                <i class="fas fa-bed"></i>
                <span>Kamar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('booking') ?>">
                <i class="fas fa-book-reader"></i>
                <span>Booking</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('username') ?></span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Fasilitas</h6>
                        <div class="tambahmodal">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahfasilitas">
                                Tambah Fasilitas
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="tambahfasilitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php echo form_open_multipart('dashboard/tambahFasilitas') ?>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="fasilitas" class="fs-4">Fasilitas</label>
                                                <textarea name="fasilitas" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (session()->getFlashdata('tambah')) {
                        echo '<div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
                        <span aria-hidden="true">×</span></button><h6>';
                        echo session()->getFlashdata('tambah');
                        echo '</h6>
                        </div>';
                    } ?>
                    <?php
                    if (session()->getFlashdata('edit')) {
                        echo '<div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
                        <span aria-hidden="true">×</span></button><h6>';
                        echo session()->getFlashdata('edit');
                        echo '</h6>
                        </div>';
                    } ?>
                    <?php
                    if (session()->getFlashdata('delete')) {
                        echo '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">
                        <span aria-hidden="true">×</span></button><h6>';
                        echo session()->getFlashdata('delete');
                        echo '</h6>
                        </div>';
                    } ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width='5%'>No</th>
                                        <th width='85%'>Fasilitas</th>
                                        <th width='10%'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($fasilitas as $key => $value) {
                                        $no++; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $value['fasilitas'] ?></td>
                                            <td>
                                                <button class="btn btn-primary action" data-toggle="modal" data-target="#edit<?= $value['id_fasilitas'] ?>">Edit</button>
                                                <button class="btn btn-danger action" data-toggle="modal" data-target="#delete<?= $value['id_fasilitas'] ?>">delete</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php foreach ($fasilitas as $key => $value) { ?>
                        <!-- Modal Edit-->
                        <div class="modal fade" id="edit<?= $value['id_fasilitas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Fasilitas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php echo form_open_multipart('dashboard/editFasilitas/' . $value['id_fasilitas']) ?>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="fasilitas" class="fs-4">Fasilitas</label>
                                            <textarea name="fasilitas" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $value['fasilitas'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Modal Edit -->
                    <!-- Model Delete -->
                    <?php foreach ($fasilitas as $key => $value) { ?>
                        <!-- Modal Edit-->
                        <div class="modal fade" id="delete<?= $value['id_fasilitas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Fasilitas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php echo form_open_multipart('dashboard/deleteFasilitas/' . $value['id_fasilitas']) ?>
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus Fasilitas <?= $value['fasilitas'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Modal Delete -->
                </div>
                <!-- Enc Content Row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Sistem Informasi Hotel 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        <?= $this->endSection(); ?>