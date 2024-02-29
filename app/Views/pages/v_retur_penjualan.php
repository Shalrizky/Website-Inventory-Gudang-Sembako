<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="col-lg-12 mb-3">
   <h3>Retur Penjualan</h3>
   <p>Monitor Retur Penjualan</p>
   <div class="row">
      <div class="row mb-4">
         <!-- Status Select -->
         <div class="col-md-6 mb-2">
            <div class="input-group">
               <span class="input-group-text" style="border-radius: 12px 0 0px 12px;"><i class="mdi mdi-filter"></i></span>
               <select class="form-select" id="selectStatus" style="border-radius: 0 12px 12px 0; height:40px">
                  <option value="" disabled selected>Filter By Status</option>
                  <option value="">All</option>
                  <option value="In Progress">In Progress</option>
                  <option value="Stock In">Stock In</option>
               </select>
            </div>
         </div>

         <!-- Search Input -->
         <div class="col-md-6 mb-2">
            <div class="input-group">
               <span class="input-group-text" style="border-radius: 12px 0 0px 12px;"><i class="mdi mdi-magnify "></i></span>
               <input type="text" class="form-control" id="searchInput" placeholder="Search..." style="border-radius: 0 12px 12px 0; height:40px">
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <!-- Card 1 -->
         <div class="card mb-3 purchase-card">
            <div class="card-body">
               <div class="row ms-3">
                  <?php foreach ($returPenjualan as $retur) : ?>
                     <?php
                     $id_pelanggan = $retur['id_pelanggan'];
                     ?>
                     <div class="col-md-3">
                        <div class="card-title d-flex align-items-center">
                           <i class="mdi mdi-account" style="font-size: 40px"></i>
                           <h4 class="ms-2"><?= esc($retur['nama_pelanggan']) ?></h4>
                        </div>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>No Ref:</strong><?= esc($retur['no_ref']) ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Jumlah Barang Diretur:</strong> <?= esc($retur['jumlah_retur']) ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Tanggal Pembelian:</strong> <?= esc($retur['created_at']) ?></p>
                     </div>
               </div>
               <!-- Divider -->
               <div class="row">
                  <div class="col-12">
                     <hr>
                  </div>
               </div>
               <div class="row ms-4 pt-3">
                  <div class="col-4 pt-2">
                     <p class="card-text fs-6"><strong>Tanggal Retur:</strong> <?= esc($retur['updated_at']) ?></p>
                  </div>
                  <div class="col-4 pt-2">
                     <p class="card-text fs-6"><strong>Status:</strong> <label class="badge badge-<?= $retur['status_retur'] == 'Perlu Retur' ? 'warning' : ($retur['status_retur'] == 'Stock In' ? 'success' : 'success'); ?>"> <?= $retur['status_retur'] ?></label></p>
                  </div>
                  <div class="col-4 pt-2">
                     <button type="button" class="float-end btnPenerimaanDetail" data-bs-toggle="modal" data-bs-target="#exampleModal-4">Detail</button>
                  </div>
               </div>
               <div id="dataNotFoundMessage" class="text-center fw-20" style="display: none; color:red;">
                  Dataset not Found.
               </div>
               <!-- Modal -->
               <div class="modal fade" id="exampleModal-4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <i class="mdi mdi-account" style="font-size: 40px"></i>
                           <h4 class="ms-2"><?= esc($retur['nama_pelanggan']) ?></h4>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <div class="container align-items-center">
                              <div class="row">
                                 <div class="col-6">
                                    <p class="fs-18"><strong>Tanggal Pembelian:</strong><?= esc($retur['created_at']) ?></p>
                                 </div>
                                 <div class="col-6">
                                    <p class="fs-18"><strong>Tanggal Retur:</strong><?= esc($retur['tgl_pengajuan']) ?></p>
                                 </div>
                                 <div class="col-6">
                                    <p class="fs-18"><strong>No Ref:</strong> <?= esc($retur['no_ref']) ?></p>
                                 </div>
                                 <div class="col-6">
                                    <p class="fs-18"><strong>Jumlah Retur:</strong><?= esc($retur['jumlah_retur']) ?></p>
                                 </div>
                                 <div class="col-6">
                                    <p class="fs-18"><strong>Daftar Barang:</strong></p>
                                    <p class="fs-18"><?php foreach ($detailPenjualan[$id_pelanggan] as $detail) : ?>
                                          <p class="fs-18"><strong>-</strong> <?= $detail['nama_brg'] ?>: <?= $detail['jumlah_barang'] ?></p>
                                       <?php endforeach; ?></p>
                                 </div>
                                 <div class="col-6">
                                    <p class="card-text "><strong>Status:</strong> <label class="badge badge-<?= $retur['status_retur'] == 'Perlu Retur' ? 'warning' : ($retur['status_retur'] == 'Stock In' ? 'success' : 'success'); ?>"> <?= $retur['status_retur'] ?></label></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?>
                     <div class="modal-footer">
                        <form id="returForm<?= $retur['id_retur_penjualan'] ?>" action="<?= base_url('dashboard/proses_retur_penjualan/' . $retur['id_retur_penjualan']) ?>" method="post">
                           <button type="submit" class="float-end btnRetur btn btn-danger" data-retur-id="<?= $retur['id_retur_penjualan'] ?> " <?= $retur['status_retur'] === 'Stock Out' ? '' : '' ?>>
                              Retur <!-- Tombol untuk memproses retur -->
                           </button>
                        </form>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Card 1 -->
         <div class="row">
            <div class="col-md-12">

            </div>
         </div>
      </div>
   </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
      // No need for individual buttons, use a general class
      var btnPenerimaanDetails = document.querySelectorAll('.btnPenerimaanDetail');

      // Event listener for search input change
      document.getElementById('searchInput').addEventListener('input', function() {
         var searchQuery = this.value.trim().toLowerCase();
         var selectedStatus = document.getElementById('selectStatus').value;
         // Clear the selected option when the search input changes
         document.getElementById('selectStatus').value = '';
         filterPurchases(searchQuery, selectedStatus);
      });

      // Event listener for status dropdown change
      document.getElementById('selectStatus').addEventListener('change', function() {
         var searchQuery = document.getElementById('searchInput').value.trim().toLowerCase();
         var selectedStatus = this.value;
         document.getElementById('searchInput').value = '';
         filterPurchases(searchQuery, selectedStatus);
      });

      function filterPurchases(searchQuery, status) {
         var purchaseCards = document.querySelectorAll('.purchase-card');
         var dataNotFoundMessage = document.getElementById('dataNotFoundMessage');
         var foundData = false;

         purchaseCards.forEach(function(card, index) {
            var cardStatus = card.getAttribute('data-status');
            var cardTextContent = card.innerText.toLowerCase();

            if ((!searchQuery || cardTextContent.includes(searchQuery)) &&
               (!status || cardStatus === status)) {
               card.style.display = 'block';
               foundData = true;
            } else {
               card.style.display = 'none';
            }
         });

         if (!foundData) {
            // Jika data tidak ditemukan, tampilkan pesan
            dataNotFoundMessage.style.display = 'block';
         } else {
            // Jika ada data, sembunyikan pesan
            dataNotFoundMessage.style.display = 'none';
         }
      }

      btnPenerimaanDetails.forEach(function(btn) {
         btn.addEventListener('click', function() {
            // Use the Bootstrap modal method to show
            var modal = new bootstrap.Modal(document.getElementById("exampleModal"));
            modal.show();
         });
      });

      // Display success messages using SweetAlert
      function displaySuccessMessage(icon, title, buttonText, redirectUrl) {
         Swal.fire({
            icon: icon,
            title: title,
            confirmButtonText: buttonText,
            showDenyButton: true,
            denyButtonText: 'Dashboard'
         }).then((result) => {
            if (result.isDismissed || result.isDenied) {
               window.location.href = redirectUrl;
            }
         });
      }

      // Display success message for approval
      const approveSuccess = <?= json_encode(session('successReturPenjualan')) ?>;
      if (approveSuccess) {
         displaySuccessMessage('success', 'Retur Penjualan Berhasil di terima', 'OK', 'Dashboard');
      }
   });
</script>

<?= $this->endSection() ?>