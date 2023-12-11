<nav class="navbar navbar-inverse">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:#222;" class="navbar-brand" href="/">RaoVat.Com</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      
      <div class="collapse navbar-collapse" id="navbar-collapse">
        @auth
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/controller/logout">Đăng xuất</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/create-post">Đăng Tin</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/manage-post">Quản Lý Tin Đăng</a></li>
          </ul>
        @else
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/register">Đăng ký</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Đăng nhập</a></li>
          </ul>
        @endauth
      </div>
    </div>
  </nav>