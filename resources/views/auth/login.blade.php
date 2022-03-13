@extends('main')
@include('footer')
@section('sidebar')
<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/library/index" class="simple-text">
                My  Library
            </a>
        </div>
        <ul class="nav">
            <li class="link">
                <a href="/library/index">
                    <i class="ti-book"></i>
                    <p>図書リスト</p>
                </a>
            </li>
            <li class="link" id="link-book-list">
                <a href="/library/history">
                    <i class="ti-user"></i>
                    <p>貸出履歴</p>
                </a>
            </li>
            <li class="link" id="link-book-list">
                <a href="/library/borrowNow">
                    <i class="ti-pencil"></i>
                    <p>貸出履歴</p>
                </a>
            </li>
            <li class="link">
                <a href="/library/logout">
                    <i class="ti-back-left"></i>
                    <p>Logout</p>
                </a>
            </li>
            <li class="link">
              <a href="/register">
                <i class="ti-back-right"></i>
                <p>新規登録</p>
              </a>
            </li>
        </ul>
    </div>
</div>
@endsection
@section('contents')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"></button>
            <span class="navbar-brand" id="page-title">ログイン</span>
        </div>
    </div>
</nav>
<div id="area-book-list" class="area content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">メールアドレス</label>
                                        <input type="email" name="email" class="form-control border-input" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">パスワード</label>
                                        <input type="password" name="password" class="form-control border-input" placeholder="password">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">ログイン</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
