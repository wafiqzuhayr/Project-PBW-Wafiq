@extends('layouts.main')

@section('content')
    <h1> Berita </h1>

    @foreach ($beritas as $berita)
        <h2>{{ $berita['judul'] }}</h2>
        <h3>{{ $berita['penulis'] }}</h3>
        <p>{{ $berita['konten'] }}</p>
   @endforeach
@endsection