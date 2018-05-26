<?php

namespace App\Http\Controllers;

use App\PengajuanTera;
use App\TeraSpbu;
use App\AlatUkur;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TeraSpbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $teraspbus = DB::table('pengajuan_teras')
        ->select(
        'perusahaans.nama as perusahaan',
        'rekanans.nama as rekanan',
        'pengajuan_teras.id as id_pengajuantera',
        'uttps.nama as uttp',
        'jenis_uttps.nama as jenis_uttp',
        'pengajuan_teras.tgl_tera',
        'pengajuan_teras.tgl_expired',
        'pengajuan_teras.no_agenda',
        'pengajuan_teras.status'
        )
        ->leftJoin('alat_ukurs', 'alat_ukurs.id', '=', 'pengajuan_teras.id_alatukur')
        ->leftJoin('perusahaans', 'perusahaans.id', '=', 'alat_ukurs.id_perusahaan')
        ->leftJoin('uttps', 'uttps.id', '=', 'alat_ukurs.id_uttp')
        ->leftJoin('jenis_uttps', 'jenis_uttps.id', '=', 'uttps.id_jenisuttp')
        ->leftJoin('users', 'users.id', '=', 'perusahaans.id_user')
        ->leftJoin('rekanans', 'rekanans.id', '=', 'pengajuan_teras.id_rekanan')
      ->where('uttps.id_jenisuttp','=','1')
      ->paginate(5);

      return view('teraspbu.index',['teraspbus'=>$teraspbus]);
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
      $no_lastx= $pt_count==0?1:($no_last+1);
      $no_agenda = str_pad($no_lastx, 4, "0",STR_PAD_LEFT);

      // dd($no_agenda);
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
      return view('teraspbu.create',[
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
      TeraSpbu::create([
        'id_alatukur'=>request('id_alatukur'),
        'no_agenda'=>$no_lastx,
      ]);
      return redirect()->route('teraspbu.index')->withSuccess('data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teraspbu  $teraspbu
     * @return \Illuminate\Http\Response
     */
    public function show(teraspbu $teraspbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teraspbu  $teraspbu
     * @return \Illuminate\Http\Response
     */
    public function edit(teraspbu $teraspbu)
    {
      $teraspbu = TeraSpbu::all();
      dd($teraspbu);
      return view('teraspbu.edit',compact('teraspbu','teraspbu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teraspbu  $teraspbu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teraspbu $teraspbu)
    {
      // $uom=Uom::find($id);
      $this->validate(request(),[
        'nama'=>'required',
        'id_teraspbu'=>'required',
        'keterangan'=>'required',
      ]);
    $teraspbu->update([
        'nama'=>request('nama'),
        'id_teraspbu'=>request('id_teraspbu'),
        'keterangan'=>request('keterangan'),
      ]);
      return redirect()->route('teraspbu.index')->withInfo('data has been edited');
      // return redirect()->route('teraspbu.index')->with('info','data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teraspbu  $teraspbu
     * @return \Illuminate\Http\Response
     */
    public function destroy(teraspbu $teraspbu)
    {
      $teraspbu->delete();
      return redirect()->route('teraspbu.index')->withDanger('data has been deleted');
    }
}
