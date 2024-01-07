@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/manage-post.css')}}">
<link rel="stylesheet" href="{{ asset('css/snackbar.css')}}">
@endsection

@section('content')
@auth
<div id="main">
  <div class="container">
    <h2>Quản lý tin đăng</h2>
    <br />
    <div id="wb_LayoutGrid1">
      <div id="LayoutGrid1">
        <div class="row">
          <div class="col-1">
            <div id="wb_Extension1" style="display:inline-block;width:100%;z-index:0;">
              <div id="Extension1">
                <div class="header">
                  <table>
                    <tbody>
                      <tr>
                        <td style="padding-left:0;width:100%"><button class="button" onclick="window.location='/create-post'">Add Record</button></td>

                      </tr>
                    </tbody>
                  </table>
                </div>
                <table class="table">
                  <tbody id="myTable">
                    <tr class="thead">
                      <th>Id</th>
                      <th>ProductName</th>
                      <th>SalePrice</th>
                      <th>CategoryName</th>
                      <th></th>
                      <th></th>
                    </tr>

                    @foreach($products as $product)
                    <tr class="">
                      <th>{{ $product->Id }}</th>
                      <th>{{ $product->ProductName }}</th>
                      <th>{{ $product->SalePrice }}</th>
                      <th>{{ $product->CategoryName }}</th>
                      <th><a href="/edit-post?id={{ $product->Id }}" class="button edit-btn">Edit</a></th>
                      {{-- <th><a class="button delete-btn">Delete</a></th> --}}
                      <th>
                        <form action="/controller/delete-post" method="post">
                          @csrf
                          <input style="display: none;" type="text" name="id" id="" value="{{ $product->Id }}">
                          <button class="button delete-btn" type="submit">Delete</button>
                        </form>
                      </th>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                <button class="button" type="button">See more</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@if(!empty($message))
<div id="snackbar">{{ $message }}</div>
@endif

@else
<script type="text/javascript">
  window.location = "{{ url('/auth/login') }}";
</script>
@endauth
@endsection

@section('js')
<script src="{{ asset('js/snackbar.js') }}"></script>
<script src="jquery-3.4.1.min.js"></script>
<script src="util.min.js"></script>
<script src="alert.min.js"></script>
<script src="{{ asset('js/manage-post.js')}}"></script>
@endsection