<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('create-db', function () {
   $forge = \Config\Database::forge();
   if ($forge->createDatabase('jbs_inventory', true)) {
      echo 'Database created!';
   }
});

$routes->get('/', 'Login::index', ['as' => 'login']);
$routes->post('/login', 'Login::authenticate', ['as' => 'authenticate']);
$routes->get('/Dashboard', 'Dashboard::index_dashboard');
$routes->get('/Penerimaan_Barang', 'Dashboard::penerimaan_barang');
$routes->get('/Pengeluaran_Barang', 'Dashboard::pengeluaran_barang');
$routes->get('/Retur_Pembelian', 'Dashboard::retur_pembelian');
$routes->get('/Retur_Penjualan', 'Dashboard::retur_penjualan');
$routes->post('/Penerimaan_Barang/approve_pembelian/(:num)', 'Dashboard::approvePembelian/$1', ['as' => 'approve_pembelian']);
$routes->post('/Penerimaan_Barang/void_pembelian/(:num)', 'Dashboard::void_pembelian/$1', ['as' => 'void_pembelian']);
$routes->post('/Retur_Pembelian/proses_retur/(:num)', 'Dashboard::proses_retur/$1', ['as' => 'proses_retur']);
$routes->post('/Pengeluaran_Barang/approve_pengeluaran/(:num)', 'Dashboard::approve_pengeluaran/$1', ['as' => 'approve_pengeluaran']);
$routes->post('/Retur_Penjualan/proses_retur_penjualan/(:num)', 'Dashboard::proses_retur_penjualan/$1', ['as' => 'proses_retur_penjualan']);

$routes->setAutoRoute(true);
