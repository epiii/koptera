@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">{{-- panel --}}
            <div class="panel-heading">Edit Rekanan</div>

            <div class="panel-body">{{-- -body--}}
              <form action="{{ route('rekanan.update',$rekanan) }}" method="post">{{-- -form --}}
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
                {{-- <div class="form-group"> --}}
                <div class="form-group  has-feedback{{ $errors->has('rekanan')?'has-error':''}}">
                  <label for="">Nama</label>
                  <input class="form-control" type="text" name="nama" placeholder="nama Rekanan" value="{{$rekanan->nama}}">
                  {{-- <input required class="form-control" type="text" name="alamat" placeholder="alamat Rekanan" value="{{old('alamat')}}"> --}}
                  @if ($errors->has('nama'))
                    <span class="help-block">
                      <p>{{$errors->first('nama')}}</p>
                    </span>
                  @endif

                </div>

                <div class="form-group">
                  <label for="">alamat</label>
                  <input class="form-control" type="text" name="alamat" placeholder="alamat Rekanan" value="{{$rekanan->alamat}}">
                  {{-- <input required class="form-control" type="text" name="alamat" placeholder="alamat Rekanan" value="{{old('alamat')}}"> --}}
                  @if ($errors->has('alamat'))
                    <span class="help-block">
                      <p>{{$errors->first('alamat')}}</p>
                    </span>
                  @endif

                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="" value="save">
                </div>
              </form>{{-- -form --}}
            </div>{{-- body --}}
          </div>{{-- panel --}}
      </div>
    </div>
  </div>

@endsection
