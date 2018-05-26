<?php

namespace App\Http\Controllers;

use App\PengajuanTera;
use App\AlatUkur;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PengajuanTeraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pengajuanteras = DB::table('pengajuan_teras')
        ->select(
        'pengajuan_teras.id',
        'uttps.nama as uttp',
        'jenis_uttps.nama as jenis_uttp',
        'uoms.nama as uom',
        'alat_ukurs.tipe',
        'alat_ukurs.kapasitas',
        'merks.nama as merk',
        'alat_ukurs.kapasitas',
        'pengajuan_teras.tgl_tera',
        'pengajuan_teras.tgl_expired',
        'pengajuan_teras.no_agenda',
        'pengajuan_teras.status'
        )
        ->leftJoin('alat_ukurs', 'alat_ukurs.id', '=', 'pengajuan_teras.id_alatukur')
        ->leftJoin('perusahaans', 'perusahaans.id', '=', 'alat_ukurs.id_perusahaan')
        ->leftJoin('uoms', 'uoms.id', '=', 'alat_ukurs.id_uom')
        ->leftJoin('uttps', 'uttps.id', '=', 'alat_ukurs.id_uttp')
        ->leftJoin('merks', 'merks.id', '=', 'alat_ukurs.id_merk')
        ->leftJoin('jenis_uttps', 'jenis_uttps.id', '=', 'uttps.id_jenisuttp')
        ->leftJoin('users', 'users.id', '=', 'perusahaans.id_user')
        ->leftJoin('rekanans', 'rekanans.id', '=', 'pengajuan_teras.id_rekanan')
      ->where('users.id','=',Auth::guard('web')->user('attributes')->id)
      ->paginate(5);

      return view('pengajuantera.index',['pengajuanteras'=>$pengajuanteras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pt_count = DB::table('pengajuan_teras')->select('pengajuan_teras.id')->count();
      $no_last = DB::table('pengajuan_teras')->max('id');

      // dd($pt_count);
        $no_lastx= $pt_count==0?1:($no_last+1);
      $no_agenda = str_pad($no_lastx, 4, "0",STR_PAD_LEFT);

      $alatukurs = AlatUkur::select(
        'alat_ukurs.id',
        'uttps.nama as uttp',
        'alat_ukurs.kapasitas',
        'uoms.nama as uom',
        'alat_ukurs.tipe',
        'alat_ukurs.no_seri'
        )
        ->leftJoin('uttps', 'uttps.id', '=', 'alat_ukurs.id_uttp')
        ->leftJoin('uoms', 'uoms.id', '=', 'alat_ukurs.id_uom')
        ->leftJoin('perusahaans', 'perusahaans.id', '=', 'alat_ukurs.id_perusahaan')
        ->where('perusahaans.id_user','=',Auth::guard('web')->user('attributes')->id)
        ->get();
        // dd($alatukurs);
      // $alatukurs = AlatUkur::all();
      return view('pengajuantera.create',[
        'alatukurs'=>$alatukurs,
        'no_agenda'=>$no_agenda,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate(request(),[
        'id_alatukur'=>'required',
      ]);

      $pt_count = DB::table('pengajuan_teras')->select('pengajuan_teras.id')->count();
      $no_last = DB::table('pengajuan_teras')->max('id'); // example : 0
      $no_lastx= $pt_count==0?1:($no_last+1); // example : 1
      $no_agenda = str_pad($no_lastx, 4, "0",STR_PAD_LEFT); //example :  0001
// dd($request);
      PengajuanTera::create([
        'id_alatukur'=>request('id_alatukur'),
        'no_agenda'=>$no_lastx,
      ]);
      return redirect()->route('pengajuantera.index')->withSuccess('data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pengajuantera  $pengajuantera
     * @return \Illuminate\Http\Response
     */
    public function show(pengajuantera $pengajuantera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pengajuantera  $pengajuantera
     * @return \Illuminate\Http\Response
     */
    public function edit(pengajuantera $pengajuantera)
    {
      $pengajuantera = JenisPengajuanTera::all();
      return view('pengajuantera.edit',compact('pengajuantera','pengajuantera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pengajuantera  $pengajuantera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengajuantera $pengajuantera)
    {
      // $uom=Uom::find($id);
      $this->validate(request(),[
        'nama'=>'required',
        'id_pengajuantera'=>'required',
        'keterangan'=>'required',
      ]);
    $pengajuantera->update([
        'nama'=>request('nama'),
        'id_pengajuantera'=>request('id_pengajuantera'),
        'keterangan'=>request('keterangan'),
      ]);
      return redirect()->route('pengajuantera.index')->withInfo('data has been edited');
      // return redirect()->route('pengajuantera.index')->with('info','data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pengajuantera  $pengajuantera
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengajuantera $pengajuantera)
    {
      $pengajuantera->delete();
      return redirect()->route('pengajuantera.index')->withDanger('data has been deleted');
    }
}
