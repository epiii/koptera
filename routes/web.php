<?php
// Route::get('/',function (){
//   return view('home.index');
// });


// welcome home
  Route::get('/','HomeController@index');
  // Route::get('/',function(){
  //   return view('welcome');
  // });

// login
  Auth::routes();

// user
  Route::get('/home', 'HomeController@index');

// Route::get('admin/routes','HomeController@admin')->middleware('admin')
// admin
// Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
Route::prefix('admin')->group(function(){
  // login
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  // --uom
  Route::get('/uom', 'UomController@index')->name('uom.index'); // read
  Route::get('/uom/create', 'UomController@create')->name('uom.create'); // form create
  Route::post('/uom/create', 'UomController@store')->name('uom.store'); // process create
  Route::get('/uom/{uom}/edit', 'UomController@edit')->name('uom.edit'); // form edit (root binding data)
  Route::patch('/uom/{uom}/edit', 'UomController@update')->name('uom.update'); // process edit (root binding data)
  Route::delete('/uom/{uom}/delete', 'UomController@destroy')->name('uom.destroy'); // process edit (root binding data)
  // --jenisuttp
  Route::get('/jenis-uttp', 'JenisUttpController@index')->name('jenisuttp.index'); // read
  Route::get('/jenis-uttp/create', 'JenisUttpController@create')->name('jenisuttp.create'); // form create
  Route::post('/jenis-uttp/create', 'JenisUttpController@store')->name('jenisuttp.store'); // process create
  Route::get('/jenis-uttp/{jenisuttp}/edit', 'JenisUttpController@edit')->name('jenisuttp.edit'); // form edit (root binding data)
  Route::patch('/jenis-uttp/{jenisuttp}/edit', 'JenisUttpController@update')->name('jenisuttp.update'); // process edit (root binding data)
  Route::delete('/jenis-uttp/{jenisuttp}/delete', 'JenisUttpController@destroy')->name('jenisuttp.destroy'); // process edit (root binding data)
  // --uttp
  Route::get('/uttp', 'UttpController@index')->name('uttp.index'); // read
  Route::get('/uttp/create', 'UttpController@create')->name('uttp.create'); // form create
  Route::post('/uttp/create', 'UttpController@store')->name('uttp.store'); // process create
  Route::get('/uttp/{uttp}/edit', 'UttpController@edit')->name('uttp.edit'); // form edit (root binding data)
  Route::patch('/uttp/{uttp}/edit', 'UttpController@update')->name('uttp.update'); // process edit (root binding data)
  Route::delete('/uttp/{uttp}/delete', 'UttpController@destroy')->name('uttp.destroy'); // process edit (root binding data)
  // -- merk
  Route::get('/merk', 'MerkController@index')->name('merk.index'); // read
  Route::get('/merk/create', 'MerkController@create')->name('merk.create'); // form create
  Route::post('/merk/create', 'MerkController@store')->name('merk.store'); // process create
  Route::get('/merk/{merk}/edit', 'MerkController@edit')->name('merk.edit'); // form edit (root binding data)
  Route::patch('/merk/{merk}/edit', 'MerkController@update')->name('merk.update'); // process edit (root binding data)
  Route::delete('/merk/{merk}/delete', 'MerkController@destroy')->name('merk.destroy'); // process edit (root binding data)
  // -- rekanan
  Route::get('/rekanan-perusahaan', 'RekananController@index')->name('rekanan.index'); // read
  Route::get('/rekanan-perusahaan/create', 'RekananController@create')->name('rekanan.create'); // form create
  Route::post('/rekanan-perusahaan/create', 'RekananController@store')->name('rekanan.store'); // process create
  Route::get('/rekanan-perusahaan/{rekanan}/edit', 'RekananController@edit')->name('rekanan.edit'); // form edit (root binding data)
  Route::patch('/rekanan-perusahaan/{rekanan}/edit', 'RekananController@update')->name('rekanan.update'); // process edit (root binding data)
  Route::delete('/rekanan-perusahaan/{rekanan}/delete', 'RekananController@destroy')->name('rekanan.destroy'); // process edit (root binding data)

  // -transaksi
  // -- tera spbu
  Route::get('/tera-spbu', 'TeraSpbuController@index')->name('teraspbu.index'); // read
  Route::get('/tera-spbu/create', 'TeraSpbuController@create')->name('teraspbu.create'); // form create
  Route::post('/tera-spbu/create', 'TeraSpbuController@store')->name('teraspbu.store'); // process create
  Route::get('/tera-spbu/{teraspbu}/edit', 'TeraSpbuController@edit')->name('teraspbu.edit'); // form edit (root binding data)
  Route::patch('/tera-spbu/{teraspbu}/edit', 'TeraSpbuController@update')->name('teraspbu.update'); // process edit (root binding data)
  Route::delete('/tera-spbu/{teraspbu}/delete', 'TeraSpbuController@destroy')->name('teraspbu.destroy'); // process edit (root binding data)
  // -- tera non spbu
  Route::get('/tera-non-spbu', 'TeraNonSpbuController@index')->name('teranonspbu.index'); // read
  Route::get('/tera-non-spbu/create', 'TeraNonSpbuController@create')->name('teranonspbu.create'); // form create
  Route::post('/tera-non-spbu/create', 'TeraNonSpbuController@store')->name('teranonspbu.store'); // process create
  Route::get('/tera-non-spbu/{teranonspbu}/edit', 'TeraNonSpbuController@edit')->name('teranonspbu.edit'); // form edit (root binding data)
  Route::patch('/tera-non-spbu/{teranonspbu}/edit', 'TeraNonSpbuController@update')->name('teranonspbu.update'); // process edit (root binding data)
  Route::delete('/tera-non-spbu/{teranonspbu}/delete', 'TeraNonSpbuController@destroy')->name('teranonspbu.destroy'); // process edit (root binding data)

  // -report
  // -- tera spbu
  Route::get('/report-tera-spbu', 'ReportController@index')->name('reportspbu.index'); // read
  Route::get('/report-tera-spbu/create', 'ReportController@create')->name('reportspbu.create'); // form create
  Route::post('/report-tera-spbu/create', 'ReportController@store')->name('reportspbu.store'); // process create
  Route::get('/report-tera-spbu/{reportspbu}/edit', 'ReportController@edit')->name('reportspbu.edit'); // form edit (root binding data)
  Route::patch('/report-tera-spbu/{reportspbu}/edit', 'ReportController@update')->name('reportspbu.update'); // process edit (root binding data)
  Route::delete('/report-tera-spbu/{reportspbu}/delete', 'ReportController@destroy')->name('reportspbu.destroy'); // process edit (root binding data)
  // -- tera non spbu
  Route::get('/report-tera-non-spbu', 'ReportController@index')->name('reportnonspbu.index'); // read
  Route::get('/report-tera-non-spbu/create', 'ReportController@create')->name('reportnonspbu.create'); // form create
  Route::post('/report-tera-non-spbu/create', 'ReportController@store')->name('reportnonspbu.store'); // process create
  Route::get('/report-tera-non-spbu/{reportnonspbu}/edit', 'ReportController@edit')->name('reportnonspbu.edit'); // form edit (root binding data)
  Route::patch('/report-tera-non-spbu/{reportnonspbu}/edit', 'ReportController@update')->name('reportnonspbu.update'); // process edit (root binding data)
  Route::delete('/report-tera-non-spbu/{reportnonspbu}/delete', 'ReportController@destroy')->name('reportnonspbu.destroy'); // process edit (root binding data)
});

// user
Route::middleware('auth')->group(function(){
  // -- perusahaan
  Route::get('/profil-saya', 'PerusahaanController@index')->name('perusahaan.index'); // read
  Route::get('/profil-saya/create', 'PerusahaanController@create')->name('perusahaan.create'); // form create
  Route::post('/profil-saya/create', 'PerusahaanController@store')->name('perusahaan.store'); // process create
  Route::get('/profil-saya/{perusahaan}/edit', 'PerusahaanController@edit')->name('perusahaan.edit'); // form edit (root binding data)
  Route::patch('/profil-saya/{perusahaan}/edit', 'PerusahaanController@update')->name('perusahaan.update'); // process edit (root binding data)
  Route::delete('/profil-saya/{perusahaan}/delete', 'PerusahaanController@destroy')->name('perusahaan.destroy'); // process edit (root binding data)
  // -- alat ukur
  Route::get('/alat-ukur', 'AlatUkurController@index')->name('alatukur.index'); // read
  Route::get('/alat-ukur/create', 'AlatUkurController@create')->name('alatukur.create'); // form create
  Route::post('/alat-ukur/create', 'AlatUkurController@store')->name('alatukur.store'); // process create
  Route::get('/alat-ukur/{alatukur}/edit', 'AlatUkurController@edit')->name('alatukur.edit'); // form edit (root binding data)
  Route::patch('/alat-ukur/{alatukur}/edit', 'AlatUkurController@update')->name('alatukur.update'); // process edit (root binding data)
  Route::delete('/alat-ukur/{alatukur}/delete', 'AlatUkurController@destroy')->name('alatukur.destroy'); // process edit (root binding data)
  // json
  // Route::get('/json-uttps','ALatUkurController@uttplist');
  // Route::put('/json-uttps','ALatUkurController@uttplist')->name('uttp.list');
  Route::get('/json-uttps','AlatUkurController@uttplist')->name('uttp.list');
  // Route::post('/json-uttps','AlatUkurController@uttplist')->name('uttp.list');

  // -- pengjauan tera
  Route::get('/pengajuan-tera', 'PengajuanTeraController@index')->name('pengajuantera.index'); // read
  Route::get('/pengajuan-tera/create', 'PengajuanTeraController@create')->name('pengajuantera.create'); // form create
  Route::post('/pengajuan-tera/create', 'PengajuanTeraController@store')->name('pengajuantera.store'); // process create
  Route::get('/pengajuan-tera/{pengajuantera}/edit', 'PengajuanTeraController@edit')->name('pengajuantera.edit'); // form edit (root binding data)
  Route::patch('/pengajuan-tera/{pengajuantera}/edit', 'PengajuanTeraController@update')->name('pengajuantera.update'); // process edit (root binding data)
  Route::delete('/pengajuan-tera/{pengajuantera}/delete', 'PengajuanTeraController@destroy')->name('pengajuantera.destroy'); // process edit (root binding data)


});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
