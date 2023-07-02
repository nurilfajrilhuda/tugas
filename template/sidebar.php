<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $main_url ?>dashboard.php" class="brand-link">
      <img src="<?= $main_url ?>asset/image/logo-scania.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">nfh trans</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $main_url ?>asset/image/<?= userLogin()['foto'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= 'nuril' ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="<?= $main_url ?>dashboard.php" class="nav-link <?= menuHome() ?>">
              <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
                <p>DASHBOARD</p>
              </a>
          </li>
          <?php
              if (userLogin()['level'] != 3) {
          ?>
          <li class="nav-item <?= menuMaster() ?>">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder text-sm"></i>
                  <p>
                    MASTER 
                    <i class="fas fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= $main_url ?>krubus/data-krubus.php" class="nav-link <?= menuKrubus() ?>">
                      <i class="far fa-circle nav-icon text-sm"></i>
                      <p>KRU BUS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon text-sm"></i>
                      <p>PELANGGAN</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon text-sm"></i>
                      <p>BUS</p>
                    </a>
                  </li>
              </ul>
          </li>
          <?php } ?>
          <li class="nav-header">PEMBAYARAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart text-sm"></i>
              <p>PEMESANAN</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice text-sm"></i>
              <p>PEMBELIAN</p>
            </a>
          </li>
          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie text-sm"></i>
              <p>Laporan Pemesanan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line text-sm"></i>
              <p>Laporan Pembelian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse text-sm"></i>
              <p>Laporan Pembatalan</p>
            </a>
          </li>
          <?php
              if (userLogin()['level'] == 1) {
          ?>
          <li class="nav-item <?= menuSetting() ?>">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog text-sm"></i>
                  <p>
                    PENGATURAN
                    <i class="fas fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= $main_url ?>user/data-user.php" class="nav-link <?= menuUser() ?>">
                      <i class="far fa-circle nav-icon text-sm"></i>
                      <p>USER</p>
                    </a>
                  </li>
              </ul>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
