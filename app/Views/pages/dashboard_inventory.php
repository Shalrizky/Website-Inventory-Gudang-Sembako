<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="col-lg-12 mb-3">
   <h3>Inventory Gudang</h3>
   <p>Monitor Inventory Gudang</p>
   <!-- <?php if (!empty($alertMendekatiKadaluarsa)) : ?>
      <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
            <use xlink:href="#exclamation-triangle-fill" />
         </svg>
         <div class="d-flex flex-column">
            <h4>Perhatian!</h4>
            <?php foreach ($alertMendekatiKadaluarsa as $alert) : ?>
               <p><?= $alert['nama_brg'] ?> <?= $alert['pesan'] ?>.</p>
            <?php endforeach; ?>
         </div>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   <?php endif; ?>

   <?php foreach ($alertSudahKadaluarsa as $alert) : ?>
      <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="danger:">
            <use xlink:href="#exclamation-triangle-fill" />
         </svg>
         <div class="d-flex ">
            <h4>Perhatian! </h4>
            <h6 class="ms-2"></h6><?= $alert['nama_brg'] ?> <?= $alert['pesan'] ?>.
         </div>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   <?php endforeach; ?>
</div> -->
<div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">List Daftar Produk</h4>
         <div class="table-responsive ">
            <table class="table table-hover dataTable " id="myTable">
               <thead class="mt-2">
                  <tr>
                     <th>Kode Produk</th>
                     <th>Gambar Produk</th>
                     <th>Nama Produk</th>
                     <th>Merek</th>
                     <th>Stock</th>
                     <th>Jumlah Stock</th>
                     <th>Kadaluarsa</th>
                     <th>Updated At</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($barang as $produk) : ?>
                     <tr>
                        <td><?= $produk['kd_brg']; ?></td>
                        <td>
                           <img class="zoomable-image w-50 h-50" src="<?= $produk['gambar_brg']; ?>" alt="">
                        </td>
                        <td><?= $produk['nama_brg']; ?></td>
                        <td><?= $produk['nama_merek']; ?></td>
                        <td>
                           <label class="badge badge-<?= $produk['status_stok'] == 'Habis' ? 'danger' : ($produk['status_stok'] == 'Banyak' ? 'success' : 'warning'); ?>">
                              <?= $produk['status_stok']; ?>
                           </label>
                        </td>
                        <td><?= $produk['jumlah_stok']; ?></td>
                        <td><?= $produk['tgl_kadaluarsa']; ?></td>
                        <td><?= $produk['updated_at']; ?></td>
                     </tr>
                  <?php endforeach; ?>

                  <script>
                     document.addEventListener('DOMContentLoaded', function() {
                        const alertHabis = [];
                        const alertKurang = [];

                        <?php foreach ($barang as $produk) : ?>
                           <?php if ($produk['status_stok'] == 'Habis') : ?>
                              alertHabis.push('<?= $produk['nama_brg']; ?>');
                           <?php endif; ?>
                           <?php if ($produk['status_stok'] == 'Kurang') : ?>
                              alertKurang.push('<?= $produk['nama_brg'] . ':' . $produk['jumlah_stok']; ?>');
                           <?php endif; ?>
                        <?php endforeach; ?>

                        // const alertMessageKurang = 'Daftar Produk Kurang: ' + alertKurang.join(',');

                        // if (alertHabis.length > 0 && alertKurang.length > 0) {
                        //    const alertMessageHabis = 'Daftar Produk Habis: ' + alertHabis.join(', ');
                        //    showDangerToastForProduct(alertMessageHabis);
                        //    showWarningToastForProduct(alertMessageKurang, '');
                        // } else if (alertHabis.length > 0) {
                        //    // Show only "Habis" toast if there are "Habis" products
                        //    const alertMessageHabis = 'Daftar Produk Habis: ' + alertHabis.join(', ');
                        //    showDangerToastForProduct(alertMessageHabis);
                        // } else if (alertKurang.length > 0) {
                        //    // Show only "Kurang" toast if there are "Kurang" products
                        //    showWarningToastForProduct(alertMessageKurang, '');
                        // }
                     });
                  </script>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>


<?= $this->endSection() ?>