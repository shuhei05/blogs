@extends('layout')
@section('title','ブログ一覧')
@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset-2">
      <h2>ブログ記事一覧</h2>
      @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg')}}
            </p>
      @endif
      <table class="table table-striped">
          <tr>
              <th>記事番号</th>
              <th>タイトル</th>
              <th>日付</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($blogs as $blog)
          <tr>
              <td>{{ $blog->id }}</td>
              <td><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</td>
              <td>{{ $blog->update_at }}</td>
              <td><button type="button" class="btn btn-primary" onclick="location.href=
              '/blog/edit/{{ $blog->id }}'">編集</button></td>
              <form method="POST" action="{{ route('delete', $blog->id) }}" onSubmit="return checkDelete()">
              @csrf
              <td><button type="button" class="btn btn-primary" onclick=>削除</button></td>
          </tr>
          @endforeach
      </table>
 </div>
</div>
@endsection