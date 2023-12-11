@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')
<!-- Place your code at here! -->
<div id="main">
  <div class="container">
    <!-- <form action = "javascript:void(0);" method = "GET"> -->
    <input type="hidden" name="action" value="search">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm..." name="keyword" id="keyword">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
    <!-- </form>	 -->
    <br />
    <!-- Grid system -->
    <div id="search-result" class="row">
      <!-- Resulte new ajax
              -->
      @foreach($products as $product)
      <div class='col-md-4 col-sm-6 col-xs-12 thumbnail'>
        <img class='img-responsive' src='{{ $product -> ImageLink }}'>
        <p class='product-name'> {{ $product -> ProductName  }}</p>
        <p class='product-price'> {{ $product -> SalePrice }}</p>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/index.js')}}"></script>
@endsection