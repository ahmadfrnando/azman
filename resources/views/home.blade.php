@section('nav__item-beranda', 'active')

@extends('layouts.app')

@section('content')
  <x-hero-section />
  @if($destinasi->count() > 0)
  <x-destinasi-section :destinasi="$destinasi" />
  @endif
  <x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection