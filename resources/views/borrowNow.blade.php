@extends('main')
@include('sidebar')
@include('footer')
@section('contents')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"></button>
            <span class="navbar-brand" id="page-title">貸出中リスト</span>
        </div>
    </div>
</nav>
<div id="area-book-list" class="area content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">貸出中リスト</h4>
                    </div>
                    <div class="warning" id="warning" style="text-align:center">借りた日から7日以内に返却しましょう。</div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-hover">
                              <thead>
                                  <th>書籍名</th>
                                  <th class="index-title">作者</th>
                                  <th>貸出日</th>
                                  <th>返却予定日</th>
                              </thead>
                              <tbody>
                                  @foreach ($borrows as $borrow)
                                    <tr class="library-list">
                                        <td>{{ $borrow->name }}</td>
                                        <td>{{ $borrow->writer }}</td>
                                        <td>{{ $borrow->rent_date }}</td>
                                        <td>{{ $borrow->return_due_date }}</td>
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