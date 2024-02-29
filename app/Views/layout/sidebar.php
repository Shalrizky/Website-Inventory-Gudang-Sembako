<nav class="sidebar sidebar-offcanvas" id="sidebar">
   <ul class="nav">
      <li class="nav-item">
         <a class="nav-link" href="<?= base_url('Dashboard') ?>">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Dashboard</span>
         </a>
      </li>
      <li class="nav-item nav-category">Master Stock</li>
      <li class="nav-item">
         <a class="nav-link" data-bs-toggle="collapse" href="#master-stock" aria-expanded="false" aria-controls="#master-stock">
            <i class="menu-icon mdi mdi-truck"></i>
            <span class="menu-title">Arus Stock</span>
            <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="master-stock">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="<?= base_url('Penerimaan_Barang') ?>">Penerimaan Barang</a></li>
               <li class="nav-item">  <a class="nav-link" href="<?= base_url('Pengeluaran_Barang') ?>">Pengeluaran Barang</a>
            </ul>
         </div>
      </li>
      <li class="nav-item nav-category">Master Retur</li>
      <li class="nav-item">
         <a class="nav-link" data-bs-toggle="collapse" href="#master-retur" aria-expanded="false" aria-controls="master-retur">
            <i class="menu-icon mdi mdi-file-document"></i>
            <span class="menu-title">Daftar Retur</span>
            <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="master-retur">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link"href="<?= base_url('Retur_Pembelian') ?>">Retur Pembelian</a></li>
               <li class="nav-item"> <a class="nav-link" href=<?= base_url('Retur_Penjualan') ?>>Retur Penjualan</a></li>
            </ul>
         </div>
      </li>
     
   </ul>
</nav>