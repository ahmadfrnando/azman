@extends('layouts.app')

@section('content')
<x-services-section.detail :gambar="$destinasi->gambar" :judul="$destinasi->nama" :deskripsi="$destinasi->deskripsi" :slug="$destinasi->slug" :phone="$kontak->no_hp" />
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection