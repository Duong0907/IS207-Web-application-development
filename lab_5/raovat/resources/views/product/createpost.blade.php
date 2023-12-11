@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create-post.css')}}">
<link rel="stylesheet" href="{{ asset('css/snackbar.css')}}">
@endsection

@section('content')
<!-- Place your code at here! -->
@auth
<div id="main">
  <form class="container" id="txtStatus" action="/controller/create-post" method="post">
    @csrf
    <h2>Đăng tin miễn phí</h2>
    <br />
    <div class="form-group">
      <label for="txtProductName">Tên sản phẩm</label>
      <input type="text" class="form-control" name="ProductName" id="txtProductName" placeholder="Iphone 6 like new 99%">
    </div>
    <div class="form-group">
      <label for="txtPrice">Giá bán</label>
      <input type="text" class="form-control" name="SalePrice" id="txtPrice" placeholder="8000000">
    </div>
    <div class="form-group">
      <label for="txtCategory">Loại</label>
      <input type="text" class="form-control" name="CategoryName" id="txtCategory" placeholder="Camera,Phone,...">
    </div>
    <div class="form-group">
      <label for="txtImageLink">Link hình ảnh</label>
      <input type="text" class="form-control" name="ImageLink" id="txtImageLink" placeholder="http://static.lazada.vn/p/image-33784-1-product.jpg">
    </div>
    <div class="form-group">
      <label for="txtImageLink">Link sản phẩm</label>
      <input type="text" class="form-control" name="ProductLink" id="txtProductLink" placeholder="http://lazada.vn/product/iphone-8.html">
    </div>
    <div class="input-group-btn">
      <button class="btn btn-danger" type="submit">Đăng tin</button>
    </div>
    <br />
  </form>
</div>

@if ($errors->any())
<div id="snackbar">{{ $errors->all()[0] }}</div>
@endif

@else
<script type="text/javascript">
  window.location = "{{ url('/auth/login') }}";
</script>
@endauth
@endsection

@section('js')
<script src="{{ asset('js/snackbar.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection