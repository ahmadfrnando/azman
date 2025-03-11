@extends('layouts.app')

@section('content')
  <x-services-section :judul="'Destinasi Wisata di Tapanuli Selatan'" :deskripsi="'Berikut adalah rekomendasi destinasi wisata favorit yang bisa kamu kunjungi di Tapanuli Selatan. Sudah siap untuk petualanganmu?'" :items="$destinasi" :phone="$kontak->no_hp"/>
  <x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection