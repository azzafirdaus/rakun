<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::group(array('prefix' => 'restoran'), function(){
	Route::get('/', function(){
        return View::make('restoran.restoran');
    });

	Route::post('/', 'RestoranController@restoran');
	
	Route::get('makanan', 'RestoranController@makanan');
	Route::post('makanan', 'RestoranController@makananReview');
	Route::post('makanan/order', 'RestoranController@makananBeli');

	Route::get('minuman', 'RestoranController@minuman');
	Route::post('minuman', 'RestoranController@minuman');

	Route::get('rokok', 'RestoranController@rokok');
	Route::post('rokok', 'RestoranController@rokok');

});


//Bar
Route::get('barPreMenu', 'BarController@barPreMenu');
Route::post('barPreMenu', 'BarController@barPreMenuProcess');
Route::get('barMenu', 'BarController@barMenu');
Route::post('barMenu', 'BarController@add');
Route::post('barMenuAdd', 'BarController@addOn');
Route::get('auth/barLogin', 'BarController@login');
Route::post('auth/barLogin', 'BarController@loginProcess');
Route::get('auth/barLogout', 'BarController@logout');
Route::post('barItemDelete', 'BarController@delete');
Route::post('barInvoice', 'BarController@barInvoice');
Route::post('backToBar', 'BarController@backToBar');
Route::post('barPrint', 'BarController@barPrint');

//bar 2
Route::get('bar2PreMenu', 'Bar2Controller@barPreMenu');
Route::post('bar2PreMenu', 'Bar2Controller@barPreMenuProcess');
Route::get('bar2Menu', 'Bar2Controller@barMenu');
Route::post('bar2Menu', 'Bar2Controller@add');
Route::post('bar2MenuAdd', 'Bar2Controller@addOn');
Route::get('auth/bar2Login', 'Bar2Controller@login');
Route::post('auth/bar2Login', 'Bar2Controller@loginProcess');
Route::get('auth/bar2Logout', 'Bar2Controller@logout');
Route::post('bar2ItemDelete', 'Bar2Controller@delete');
Route::post('bar2Invoice', 'Bar2Controller@barInvoice');
Route::post('backToBar2', 'Bar2Controller@backToBar');
Route::post('bar2Print', 'Bar2Controller@barPrint');

//bar3
Route::get('bar3PreMenu', 'Bar3Controller@barPreMenu');
Route::post('bar3PreMenu', 'Bar3Controller@barPreMenuProcess');
Route::get('bar3Menu', 'Bar3Controller@barMenu');
Route::post('bar3Menu', 'Bar3Controller@add');
Route::post('bar3MenuAdd', 'Bar3Controller@addOn');
Route::get('auth/bar3Login', 'Bar3Controller@login');
Route::post('auth/bar3Login', 'Bar3Controller@loginProcess');
Route::get('auth/bar3Logout', 'Bar3Controller@logout');
Route::post('bar3ItemDelete', 'Bar3Controller@delete');
Route::post('bar3Invoice', 'Bar3Controller@barInvoice');
Route::post('backToBar3', 'Bar3Controller@backToBar');
Route::post('bar3Print', 'Bar3Controller@barPrint');

//Cashier-Menu
Route::get('cashierMenu', 'CashierController@cashierMenu');
Route::get('cashierOpen', 'CashierController@cashierOpened');
Route::get('cashierClose', 'CashierController@cashierClosed');
Route::get('openTransaction', 'CashierController@openTransaction');
Route::get('closeTransaction', 'CashierController@closeTransaction');

//Cashier/Bar/Terapis-Cari
Route::get('cariCashier', 'CashierController@cari');
Route::post('cariCashier', 'CashierController@hasil_cari');
Route::get('cariTerapis', 'TerapisController@cari');
Route::post('cariTerapis', 'TerapisController@hasil_cari');
Route::get('cariBarPre', 'BarController@cariPre');
Route::post('cariBarPre', 'BarController@hasil_cariPre');

Route::get('cariBar2Pre', 'Bar2Controller@cariPre');
Route::post('cariBar2Pre', 'Bar2Controller@hasil_cariPre');

Route::get('cariBar3Pre', 'Bar3Controller@cariPre');
Route::post('cariBar3Pre', 'Bar3Controller@hasil_cariPre');
//Cashier-Login/Logout
Route::get('auth/cashierLogin', 'CashierController@login');
Route::post('auth/cashierLogin', 'CashierController@loginProcess');
Route::get('auth/cashierLogout', 'CashierController@logout');
//Cashier-Karaoke
Route::get('karaokeMenu', 'KaraokeController@karaokeMenu');
Route::post('karaokeStart', 'KaraokeController@karaokeStart');
Route::get('karaokeStop', 'KaraokeController@karaokeStop');
Route::post('karaokeEnd', 'KaraokeController@karaokeEnd');
Route::post('karaokePrint', 'KaraokeController@karaokePrint');
//Cashier-Register
Route::get('auth/register', 'RegisterController@register');
Route::post('auth/register', 'RegisterController@regisProcess');
Route::post('auth/registerInvoice', 'RegisterController@regisInvoice');
Route::post('registerPrint', 'RegisterController@regisPrint');
//Cashier-Pembayaran
Route::get('pembayaran', 'PembayaranController@pembayaran');
Route::post('pembayaran', 'PembayaranController@pembayaran_show');
Route::post('printTopUp', 'PembayaranController@printTopUp');
//Cashier-Pendapatan Terapis
Route::get('pendapatan-terapis', 'PembayaranController@pendapatan_terapis');
Route::post('pendapatan-terapis', 'PembayaranController@pendapatan_terapis_show');
Route::post('pendapatanPrint', 'PembayaranController@pendapatanPrint');
//Cashier-Stock
Route::get('stock', 'CashierController@stock');
Route::post('stock', 'CashierController@stock_update');
Route::get('stock_update', 'CashierController@stock_update');
Route::post('updateStock', 'CashierController@updateStock');
Route::post('itemDelete', 'CashierController@deleteItem');
Route::post('cashier_stock_print', 'CashierController@update_stock_print');

//Cashier-kosongkan-kartu
Route::get('kosongkanKartu', 'PembayaranController@kosongkanKartu');
Route::post('kosongkanKartu', 'PembayaranController@kosongkanSaldo');

//Terapis
Route::get('terapisMenu', 'TerapisController@terapisMenu');
Route::post('terapisMenu', 'TerapisController@konfirmasiTerapis');
Route::get('changeTerapis', 'TerapisController@changeTerapis');
Route::post('changeTerapis', 'TerapisController@changedTerapis');
Route::get('konfirmasiTerapis', 'TerapisController@konfirmasiTerapis');
Route::get('terapisConfirmMenu', 'TerapisController@terapisConfirmMenu');
Route::get('stopTerapisMenu', 'TerapisController@stopTerapisMenu');
Route::post('stopTerapis', 'TerapisController@stopTerapis');
Route::post('konfirmasiTerapis', 'TerapisController@konfirmasiTerapisFinish');
Route::get('free-terapis', 'TerapisController@free_terapis');
Route::get('terapisBayar', 'TerapisController@terapisBayar');
Route::post('terapisBayar', 'TerapisController@terapisBayarProcess');
Route::post('cekSaldo', 'TerapisController@cekTerapis');
Route::post('terapisPrint', 'TerapisController@terapisPrint');

//Terapis new menu
Route::get('menuTerapis', 'TerapisController@menuTerapis');
Route::post('menuTerapis', 'TerapisController@konfirmasiNaik');
Route::post('konfirmasiPelanggan', 'TerapisController@konfirmasiPelanggan');
Route::post('autoKonfirmasiTerapis', 'TerapisController@autoKonfirmasiTerapis');
Route::get('autoKonfirmasiTerapis', 'TerapisController@autoKonfirmasiTerapis');
Route::get('menuTerapisStop', 'TerapisController@menuTerapisStop');
Route::post('terapisStop', 'TerapisController@terapisStop');
Route::get('konfirmasiStopPelanggan', 'TerapisController@konfirmasiStopPelanggan');
Route::post('bayarTerapis', 'TerapisController@bayarTerapis');
Route::get('statusTerapis', 'TerapisController@statusTerapis');
Route::get('statusTerapis1', 'TerapisController@statusTerapis1');

Route::get('menuPelanggan', 'TerapisController@menuPelanggan');
Route::post('saldoCek', 'TerapisController@saldoCek');
Route::get('historiCek', 'TerapisController@historiCek');
Route::post('saldoPelanggan', 'TerapisController@saldoPelanggan');
Route::post('historiPelanggan', 'TerapisController@historiPelanggan');
Route::get('historiPelanggan', 'TerapisController@historiPelanggan');

//Admin
Route::get('auth/adminLogin', 'AdminController@adminLogin');
Route::post('auth/adminLogin', 'AdminController@adminLoginProcess');
Route::get('auth/adminLogout', 'AdminController@adminLogout');
Route::get('admin/pages/dashboard', 'AdminController@dashboard');
//Admin-Transaksi Keseluruhan
Route::get('admin/pages/transaksi-keseluruhan', 'AdminController@transaksi_keseluruhan');
//Admin-Pengguna
Route::get('admin/pages/pengguna', 'AdminController@pengguna');
Route::get('admin/pages/pengguna-create', 'AdminController@pengguna_create');
Route::post('admin/pages/pengguna-create', 'AdminController@pengguna_add');
Route::get('admin/pages/pengguna-update', 'AdminController@pengguna_update_data');
Route::post('admin/pages/pengguna-update', 'AdminController@pengguna_update');
Route::post('admin/pages/pengguna-delete', 'AdminController@pengguna_delete');
//Admin-Terapis
Route::get('admin/pages/terapis', 'AdminController@terapis');
Route::get('admin/pages/terapis-create', 'AdminController@terapis_create');
Route::post('admin/pages/terapis-create', 'AdminController@terapis_add');
Route::get('admin/pages/terapis-update', 'AdminController@terapis_update');
Route::get('admin/pages/terapis-absen', 'AdminController@terapis_absen');
Route::post('admin/pages/terapis-absen-hasil', 'AdminController@terapis_absen_hasil');
Route::get('admin/pages/terapis-laporan', 'AdminController@terapis_laporan');
//Admin-Makanan
Route::get('admin/pages/makanan', 'AdminController@makanan');
Route::get('admin/pages/makanan-create', 'AdminController@makanan_create');
Route::post('admin/pages/makanan-create', 'AdminController@makanan_add');
Route::get('admin/pages/makanan-update', 'AdminController@makanan_update_data');
Route::post('admin/pages/makanan-update', 'AdminController@makanan_update');
Route::post('admin/pages/makanan-delete', 'AdminController@makanan_delete');

//Admin-Fasilitas
Route::get('admin/pages/fasilitas', 'AdminController@fasilitas');
//Route::get('admin/pages/fasilitas-create', 'AdminController@fasilitas_create');
//Route::post('admin/pages/fasilitas-create', 'AdminController@fasilitas_add');
Route::get('admin/pages/fasilitas-update', 'AdminController@fasilitas_update_data');
Route::post('admin/pages/fasilitas-update', 'AdminController@fasilitas_update');
Route::post('admin/pages/fasilitas-delete', 'AdminController@fasilitas_delete');
//Admin-Karaoke
Route::get('admin/pages/karaoke-laporan', 'AdminController@karaoke_laporan');
//Admin-bar
Route::get('admin/pages/bar-laporan', 'AdminController@bar_laporan');
Route::get('admin/pages/bar2-laporan', 'AdminController@bar2_laporan');
Route::get('admin/pages/bar3-laporan', 'AdminController@bar3_laporan');


//Admin-Kartu
Route::get('admin/pages/kartu', 'AdminController@kartu');

Route::get('admin/pages/ob-laporan', 'AdminController@laporanOb');

Route::get('admin/pages/setoran', 'AdminController@setoran');

Route::get('admin/pages/kasir-laporan', 'AdminController@kasir_laporan');

//Admin-Makanan2
Route::get('admin/pages/makanan2', 'AdminController@makanan2');
Route::get('admin/pages/makanan2-create', 'AdminController@makanan2_create');
Route::post('admin/pages/makanan2-create', 'AdminController@makanan2_add');
Route::get('admin/pages/makanan2-update', 'AdminController@makanan2_update_data');
Route::post('admin/pages/makanan2-update', 'AdminController@makanan2_update');
Route::post('admin/pages/makanan2-delete', 'AdminController@makanan2_delete');

//Admin-Makanan3
Route::get('admin/pages/makanan3', 'AdminController@makanan3');
Route::get('admin/pages/makanan3-create', 'AdminController@makanan3_create');
Route::post('admin/pages/makanan3-create', 'AdminController@makanan3_add');
Route::get('admin/pages/makanan3-update', 'AdminController@makanan3_update_data');
Route::post('admin/pages/makanan3-update', 'AdminController@makanan3_update');
Route::post('admin/pages/makanan3-delete', 'AdminController@makanan3_delete');

//Cashier-Stock2
Route::get('stock2', 'CashierController@stock2');
Route::post('stock2', 'CashierController@stock2_update');
Route::post('updateStock2', 'CashierController@updateStock2');
Route::post('item2Delete', 'CashierController@deleteItem2');
Route::post('cashier_stock2_print', 'CashierController@update_stock2_print');

//Cashier-Stock3
Route::get('stock3', 'CashierController@stock3');
Route::post('stock3', 'CashierController@stock3_update');
Route::post('updateStock3', 'CashierController@updateStock3');
Route::post('item3Delete', 'CashierController@deleteItem3');
Route::post('cashier_stock3_print', 'CashierController@update_stock3_print');

Route::get('stock_bar', 'BarController@stock_bar');
Route::get('stock_bar2', 'Bar2Controller@stock_bar2');
Route::get('stock_bar3', 'Bar3Controller@stock_bar3');

//Cashier-Pendapatan Terapis
Route::get('pendapatanTerapisOtomatis', 'PembayaranController@pendapatanTerapisOtomatis');
Route::post('pendapatanTerapisOtomatis', 'PembayaranController@pendapatanTerapisShow');
Route::get('printPendapatan', 'PembayaranController@printPendapatan');

Route::get('statusRuang', 'WelcomeController@statusRuang');
Route::get('setActive/{id}', ['as' => 'set.active', 'uses' => 'WelcomeController@setActive']);
Route::get('setInactive/{id}', ['as' => 'set.inactive', 'uses' => 'WelcomeController@setInactive']);

Route::get('statusRuang2', 'WelcomeController@statusRuang2');
Route::get('setActive2/{id}', ['as' => 'set.active2', 'uses' => 'WelcomeController@setActive2']);
Route::get('setInactive2/{id}', ['as' => 'set.inactive2', 'uses' => 'WelcomeController@setInactive2']);

Route::get('statusRuangGabung', 'WelcomeController@statusRuangGabung');
Route::get('setActiveGabung/{id}', ['as' => 'set.activeGabung', 'uses' => 'WelcomeController@setActiveGabung']);
Route::get('setInactiveGabung/{id}', ['as' => 'set.inactiveGabung', 'uses' => 'WelcomeController@setInactiveGabung']);