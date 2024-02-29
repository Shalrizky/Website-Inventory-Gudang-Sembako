<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="col-lg-12 mb-3">
   <div class="row mb-3">
      <div class="col-9">
         <h3>Retur Pembelian</h3>
         <p>Monitor Retur Pembelian Barang</p>
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
         <?php foreach ($returPembelian as $retur) : ?>
            <!-- Card 1 -->
            <div class="card mb-3 purchase-card" data-status="<?= $retur['status_retur'] ?>">
               <div class="card-body">
                  <div class="row ms-3">
                     <div class="col-md-3">
                        <h6 class="card-title">
                           <img src="<?= $retur['gambar_brg']; ?>" alt="" width="50px">
                           <?= $retur['nama_brg'] ?>
                        </h6>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Kode Produk:</strong> <?= $retur['kd_brg'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Jumlah Stok Diretur:</strong> <?= $retur['jumlah_retur'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Supplier:</strong> <?= $retur['nama_supplier'] ?></p>
                     </div>
                  </div>
                  <div class="row ms-4 pt-3">
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Tanggal Diterima:</strong> <?= $retur['created_at'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Tanggal Retur:</strong> <?= $retur['updated_at'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Stok Saat Ini:</strong> <?= $retur['jumlah_stok'] ?></p>
                     </div>
                     <div class="col-3 pt-2">
                        <p class="card-text fs-6"><strong>Status:</strong> <label class="badge badge-<?= $retur['status_retur'] == 'Perlu Retur' ? 'danger' : ($retur['status_retur'] == 'Stock Out' ? 'danger' : 'success'); ?>"> <?= $retur['status_retur'] ?></label></p>
                     </div>
                  </div>

                  <!-- Divider -->
                  <div class="row">
                     <div class="col-12">
                        <hr>
                     </div>
                  </div>

                  <div class="row ms-4 pt-3">
                     <div class="col-8 pt-2">
                        <p class="card-text fs-6"><strong>Keterangan:</strong> <?= $retur['keterangan'] ?></p>
                     </div>
                     <div class="col-4 pt-2">
                        <form id="returForm<?= $retur['id_retur_pembelian'] ?>" action="<?= base_url('dashboard/proses_retur/' . $retur['id_retur_pembelian']) ?>" method="post">
                           <button type="button" class=" float-end btnRetur" data-retur-id="<?= $retur['id_retur_pembelian'] ?>" <?= $retur['status_retur'] === 'Stock Out' ? 'disabled' : '' ?>>
                              Retur
                           </button>
                        </form>

                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
         <div class="row">
            <div class="col-md-12">
               <?= $pager->links('retur_pembelian', 'myPagination') ?>
            </div>
         </div>
      </div>
   </div>
   <div id="dataNotFoundMessage" class="text-center fw-20" style="display: none; color:red;">
      Dataset not Found.
   </div>

   <script>
      document.addEventListener('DOMContentLoaded', function() {

         var btnReturs = document.querySelectorAll('.btnRetur');

         btnReturs.forEach(function(btnRetur) {
            btnRetur.addEventListener('click', function() {
               var returId = btnRetur.getAttribute('data-retur-id');

               Swal.fire({
                  title: 'Apakah Anda Yakin?',
                  text: 'Anda akan melakukan proses retur barang.',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Ya, Retur Barang',
                  cancelButtonText: 'Batal'
               }).then((result) => {
                  if (result.isConfirmed) {
                     // If the user clicks "Ya, Retur Barang", submit the form
                     document.getElementById('returForm' + returId).submit();
                  }
               });
            });
         });

         // Event listener for search input change
         document.getElementById('searchInput').addEventListener('input', function() {
            var searchQuery = this.value.trim().toLowerCase();
            var selectedStatus = document.getElementById('selectStatus').value;
            document.getElementById('selectStatus').value = '';
            filterPurchasesRetur(searchQuery, selectedStatus);
         });

         // Event listener for status dropdown change
         document.getElementById('selectStatus').addEventListener('change', function() {
            var searchQuery = document.getElementById('searchInput').value.trim().toLowerCase();
            var selectedStatus = this.value;
            document.getElementById('searchInput').value = '';
            filterPurchasesRetur(searchQuery, selectedStatus);
         });

         function filterPurchasesRetur(searchQuery, status) {
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
               dataNotFoundMessage.style.display = 'block';
            } else {
               dataNotFoundMessage.style.display = 'none';
            }
         }

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

         const returSuccess = <?= json_encode(session('successRetur')) ?>;
         if (returSuccess) {
            displaySuccessMessage('success', 'Stok Barang Berhasil Diretur', 'OK', 'Dashboard');
         }

      });
   </script>
</div>

<?= $this->endSection() ?>