<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="col-lg-12 mb-3">
   <div class="row mb-3">
      <div class="col-12">
         <h3>Penerimaan Barang</h3>
         <p>Monitor Inventory Gudang</p>
      </div>
   </div>
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
               <option value="Stock Out">Stock Out</option>
               <option value="Perlu Retur">Perlu Retur</option>
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

   <div class="row">
      <div class="col-md-12">
         <?php foreach ($pembelianBarang as $pembelian) : ?>
            <!-- Card 1 -->
            <div class="card mb-3 purchase-card" data-status="<?= $pembelian['status'] ?>">
               <div class="card-body">
                  <div class="row ms-3">
                     <div class="col-md-3">
                        <h6 class="card-title">
                           <img src="<?= $pembelian['gambar_brg']; ?>" alt="" width="50px">
                           <?= $pembelian['nama_brg'] ?>
                        </h6>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Kode Produk:</strong> <?= $pembelian['kd_brg'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Jumlah Restock:</strong> <?= $pembelian['jumlah_pembelian'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Tanggal Beli:</strong> <?= $pembelian['tgl_pembelian'] ?></p>
                     </div>
                  </div>
                  <!-- Divider -->
                  <div class="row">
                     <div class="col-12">
                        <hr>
                     </div>
                  </div>
                  <div class="row ms-4 pt-3">
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Kadaluarsa:</strong> <?= $pembelian['tgl_kadaluarsa_pembelian'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Supplier:</strong> <?= $pembelian['nama_supplier'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Status:</strong> <label class="badge badge-<?= $pembelian['status'] == 'In Progress' ? 'warning' : ($pembelian['status'] == 'Stock In' ? 'success' : 'danger'); ?>"> <?= $pembelian['status'] ?></label></p>
                     </div>
                     <div class="col-3 pt-2">
                        <button type="button" class="float-end btnPenerimaanDetail" data-toggle="modal" data-target="#exampleModal-<?= $pembelian['id_pembelian'] ?>">Detail</button>
                     </div>
                  </div>
               </div>
            </div>
            <div id="dataNotFoundMessage" class="text-center fw-20" style="display: none; color:red;">
               Dataset not Found.
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal-<?= $pembelian['id_pembelian'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <img src="<?= $pembelian['gambar_brg']; ?>" alt="" width="50px">
                        <h4 class="modal-title fw-bold" id="exampleModalLabel"><?= $pembelian['nama_brg'] ?></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <div class="container align-items-center">
                           <div class="row ">
                              <div class="col-6">
                                 <p class="fs-18"><strong>Merek:</strong> <?= $pembelian['nama_merek'] ?></p>
                              </div>
                              <div class="col-6">
                                 <p class="fs-18"><strong>Kode Produk:</strong> <?= $pembelian['kd_brg'] ?></p>
                              </div>
                              <div class="col-6">
                                 <p class="fs-18"><strong>Tanggal Beli:</strong> <?= $pembelian['tgl_pembelian'] ?></p>
                              </div>
                              <div class="col-6">
                                 <p class="fs-18"><strong>Tanggal Kadaluarsa:</strong> <?= $pembelian['tgl_kadaluarsa_pembelian'] ?></p>
                              </div>
                              <div class="col-6">
                                 <p class="fs-18"><strong>Nama Supplier:</strong> <?= $pembelian['nama_supplier'] ?></p>
                              </div>
                              <div class="col-6">
                                 <p class="fs-18"><strong>Jumlah Restock:</strong> <?= $pembelian['jumlah_pembelian'] ?></p>
                              </div>

                              <div class="col-6">
                                 <p class="badge badge-<?= $pembelian['status'] == 'In Progress' ? 'warning' : ($pembelian['status'] == 'Stock In' ? 'success' : 'danger'); ?>" ?><?= $pembelian['status'] ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <form action="<?= base_url('dashboard/approve_pembelian/' . $pembelian['id_pembelian']) ?>" method="post" id="formApprove<?= $pembelian['id_pembelian'] ?>">
                           <input type="hidden" name="id_pembelian" value="<?= $pembelian['id_pembelian'] ?>">
                           <button type="submit" class="btn btn-success float-end btnApprove mx-3" data-id="<?= $pembelian['id_pembelian'] ?>" <?= in_array($pembelian['status'], ['Stock In', 'Perlu Retur', 'Stock Out']) ? 'disabled' : '' ?>>
                              <i class="mdi mdi-thumb-up"></i> Approve
                           </button>
                           <button type="button" class="btn btn-danger float-end btnVoid" data-id="<?= $pembelian['id_pembelian'] ?>" data-toggle="modal" data-target="#voidModal<?= $pembelian['id_pembelian'] ?>" <?= in_array($pembelian['status'], ['Stock In', 'Perlu Retur', 'Stock Out']) ? 'disabled' : '' ?>>
                              <i class="mdi mdi-close-thick"></i> Void
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END MODAL DETAIL -->
            <!-- Modal for Void -->
            <div class="modal fade" id="voidModal<?= $pembelian['id_pembelian'] ?>" tabindex="-1" aria-labelledby="voidModalLabel" aria-hidden="true">
               <div class="modal-dialog"> <!-- Tambahkan class modal-lg di sini -->
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="voidModalLabel">Pengembalian Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <form action="<?= base_url('dashboard/void_pembelian/' . $pembelian['id_pembelian']) ?>" method="post">
                           <h6 class="fw-300 mb-3" for="alasanVoid">Tuliskan Alasan dan Jumlah Pengembalian Barang</h6>
                           <div class="form-group form-floating">
                              <input type="number" class="form-control" id="jumlahRetur" name="jumlah_retur" placeholder="Jumlah Retur" required>
                              <label for="jumlahRetur">Jumlah Retur</label>
                           </div>
                           <div class="mb-3 form-floating">
                              <textarea class="form-control" placeholder="Leave a comment here" name="keterangan" style="height: 100px" required></textarea>
                              <label for="alasanVoid">Keterangan/Alasan</label>
                           </div>
                           <button type="submit" class="btn btn-danger">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
         <div class="row">
            <div class="col-md-12">
               <?= $pager->links('pembelian', 'myPagination') ?>
            </div>
         </div>
      </div>
   </div>

   <script>
      document.addEventListener('DOMContentLoaded', function() {
         var btnShowDetailModals = document.querySelectorAll('.btnPenerimaanDetail');
         var btnApprove = document.querySelectorAll('.btnApprove');
         var btnVoid = document.querySelectorAll('.btnVoid');
         var detailModal;

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
         
         // Function to handle the display of the detail modal
         function showDetailModal(btnShowDetailModal) {
            var targetModalId = btnShowDetailModal.getAttribute('data-target');
            detailModal = new bootstrap.Modal(document.querySelector(targetModalId));
            detailModal.show();
         }

         // Function to handle the display of the void modal
         function showVoidModal(btnVoid) {
            var targetModalId = btnVoid.getAttribute('data-target');
            var voidModal = new bootstrap.Modal(document.querySelector(targetModalId));
            voidModal.show();
            if (detailModal) {
               detailModal.hide();
            }
         }

         // Event listeners for detail modals
         btnShowDetailModals.forEach(function(btnShowDetailModal) {
            btnShowDetailModal.addEventListener('click', function() {
               showDetailModal(btnShowDetailModal);
            });
         });

         // Event listeners for void modals
         btnVoid.forEach(function(btnVoid) {
            btnVoid.addEventListener('click', function() {
               showVoidModal(btnVoid);
            });
         });

         // Event listener for void modal hidden
         var voidModalElement = document.querySelector('#voidModal');
         if (voidModalElement) {
            voidModalElement.addEventListener('hidden.bs.modal', function() {
               if (detailModal) {
                  detailModal.show();
               }
            });
         }

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
         const approveSuccess = <?= json_encode(session('success')) ?>;
         if (approveSuccess) {
            displaySuccessMessage('success', 'Stok Barang Berhasil Diterima', 'OK', 'Dashboard');
         }

         // Display success message for void
         const voidSuccess = <?= json_encode(session('successVoid')) ?>;
         if (voidSuccess) {
            displaySuccessMessage('success', 'Barang Ditambahkan Ke Daftar Retur', 'OK', 'Dashboard');
         }
      });
   </script>
</div>

<?= $this->endSection() ?>