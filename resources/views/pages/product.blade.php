@extends('layouts.page_unregisted')

@section('title', $product->name)

@section('content')
  @include('partials.product', ['product' => $product])
@endsection