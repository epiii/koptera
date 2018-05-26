@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p><a href="{{route('rekanan.create')}}" class=" btn btn-sm btn-info">Tambah</a></p>

          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rekanans as $rekanan)
              <tr>
                <td>{{$rekanan->nama}}</td>
                <td>{{$rekanan->alamat}}</td>
                <td>
                  <a href="{{route('rekanan.edit',$rekanan)}}" class="btn btn-sm btn-info">
                      {{-- <i class="glyphicon glyphicon-edit"></i> --}}
                      Ubah
                  </a>
                  <form action="{{ route('rekanan.destroy',$rekanan) }}"  method="post">
                    {{-- @csrf --}}
                    {{-- @method('delete') --}}
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-sm btn-danger">
                      {{-- <i class="glyphicon glyphicon-remove"></i> --}}
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

          {{ $rekanans->render()}}
        </div>
      </div>
  </div>

@endsection
