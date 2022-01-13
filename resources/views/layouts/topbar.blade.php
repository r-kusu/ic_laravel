@section('topbar')
<header class="header d-block">
  <div class="wrapper">
    <nav class="navbar navbar-info bg-info">

      <!-- 検索ボタン -->
      <input id="search" type="checkbox">
      <label for="search" class="open"><i class="bi bi-search text-light"></i></label>
      <label for="search" class="back"></label>
      
      <!-- 検索メニュー -->
      <aside>
        <label for="search" class="close"><i class="bi bi-x"></i></label>
        
        <div class="search">
          <!-- 検索キーワード -->
          <input type="search" placeholder="キーワード" name="" id="key">
          <!-- カテゴリー -->
          <p>カテゴリー</p>
          <select name="category" id="key">
            <option value="daily">日用品</option>
            <option value="food">食料品</option>
            <option value="book">書籍</option>
            <option value="buy">買い物リスト</option>
          </select>
          <!-- 使用場所 -->
          <p>使用場所</p>
        <select name="use-place" id="key">
          <option value="kitchen">キッチン</option>
        </select>
        <!-- 保管場所 -->
        <p>保管場所</p>
        <select name="storage-area" id="key">
          <option value="kitchen">キッチン</option>
        </select>
        <!-- 購入場所 -->
        <p>購入場所</p>
        <select name="supplier" id="key">
          <option value="drugstore">ドラッグストア</option>
          <option value="amazon">Amazon</option>
          <option value="rakuten">楽天</option>
        </select>
      </div>
      <div class="search-button">
        <button type="reset" class="btn btn-outline-dark">クリア</button>
        <button type="submit" class="btn btn-danger">この条件で検索</button>
      </div>
    </aside>
    
    <div class="category">日用品</div>
    
    <li class="create-icon list-inline-item"><a class="btn" href="#" role="button"><i class="bi bi-pencil-square text-light"></i></a></li>

    <!-- ハンバーガーメニュー部分 -->
      <div class="drawer">
        
        <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
        <input type="checkbox" id="drawer-check" class="drawer-hidden">
        
        <!-- ハンバーガーアイコン -->
        <label for="drawer-check" class="drawer-open"><span></span></label>
        
        <!-- メニュー -->
        <nav class="drawer-content">
          <ul class="drawer-list">
            <li class="drawer-item">
              <a href="">日用品</a>
            </li>
            <li class="drawer-item">
              <a href="">食料品</a>
            </li>
            <li class="drawer-item">
              <a href="">書籍</a>
            </li>
            <li class="drawer-item">
              <a href="">買い物リスト</a>
            </li>
            <li class="drawer-item">
              <a href="">会員情報</a>
            </li>
            <li class="drawer-item">
              <a href="">ログアウト</a>
            </li>
            
          </ul><!-- /.drawer-list -->
        </nav>
        
      </div>
      <!--ここまでメニュー-->
    </div>
  </li>
</ul>
</nav>
</div>
</header>
@endsection