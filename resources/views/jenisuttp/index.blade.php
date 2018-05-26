@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">

        <div class="col-md-8 col-md-offset-2">
          <p><a href="{{route('jenisuttp.create')}}" class=" btn btn-sm btn-info">Add</a></p>
          @foreach ($jenisuttps as $jenisuttp)

              <div class="panel panel-default">
                  <div class="panel-heading">
                    {{$jenisuttp->nama}}
                    {{-- {{$jenisuttp->created_at->diffForHumans()}} --}}

                    <div class="pull-right">
                      <a href="{{route('jenisuttp.edit',$jenisuttp)}}" class="btn btn-sm btn-info">edit</a>
                      <form action="{{ route('jenisuttp.destroy',$jenisuttp) }}"  method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                      </form>
                    </div>
                  </div>

                  <div class="panel-body">{{$jenisuttp->keterangan}}</div>
              </div>

        @endforeach
        {{ $jenisuttps->render()}}
      </div>
      </div>
  </div>

@endsection
