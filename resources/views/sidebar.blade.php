@section('sidebar')
<div class="sidebar" data-background-color="gray" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/library/index" class="simple-text">
                  My Librrary
            </a>
        </div>
        <ul class="nav">
            <li class="link" id="link-book-list">
                <a href="/library/index">
                    <i class="ti-book"></i>
                    <p>図書リスト</p>
                </a>
            </li>
            <li class="link" id="link-book-history">
              <a href="/library/history">
                <i class="ti-user"></i>
                <p>貸出履歴</p>
              </a>
            </li>
            <li class="link" id="link-book-borrowNow">
              <a href="/library/borrowNow">
                <i class="ti-pencil"></i>
                <p>貸出中リスト</p>
              </a>
            </li>
            <li class="link">
              <a href="/library/logout">
                <i class="ti-back-left">
                  <p>Logout</p>
                </i>
              </a>
            </li>
        </ul>
        <ul class="nav">
          <li class="user">
            <p><span class="login-user-name">{{ $user->name }}</span>さんがログイン中</p>
          </li>
        </ul>
    </div>
</div>
@endsection