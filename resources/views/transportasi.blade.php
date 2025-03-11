@extends('layouts.app')

@section('content')
<x-services-section :judul="'Transportasi ke Tempat Wisata Tapanuli Selatan'" :deskripsi="'Berikut adalah rekomendasi penginapan favorit yang bisa kamu kunjungi di Tapanuli Selatan'" :items="$transportasi" :phone="$kontak->no_hp"/>
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email" />
@endsection