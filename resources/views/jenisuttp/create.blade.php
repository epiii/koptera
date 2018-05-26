@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">{{-- panel --}}
              <div class="panel-heading">Jenis UTTP </div>

              <div class="panel-body">{{-- -body--}}
                <form action="{{ route('jenisuttp.store') }}" method="post">
                  {{ csrf_field() }}
                  {{-- <div class="form-group"> --}}
                  <div class="form-group  has-feedback{{ $errors->has('jenisuttp')?'has-error':''}}">
                    <label for="">jenisuttp</label>
                    <input class="form-control" type="text" name="nama" placeholder="nama nama" value="{{old('nama')}}">
                    {{-- <input class="form-control" type="text" name="nama" placeholder="nama jenisuttp" required value=""> --}}
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

                  <div class="form-group  has-feedback{{ $errors->has('keterangan')?'has-error':''}}">
                    <label for="">keterangan</label>
                    {{-- <input required class="form-control" type="text" name="keterangan" placeholder="keterangan jenisuttp" value=""> --}}
                    <input class="form-control" type="text" name="keterangan" placeholder="keterangan jenisuttp" value="{{old('keterangan')}}">
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
