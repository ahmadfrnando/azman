@section('nav__item-beranda', 'active')

@extends('layouts.app')

@section('content')
  <x-hero-section />
  <x-destinasi-section :destinasi="$destinasi" />
  <x-contact-section :phone="$kontak->no_hp" :email="$kontak->email"/>
@endsection