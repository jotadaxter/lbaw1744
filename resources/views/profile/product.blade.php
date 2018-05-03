@extends('layouts.page_registed')

@section('title', $product->name)

@section('content')
  @include('partials.product', ['product' => $product])
@endsection