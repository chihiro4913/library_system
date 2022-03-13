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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection