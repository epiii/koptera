@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">{{-- panel --}}
              <div class="panel-heading">Tambahkan Data Perusahaan Anda</div>

              <div class="panel-body">{{-- -body--}}
                <form action="{{ route('perusahaan.store') }}" method="post">
                  {{ csrf_field() }}
                  {{-- <div class="form-group"> --}}
                  <div class="form-group  has-feedback{{ $errors->has('perusahaan')?'has-error':''}}">
                    <label for="">Nama Perusahaan </label><b style="color:red;">*</b>
                    <input class="form-control" type="text" name="perusahaan" placeholder="nama perusahaan" value="{{old('perusahaan')}}">
                    @if ($errors->has('perusahaan'))
                      <span class="help-block text-white label-danger">
                      {{-- <span class="help-block"> --}}
                        <p>
                          {{-- <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> --}}
                          {{$errors->first('perusahaan')}}
                        </p>
                      </span>
                    @endif
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                  </div>

                  <div class="form-group  has-feedback{{ $errors->has('alamat')?'has-error':''}}">
                    <label for="">Alamat</label><b style="color:red;">*</b>
                    {{-- <input required class="form-control" type="text" name="alamat" placeholder="alamat perusahaan" value=""> --}}
                    <input class="form-control" type="text" name="alamat" placeholder="alamat" value="{{old('alamat')}}">
                    @if ($errors->has('alamat'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('alamat')}}</p>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="save">
                  </div>
                </form>

              </div>
            </div>
        </div>
      </div>
    </div>
@endsection
