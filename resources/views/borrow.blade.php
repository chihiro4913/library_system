@extends('main')
@include('sidebar')
@include('footer')
@section('contents')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"></button>
            <span class="navbar-brand" id="page-title">貸出書籍</span>
        </div>
    </div>
</nav>
<div id="area-book-list" class="area content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">書籍情報</h4>
                    </div>
                    <div class="content">
                        <form action="/library/borrow" method="post">
                        @csrf
                            <div class="author">
                                <p class="borrow-book-title">書籍名: {{ $library->name }}</p>
                                <br>
                                <p class="borrow-book-writer">作者: {{ $library->writer }}</p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-fill btn-wd">借りる</button>
                                <input type="hidden" name="id" value="{{ $library->id }}">
                            </div>
                            <div class="clearfix"></div>
                        </form>
                        <a href="http://localhost/library/index">図書リストへ戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection