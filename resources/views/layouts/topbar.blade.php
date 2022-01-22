@section('topbar')
<header>
  <nav class="navbar navbar-info bg-info fixed-top">
    <!-- 検索 -->
    <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="bi bi-search"></i>
    </button>
    <!-- 検索中身 -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <label for="" class="select-label pb-2 pt-3">カテゴリー</label>
        <select class="form-select" aria-label="Default select example">
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>

        <label for="" class="select-label pb-2 pt-3">タグ</label>
        <select class="form-select" aria-label="Default select example">
          <option value="1">One</option>
          <option value="4">Two</option>
          <option value="3">Three</option>
        </select>

        <label for="" class="select-label pb-2 pt-3">使用場所</label>
        <select class="form-select" aria-label="Default select example">
          <option value="1">One</option>
          <option value="4">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
    </div>

    <!-- 閲覧中のカテゴリー名 -->
    <div class="navbar-brand">日用品</div>

    <!-- 新規登録 -->
    <button class="create-icon btn btn-info" type="button"><a href="#"><i class="bi bi-pencil-square"></i></a></button>

    <!-- ハンバーガーメニュー -->
    <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></button>
    <!-- ハンバーガーメニュー中身 -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="dropdown mt-3">
          <ul class="list-group list-group-flush">


            <!-- ループ処理 -->
            <li class="list-group-item"><a href="#">日用品</a></li>
            <li class="list-group-item"><a href="#">食料品</a></li>
            <li class="list-group-item"><a href="#">買い物リスト</a></li>
            <!-- ループ処理 -->

            <li class="list-group-item"><a href="#">会員情報</a></li>
            <li class="list-group-item"><a href="#">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>












@endsection