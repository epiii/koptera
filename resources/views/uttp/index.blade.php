@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p><a href="{{route('uttp.create')}}" class=" btn btn-sm btn-info">Tambah</a></p>

          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Jenis UTTP</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{var_dump($uttps)}} --}}
              {{-- {{dd($uttps->total()}} --}}
              @foreach ($uttps as $i =>$v)
              <tr>
                <td>{{$v->uttp}}</td>
                <td>{{$v->jenisuttp}}</td>
                <td>{{$v->keterangan}}</td>
                <td>
                  {{-- {{dd($v->uttp)}} --}}
                  {{-- {{dd(route('uttp.edit',$uttps)) }} --}}
                  <a href="{{route('uttp.edit',$v->id) }}" class="btn btn-sm btn-info">
                    Ubah
                  </a>
                  <form action="{{ route('uttp.destroy',$uttps) }}"  method="post">
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

          {{ $uttps->render()}}
        </div>
      </div>
  </div>

@endsection
