<?php

namespace App\Http\Controllers;

use Auth;
use App\AlatUkur;
use App\Uttp;
use App\JenisUttp;
use App\Uom;
use App\Perusahaan;
use App\Merk;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AlatUkurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $alatukurs = DB::table('alat_ukurs')
                ->select(
                  'alat_ukurs.id',
                  'alat_ukurs.tipe',
                  'alat_ukurs.no_seri',
                  'alat_ukurs.kapasitas',
                  'merks.nama as merk',
                  'uoms.nama as uom',
                  'uttps.nama as uttp',
                  'jenis_uttps.nama as jenis_uttp'
                  )
                  ->leftJoin('merks', 'merks.id', '=', 'alat_ukurs.id_merk')
                  ->leftJoin('uoms', 'uoms.id', '=', 'alat_ukurs.id_uom')
                  ->leftJoin('uttps', 'uttps.id', '=', 'alat_ukurs.id_uttp')
                  ->leftJoin('jenis_uttps', 'jenis_uttps.id', '=', 'uttps.id_jenisuttp')
                  ->leftJoin('perusahaans', 'perusahaans.id', '=', 'alat_ukurs.id_perusahaan')
                  ->leftJoin('users', 'users.id', '=', 'perusahaans.id_user')
                ->where('users.id','=',Auth::guard('web')->user('attributes')->id)
                ->paginate(5);
      return view('alatukur.index',['alatukurs'=>$alatukurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $jenisuttps = JenisUttp::all();
      $uoms = Uom::all();
      $merks = Merk::all();
      return view('alatukur.create',[
        'jenisuttps'=>$jenisuttps,
        'uoms'=>$uoms,
        'merks'=>$merks,
      ]);
    }

    // public function uttplist(){
    public function uttplist(Request $request){
      $data=Uttp::select('id','nama')->where('id_jenisuttp',$request->id_jenisuttp)->get();
      return response()->json($data);
    	// 	return response()->json(['options'=>$data]);
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
        'id_uttp'=>'required',
        // 'id_uom'=>'required',
        // 'tipe'=>'required',
        // 'id_merk'=>'required',
        // 'kapasitas'=>'required',
      ]);
      $id_user=Auth::guard('web')->user('attributes')->id;
      $perusahaan=Perusahaan::select('id')->where('id_user','=',$id_user)->get();
      $id_perusahaan=$perusahaan[0]->id;
      // dd($request->id_uom);
      // dd($id_perusahaan[0]->id);
      AlatUkur::create([
        'id_uttp'=>request('id_uttp'),
        'id_perusahaan'=>$id_perusahaan,
        'id_merk'=>request('id_merk'),
        'no_seri'=>request('no_seri'),
        'id_uom'=>request('id_uom'),
        'tipe'=>request('tipe'),
        'kapasitas'=>request('kapasitas')
      ]);
      return redirect()->route('alatukur.index')->withSuccess('data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\alatukur  $alatukur
     * @return \Illuminate\Http\Response
     */
    public function show(alatukur $alatukur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\alatukur  $alatukur
     * @return \Illuminate\Http\Response
     */
    public function edit(alatukur $alatukur)
    {
      $jenisuttps = JenisUttp::all();
      $uoms = Uom::all();
      $merks = Merk::all();
      $alatukurs = AlatUkur::all();
      $get_jenisuttp=Uttp::select('id_jenisuttp')->where('id','=',$alatukur->id_uttp)->get();
      $id_jenisuttp=$get_jenisuttp[0]->id_jenisuttp;
      $uttps=Uttp::select('id','nama')->where('id_jenisuttp',$id_jenisuttp)->orderBy('nama')->get();
// $uttps=Uttp::select('id','nama')->where('id_jenisuttp',$alatukur->id_jenisuttp)->get();
// return response()->json($data);
// dd($alatukur->id);
// dd($alatukur[0]->id_uttp);
// dd($id_jenisuttp);

// dd($uttps[0]->id_jenisuttp);
      return view('alatukur.edit',[
        'alatukur'=>$alatukur,
          'uttps'=>$uttps,
          'id_jenisuttp'=>$id_jenisuttp,
          'jenisuttps'=>$jenisuttps,
          'uoms'=>$uoms,
          'merks'=>$merks,
      ]);

      // $alatukur = AlatUkur::all();
      // return view('alatukur.edit',compact('alatukur','alatukur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\alatukur  $alatukur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alatukur $alatukur)
    {
      // $uom=Uom::find($id);
      $this->validate(request(),[
        'id_uttp'=>'required',
      ]);
      $alatukur->update([
        'id_uttp'=>request('id_uttp'),
        'id_merk'=>request('id_merk'),
        'no_seri'=>request('no_seri'),
        'id_uom'=>request('id_uom'),
        'tipe'=>request('tipe'),
        'kapasitas'=>request('kapasitas')
      ]);
      return redirect()->route('alatukur.index')->withInfo('data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\alatukur  $alatukur
     * @return \Illuminate\Http\Response
     */
    public function destroy(alatukur $alatukur)
    {
      $alatukur->delete();
      return redirect()->route('alatukur.index')->withDanger('data has been deleted');
    }
}
