@extends('admin.admin')

@section('title')

<title>Page Admin</title>

@endsection

@section('content')

  <div class="content-wrapper">
    @include('admin.content-header',['name' => 'Home' , 'key' => ''])

    <div class="content">
      <div class="container-fluid">
        </div>
      </div>
    </div>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>

@endsection
