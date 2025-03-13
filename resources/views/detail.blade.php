@section('nav__item-destinasi', 'active')
@extends('layouts.app')

@section('content')
<x-services-section.detail :gambar="$item->gambar" :judul="$item->nama" :deskripsi="$item->deskripsi" :slug="$item->slug" :phone="$kontak->no_hp" :pesan="$pesan"/>
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection