<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <style>
            .description {
                max-height: 98px;
                overflow: hidden;
            }
            

            
        </style>
</head>
<body>
@include('layouts.mainNavbar')
</div>
    <div class="container" style="margin-bottom: 20vh">
        {{-- <h3 class="h3 text-center mb-3 mt-5">{{ __('You are logged in!') }}</h3> --}}
        <h4 class="h4 text-center mb-5 mt-3" style="font-weight: bold; font-size:x-large;">Broad Casting</h4>
        @if(count($perusahaan) > 0)
            <div class="row">
                @foreach($perusahaan as $a)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="box-shadow: 9px 12px 25px -8px rgba(0,0,0,0.46);
                        -webkit-box-shadow: 9px 12px 25px -8px rgba(0,0,0,0.46);
                        -moz-box-shadow: 9px 12px 25px -8px rgba(0,0,0,0.46);">
                            <img src="{{ asset('photos/' . $a->photo) }}" class="card-img-top" alt="{{ $a->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $a->name }}</h5>
                                <div class="card-text description" id="description_{{ $a->id }}">
                                    <p class="font-weight-bold" style="text-align:justify;">Nama Perusahaan: {{ $a->nama }}</p>
                                    <p style="text-align: justify;">Jurusan: {{ $a->jurusan }}</p>
                                    <p style="text-align: justify;">Keunggulan: {{ $a->keunggulan }}</p>
                                    <p style="text-align: justify;">About: {{ $a->about }}</p>
                                </div>                       
                                <a href="{{ route('homeuser.show', $a->id) }}" class="btn btn-primary btn-block mt-3" data-id="{{ $a->id }}">Read More</a>
                            </div>
                    </div>
                @endforeach
            </div>
            @endif
    </div>
@include('layouts.footer')
</body>
</html>