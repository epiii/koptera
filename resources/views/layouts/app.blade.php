<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
              {{-- {{ dd(session()->all()) }} --}}

                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        {{-- user (Perusahaan) --}}
                        @if(Auth::guard('web')->user())
                          <li><a href="{{ route('pengajuantera.index') }}">Pengajuan Tera</a></li>
                          <li><a href="{{ route('alatukur.index') }}">Alat Ukur</a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                              {{Auth::guard('web')->user('attributes')->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                              <li><a href="{{route('perusahaan.index')}}">Profil</a></li>
                              <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                              </form>
                            </li>
                          </ul>
                          </li>
                        @elseif(Auth::guard('admin')->user())
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                              Data Laporan<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                              <li><a href="{{ route('reportspbu.index') }}">SPBU</a></li>
                              <li><a href="{{ route('reportnonspbu.index') }}">non SPBU</a></li>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                              Data Transaksi<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                              <li><a href="{{ route('teraspbu.index') }}">Tera SPBU</a></li>
                              <li><a href="{{ route('teranonspbu.index') }}">Tera non SPBU</a></li>
                            </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                              Data Master<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                              <li><a href="{{ route('uom.index') }}">Satuan Pengukuran (UoM)</a></li>
                              <li><a href="{{ route('jenisuttp.index') }}">Jenis UTTP</a></li>
                              <li><a href="{{ route('uttp.index') }}">UTTP</a></li>
                              <li><a href="{{ route('merk.index') }}">Merk</a></li>
                              <li><a href="{{ route('rekanan.index') }}">Rekanan Perusahaan</a></li>
                            </ul>
                          </li>

                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                              {{Auth::guard('admin')->user('attributes')->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="#">Setting</a></li>
                                <li>
                                  <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                </form>
                              </li>
                          </ul>
                        </li>
                        @else
                          <li><a href="{{ route('login') }}">Login</a></li>
                          {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              @include('layouts.partials._alerts')
            </div>
          </div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script type="text/javascript">
    $(document).ready(function(){
      // $()
      // if($('#id_jenisuttp').val()=='1') $('.nonspbu').attr('style','display:none');
      // else removeAttr('style');

      // function uttpList(id_jenisuttp){
      $('#id_jenisuttp').on('change', function(e){
        var id_jenisuttp= $(this).val();
        // var txt_jenistuttp=$(this).text();
        // var str2='spbu';
         // txt_jenistuttp.contains('spbu');
         // txt_jenistuttp.search('spbu');

        if(id_jenisuttp=='1') $('.nonspbu').hide('slow');
        else $('.nonspbu').show('slow');

        // $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   }
        // });

          $.ajax({
            url: "/json-uttps",
            method: 'get',
            // method: 'post',
            dataType:'json',
            data: {
               // _token:'7EygZM2Xq2zqjupfP4fZEGJeEC2HYJQtQlEXIxw6' ,
               id_jenisuttp: $('#id_jenisuttp').val(),
            },
            success: function(dt){
               console.log(dt);
               $('#id_uttp').empty();
               $('#id_uttp').append('<option value="">=== Pilih UTTP ===</option>');
               $.each(dt,function (id,val) {
                 $('#id_uttp').append('<option value="'+val.id+'">'+val.nama+'</option>')
               });
            }});
         });
      });

    </script>


</body>
</html>
