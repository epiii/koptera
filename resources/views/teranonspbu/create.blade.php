@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">{{-- panel --}}
              <div class="panel-heading">UTTP </div>

              <div class="panel-body">{{-- -body--}}
                <form action="{{ route('uttp.store') }}" method="post">
                  {{ csrf_field() }}
                  {{-- <div class="form-group"> --}}
                  <div class="form-group  has-feedback{{ $errors->has('uttp')?'has-error':''}}">
                    <label for="">UTTP</label>
                    <input class="form-control" type="text" name="nama" placeholder="nama nama" value="{{old('nama')}}">
                    @if ($errors->has('nama'))
                      <span class="help-block text-white label-danger">
                      {{-- <span class="help-block"> --}}
                        <p>
                          {{-- <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> --}}
                          {{$errors->first('nama')}}
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
                  <div class="form-group">
                    <label for="">jenis UTTP</label>
                    {{-- {{dd($jenisuttps)}} --}}
                    <select class="form-control" name="id_jenisuttp">
                      @foreach ($jenisuttps as $jenisuttp)
                        <option value="{{$jenisuttp->id}}">{{$jenisuttp->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group  has-feedback{{ $errors->has('keterangan')?'has-error':''}}">
                    <label for="">keterangan</label>
                    {{-- <input required class="form-control" type="text" name="keterangan" placeholder="keterangan uttp" value=""> --}}
                    <input class="form-control" type="text" name="keterangan" placeholder="keterangan uttp" value="{{old('keterangan')}}">
                    @if ($errors->has('keterangan'))
                      <span class="help-block text-white label-danger">
                        <p>{{$errors->first('keterangan')}}</p>
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
