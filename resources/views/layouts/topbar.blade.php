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

        <form method="get" action="">
          <input class="form-select" aria-label="Default select example" name="keyword" type="text" placeholder="キーワードを入力" value="">

          <label for="" class="select-label pb-2 pt-3">カテゴリー</label>
          <select class="form-select" aria-label="Default select example" name="category">
            <option value="">未選択</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            <!-- @foreach($categories as $key => $value)
            <option value="{{$category->id}}" {{isset($params['category']) && $params['category'] == $value ? 'selected':null}}>{{$value->name}}</option>
            @endforeach -->

          </select>

          <label for="" class="select-label pb-2 pt-3">タグ</label>
          <select class="form-select" aria-label="Default select example" name="tag">
            <option value="">未選択</option>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
            @endforeach
          </select>

          <label for="" class="select-label pb-2 pt-3">保管場所</label>
          <select class="form-select" aria-label="Default select example" name="place">
            <option value="">未選択</option>
            @foreach($items as $item)
            <option value="{{$item->id}}">{{$item->place}}</option>
            @endforeach
          </select>
          <input class="btn btn-danger" type="submit" value="検索">
        </form>
      </div>

    </div>

    <!-- ホーム -->
    <a href="{{ url('/') }}" class="home-icon btn btn-info" role="button"><i class="bi bi-house-door"></i></a>

    <!-- 閲覧中のカテゴリー名 -->
    <!-- <div class="navbar-brand">{{$category->name}}</div> -->
    <div class="navbar-brand fs-4">日用品管理</div>

    <!-- 新規登録 -->
    <a href="{{ url('/daily') }}" class="create-icon btn btn-info" role="button"><i class="bi bi-pencil-square"></i></a>

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
            <li class="list-group-item"><a href="{{ route('shortagelist') }}">買い物リスト</a></li>
            @foreach($categories as $category)
            <li class="list-group-item"><a href="{{route('list',['id'=>$category->id])}}">{{$category->name}}</a></li>
            @endforeach
            <li class="list-group-item"><a href="#">会員情報</a></li>
            <li class="list-group-item"><a href="/logout">ログアウト</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
@endsection