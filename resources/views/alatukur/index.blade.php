@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p><a href="{{route('alatukur.create')}}" class=" btn btn-sm btn-info">Tambah</a></p>

          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>UTTP</th>
                <th>Jenis UTTP</th>
                <th>Tipe</th>
                <th>Merk</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{var_dump($alatukurs)}} --}}
              {{-- {{dd($alatukurs->total()}} --}}
              {{-- {{dd($alatukurs[0]->uttp)}} --}}

              @foreach ($alatukurs as $i =>$v)
              <tr>
                <td>{{$v->uttp}}</td>
                <td>{{$v->jenis_uttp}}</td>
                <td>{{$v->tipe}}</td>
                <td>{{$v->merk}}</td>
                <td>{{$v->kapasitas}}</td>
                <td>
                  {{-- {{dd($v->alatukur)}} --}}
                  {{-- {{dd(route('alatukur.edit',$alatukurs)) }} --}}
                  <a href="{{route('alatukur.edit',$v->id) }}" class="btn btn-sm btn-info">
                    Ubah
                  </a>
                  <form action="{{ route('alatukur.destroy',$v->id) }}"  method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-sm btn-danger">
                      <span class="icon-bar"></span>
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          {{ $alatukurs->render()}}
        </div>
      </div>
  </div>

@endsection
