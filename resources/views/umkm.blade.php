@section('nav__item-umkm', 'active')

@extends('layouts.app')

@section('content')
<x-services-section :judul="'Daftar UMKM di Tapanuli Tengah'" :deskripsi="'Berikut adalah UMKM yang bisa kamu kunjungi di Tapanuli Tengah.'" :items="$umkm" :phone="$kontak->no_hp" :pesan="$pesan" :link="$linkDetail"/>
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection