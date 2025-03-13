@section('nav__item-destinasi', 'active')
@extends('layouts.app')

@section('content')
  <x-services-section :judul="'Destinasi Wisata di Tapanuli Tengah'" :deskripsi="'Berikut adalah rekomendasi destinasi wisata favorit yang bisa kamu kunjungi di Tapanuli Tengah. Sudah siap untuk petualanganmu?'" :items="$destinasi" :phone="$kontak->no_hp" :pesan="$pesan" :link="$linkDetail"/>
  <x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection