@section('nav__item-transportasi', 'active')

@extends('layouts.app')

@section('content')
<x-services-section :judul="'Transportasi ke Tempat Wisata Tapanuli Tengah'" :deskripsi="'Berikut adalah rekomendasi penginapan favorit yang bisa kamu kunjungi di Tapanuli Tengah≈'" :items="$transportasi" :phone="$kontak->no_hp" :pesan="$pesan" :link="$linkDetail"/>
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection