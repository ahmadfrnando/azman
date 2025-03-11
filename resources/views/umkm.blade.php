@section('nav__item-umkm', 'active')

@extends('layouts.app')

@section('content')
<x-services-section :judul="'Daftar UMKM di Tapanuli Selatan'" :deskripsi="'Berikut adalah UMKM yang bisa kamu kunjungi di Tapanuli Selatan.'" :items="$umkm" :phone="$kontak->no_hp"/>
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email" />
@endsection