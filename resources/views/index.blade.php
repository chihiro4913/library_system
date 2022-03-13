@extends('main')
@include('sidebar')
@include('footer')
@section('contents')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"></button>
            <span class="navbar-brand" id="page-title">図書リスト</span>
        </div>
    </div>
</nav>
<div id="area-book-list" class="area content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">図書リスト</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <div class="content search-form">
                        <form class="search-form">
                        @csrf
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            <div class="form-group">
                                <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="図書を探す" aria-label="検索...">
                            </div>
                            <input type="submit" value="検索" class="btn btn-primary">
                        </form>
                        <table class="table table-hover">
                            <thead>
                                <th>No.</th>
                                <th class="index-title">タイトル</th>
                                <th>作者</th>
                            </thead>
                            <tbody>
                              @foreach ($libraries as $library)
                                <tr class="library-list">
                                    <td>{{ $library->id }}</td>
                                    <td>{{ $library->name }}</td>
                                    <td>{{ $library->writer }}</td>
                                    <td>
                                        @if ($library->user_id === 0)
                                            <form action="/library/borrow" method="get">
                                            @csrf
                                                <input class="btn btn-info" type="submit" value="借りる" />
                                                <input input type="hidden" name="id" value="{{ $library->id }}">
                                            </form>
                                        @elseif ($library->user_id === Auth::id())
                                            <form action="/library/return" method="post">
                                            @csrf
                                                <input class="btn btn-danger" type="submit" value="返却する" />
                                                <input input type="hidden" name="id" value="{{ $library->id }}">
                                            </form>
                                        @else    
                                            <input class="btn btn-success" type="submit" value="貸出中" disabled>
                                            <input input type="hidden" name="id" value="{{ $library->id }}">
                                        @endif
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center ">
                            {{ $libraries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection