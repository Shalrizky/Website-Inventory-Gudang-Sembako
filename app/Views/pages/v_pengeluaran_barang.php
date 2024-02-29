<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="col-lg-12 mb-3">
   <h3>List Pengeluaran Barang</h3>
   <p>Monitor Inventory Gudang</p>
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
         <?php foreach ($penjualanBarang as $penjualan) : ?>
            <?php
            $id_pelanggan = $penjualan['id_pelanggan'];
            ?>
            <div class="card mb-3 purchase-card" data-status="<?= $penjualan['status'] ?>">
               <div class="card-body">
                  <div class="row ms-3">
                     <div class="col-md-3">
                        <div class="card-title d-flex align-items-center">
                           <i class="mdi mdi-account" style="font-size: 40px"></i>
                           <h4 class="ms-2"><?= $penjualan['nama_pelanggan'] ?></h4>
                        </div>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>No Ref:</strong> <?= $penjualan['no_ref'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Jumlah Barang Dipesan:</strong> <?= $penjualan['jumlah_brg_dipesan'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Tanggal Pemesanan:</strong> <?= $penjualan['tgl_pemesanan'] ?></p>
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
                        <p class="card-text fs-6"><strong>Tanggal Pengajuan:</strong> <?= $penjualan['tgl_pengajuan'] ?></p>
                     </div>
                     <div class="col-4 pt-2">
                        <p class="card-text fs-6"><strong>Status:</strong> <label class="badge badge-<?= $penjualan['status'] == 'In Progress' ? 'warning' : ($penjualan['status'] == 'Stock Out' ? 'success' : 'danger'); ?>"> <?= $penjualan['status'] ?></label></p>
                     </div>
                     <div class="col-4 pt-2">
                        <button type="button" class="float-end btnPenerimaanDetail" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $penjualan['id_pelanggan'] ?>">Detail</button>
                     </div>
                  </div>
                  <div id="dataNotFoundMessage" class="text-center fw-20" style="display: none; color:red;">
                     Dataset not Found.
                  </div>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal-<?= $penjualan['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <i class="mdi mdi-account" style="font-size: 40px"></i>
                              <h4 class="ms-2"><?= $penjualan['nama_pelanggan'] ?></h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <div class="container align-items-center">
                                 <div class="row">
                                    <div class="col-6">
                                       <p class="fs-18"><strong>Tanggal Pengajuan:</strong> <?= $penjualan['tgl_pengajuan'] ?></p>
                                    </div>
                                    <div class="col-6">
                                       <p class="fs-18"><strong>Tanggal Dipesan:</strong> <?= $penjualan['tgl_pemesanan'] ?></p>
                                    </div>
                                    <div class="col-6">
                                       <p class="fs-18"><strong>No Ref:</strong> <?= $penjualan['no_ref'] ?></p>
                                    </div>
                                    <div class="col-6">
                                       <p class="fs-18"><strong>Jumlah Barang Dipesan:</strong> <?= $penjualan['jumlah_brg_dipesan'] ?></p>
                                    </div>
                                    <div class="col-6">
                                       <p class="fs-18"><strong>Daftar Barang:</strong></p>
                                       <?php foreach ($detailPengeluaran[$id_pelanggan] as $detail) : ?>
                                          <p class="fs-18"><strong>-</strong> <?= $detail['nama_brg'] ?>: <?= $detail['jumlah_barang'] ?></p>
                                       <?php endforeach; ?>
                                    </div>
                                    <div class="col-6">
                                       <label class="badge badge-<?= $penjualan['status'] == 'In Progress' ? 'warning' : ($penjualan['status'] == 'Stock In' ? 'success' : 'danger'); ?>"> <?= $penjualan['status'] ?></label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <form action="<?= base_url('dashboard/approve_pengeluaran/' . $penjualan['id_pelanggan']) ?>" method="post" id="formApprovePengeluaran<?= $penjualan['id_pelanggan'] ?>">
                                 <input type="hidden" name="id_pelanggan" value="<?= $penjualan['id_pelanggan'] ?>">
                                 <button type="submit" class="btn btn-success float-end btnApprovePengeluaran mx-3" data-id="<?= $penjualan['id_pelanggan'] ?>" <?= in_array($penjualan['status'], ['Stock Out']) //? 'disabled' : '' 
                                                                                                                                                                  ?>>
                                    <i class="mdi mdi-thumb-up"></i> Approve
                                 </button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End Card 1 -->
         <?php endforeach; ?>
         <div class="row">
            <div class="col-md-12">
               <?= $pager->links('pengeluaran', 'myPagination') ?>
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
      const approveSuccess = <?= json_encode(session('successPengeluaran')) ?>;
      if (approveSuccess) {
         displaySuccessMessage('success', 'Stok Barang Berhasil Diterima', 'OK', 'Dashboard');
      }
   });
</script>

<?= $this->endSection() ?>