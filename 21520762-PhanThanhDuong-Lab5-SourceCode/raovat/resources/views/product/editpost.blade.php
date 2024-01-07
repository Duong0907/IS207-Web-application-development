@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit-post.css')}}">
<link rel="stylesheet" href="{{ asset('css/snackbar.css')}}">
@endsection

@section('content')
@auth
<!-- Place your code at here! -->
<div id="main">		
  <form class="container" action="/controller/edit-post" method="post">
    @csrf
    <h2>Chỉnh Sửa Tin</h2>
    <br/>
    <div class="form-group" style="display: none">
      <label for="txtId">Id</label>
      <input type="text" class="form-control" id="txtId" name="Id" placeholder="" value="{{ $product->Id }}">
    </div>
    <div class="form-group">
      <label for="txtProductName">Tên sản phẩm</label>
      <input type="text" class="form-control" id="txtProductName" name="ProductName" placeholder="Iphone 6 like new 99%" value="{{ $product->ProductName }}">
    </div>
    <div class="form-group">
      <label for="txtPrice">Giá bán</label>
      <input type="text" class="form-control" id="txtPrice" name="SalePrice" placeholder="8000000" value=" {{ $product->SalePrice }}">
    </div>
    <div class="form-group">
      <label for="txtCategory">Loại</label>
      <input type="text" class="form-control" id="txtCategory" name="CategoryName" placeholder="Camera,Phone,..." value=" {{ $product->CategoryName }}">
    </div>
    <div class="form-group">
      <label for="txtImageLink">Link hình ảnh</label>
      <input type="text" class="form-control" id="txtImageLink" name="ImageLink" placeholder="http://static.lazada.vn/p/image-33784-1-product.jpg" value=" {{ $product->ImageLink }}">
    </div>
    <div class="form-group">
      <label for="txtImageLink">Link sản phẩm</label>
      <input type="text" class="form-control" id="txtProductLink" name="ProductLink" placeholder="http://lazada.vn/product/iphone-8.html" value=" {{ $product->ProductLink }}">
    </div>
    <div class="input-group-btn">
      <button class="btn btn-danger" type="submit">Cập Nhật</button>
    </div>
    <br/>        
  </form>
</div>


@if ($errors->any())
<div id="snackbar">{{ $errors->all()[0] }}</div>
<script src="{{ asset('js/snackbar.js') }}"></script>
@endif


@else
<script type="text/javascript">
  window.location = "{{ url('/auth/login') }}";
</script>
@endauth
@endsection

@section('js')
<script src="{{ asset('js/edit-post.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection