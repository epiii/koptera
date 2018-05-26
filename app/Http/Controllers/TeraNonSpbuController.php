<?php

namespace App\Http\Controllers;
use App\PengajuanTera;
use App\AlatUkur;
use Auth;
use App\TeraNonSpbu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeraNonSpbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $teranonspbus = DB::table('pengajuan_teras')
        ->select(
        'perusahaans.nama as perusahaan',
        'rekanans.nama as rekanan',
        'pengajuan_teras.id as id_pengajuantera',
        'uttps.nama as uttp',
        'jenis_uttps.nama as jenis_uttp',
        'pengajuan_teras.tgl_tera',
        'pengajuan_teras.tgl_expired',
        'alat_ukurs.kapasitas',
        'merks.nama as merk',
        'alat_ukurs.tipe',
        'alat_ukurs.no_seri',
        'pengajuan_teras.no_agenda',
        'pengajuan_teras.status'
        )
        ->leftJoin('alat_ukurs', 'alat_ukurs.id', '=', 'pengajuan_teras.id_alatukur')
        ->leftJoin('perusahaans', 'perusahaans.id', '=', 'alat_ukurs.id_perusahaan')
        ->leftJoin('merks', 'merks.id', '=', 'alat_ukurs.id_merk')
        ->leftJoin('uttps', 'uttps.id', '=', 'alat_ukurs.id_uttp')
        ->leftJoin('jenis_uttps', 'jenis_uttps.id', '=', 'uttps.id_jenisuttp')
        ->leftJoin('users', 'users.id', '=', 'perusahaans.id_user')
        ->leftJoin('rekanans', 'rekanans.id', '=', 'pengajuan_teras.id_rekanan')
      ->where('uttps.id_jenisuttp','=','2')
      ->orderBy('pengajuan_teras.no_agenda')
      ->paginate(5);

      return view('teranonspbu.index',['teranonspbus'=>$teranonspbus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeraNonSpbu  $teraNonSpbu
     * @return \Illuminate\Http\Response
     */
    public function show(TeraNonSpbu $teraNonSpbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeraNonSpbu  $teraNonSpbu
     * @return \Illuminate\Http\Response
     */
    public function edit(TeraNonSpbu $teraNonSpbu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeraNonSpbu  $teraNonSpbu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeraNonSpbu $teraNonSpbu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeraNonSpbu  $teraNonSpbu
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeraNonSpbu $teraNonSpbu)
    {
        //
    }
}
