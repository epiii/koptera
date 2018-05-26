<?php

namespace App\Http\Controllers;

use App\Uttp;
use App\JenisUttp;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UttpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // $page = request('page', 1);
    // $pageSize = 10;
    // $results = DB::select('SET NOCOUNT ON; EXEC stored_procedure');
    // $results = DB::table('uttps')
    $uttps = DB::table('uttps')
                ->select('uttps.id','uttps.nama as uttp','uttps.keterangan','jenis_uttps.nama as jenisuttp')
                ->leftJoin('jenis_uttps', 'jenis_uttps.id', '=', 'uttps.id_jenisuttp')
                // ->get()
                ->paginate(5);
                // dd($uttps);
    // $offset = ($page * $pageSize) - $pageSize;
    // $data = array_slice($results, $offset, $pageSize, true);
    // dd($data);
    // $paginator = new \Illuminate\Pagination\LengthAwarePaginator($data, count($data), $pageSize, $page);

    // return view('uttp.index', ['results' => $paginator]);

      // $uttps = DB::table('uttps')
      //             ->select('uttps.id','uttps.nama as uttp','uttps.keterangan','jenis_uttps.nama as jenisuttp')
      //             ->leftJoin('jenis_uttps', 'jenis_uttps.id', '=', 'uttps.id_jenisuttp')
      //             ->get();
      // $uttps=$uttpData->paginate(5);
      // // $uoms = Uom::all();
      return view('uttp.index',['uttps'=>$uttps]);
      // return view('uttp.index',compact('uttps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $jenisuttps = JenisUttp::all();
      return view('uttp.create',compact('jenisuttps'));
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
        'nama'=>'required',
        'id_jenisuttp'=>'required',
        'keterangan'=>'required',
      ]);
      Uttp::create([
        'nama'=>request('nama'),
        'id_jenisuttp'=>request('id_jenisuttp'),
        'keterangan'=>request('keterangan')
      ]);
      return redirect()->route('uttp.index')->withSuccess('data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\uttp  $uttp
     * @return \Illuminate\Http\Response
     */
    public function show(uttp $uttp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\uttp  $uttp
     * @return \Illuminate\Http\Response
     */
    public function edit(uttp $uttp)
    {
      $jenisuttps = JenisUttp::all();
      return view('uttp.edit',compact('uttp','jenisuttps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\uttp  $uttp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, uttp $uttp)
    {
      // $uom=Uom::find($id);
      $this->validate(request(),[
        'nama'=>'required',
        'id_jenisuttp'=>'required',
        'keterangan'=>'required',
      ]);
    $uttp->update([
        'nama'=>request('nama'),
        'id_jenisuttp'=>request('id_jenisuttp'),
        'keterangan'=>request('keterangan'),
      ]);
      return redirect()->route('uttp.index')->withInfo('data has been edited');
      // return redirect()->route('uttp.index')->with('info','data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\uttp  $uttp
     * @return \Illuminate\Http\Response
     */
    public function destroy(uttp $uttp)
    {
      $uttp->delete();
      return redirect()->route('uttp.index')->withDanger('data has been deleted');
    }
}
