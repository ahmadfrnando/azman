@section('nav__item-penginapan', 'active')

@extends('layouts.app')

@section('content')
<x-services-section :judul="'Penginapan di Tapanuli Tengah'" :deskripsi="'Berikut adalah rekomendasi penginapan favorit yang bisa kamu kunjungi di Tapanuli Tengah'" :items="$penginapan" :phone="$kontak->no_hp" :pesan="$pesan" :link="$linkDetail"/>
<x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection