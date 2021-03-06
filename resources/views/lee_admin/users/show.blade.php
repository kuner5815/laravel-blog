@extends('layouts.leeAdmin')

@section('content')
<div class="col-md-12">
    <h4 class="page-header">Dashboard</h1>
</div>
    <div class="panel panel-default col-md-12 ">

        @include('common._error')
        <div class="panel-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="name-field">用户名</label>
                    <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name ) }}" />
                </div>
                <div class="form-group">
                    <label for="email-field">邮 箱</label>
                    <input class="form-control" readonly type="text" name="email" id="email-field" value="{{ old('email', $user->email ) }}" />
                </div>
                <div class="form-group">
                    <label for="introduction-field">个人简介</label>
                    <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{ old('introduction', $user->introduction ) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="introduction-field">注册于</label>
                    <div class="well well-sm">
                        {{ $user->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="avatar-label">用户头像</label>
                    <input type="file" name="avatar">

                    @if($user->avatar)
                        <br>
                        <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>


@endsection
