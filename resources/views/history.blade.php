@extends('main')
@include('sidebar')
@include('footer')
@section('contents')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"></button>
            <span class="navbar-brand" id="page-title">貸出履歴</span>
        </div>
    </div>
</nav>
<div id="area-book-list" class="area content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">貸出履歴</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                                <th>書籍名</th>
                                <th class="index-title">作者</th>
                                <th>貸出日</th>
                                <th>返却日</th>
                            </thead>
                            <tbody>
                              @foreach ($histories as $history)
                                <tr class="library-list">
                                    <td>{{ $history->name }}</td>
                                    <td>{{ $history->writer }}</td>
                                    <td>{{ $history->rent_date }}</td>
                                    @if ($history->return_date !== null )
                                        <td>{{ $history->return_date }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
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