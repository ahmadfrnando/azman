@extends('layouts.app')

@section('content')
<x-services-section :judul="'Penginapan di Tapanuli Selatan'" :deskripsi="'Berikut adalah rekomendasi penginapan favorit yang bisa kamu kunjungi di Tapanuli Selatan'" :items="$penginapan" :phone="$kontak->no_hp"/>
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email" />
@endsection