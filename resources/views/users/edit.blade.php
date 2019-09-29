@if($user->id == Auth::id())
@extends('layouts.layout')

@section('content')
    <div class="signupPage">
        <header class="header">
            <div>プロフィールを編集</div>
        </header>
        <div class='container'>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form mt-5" method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="file_photo" class="rounded-circle userProfileImg">
                    <div class="userProfileImg_description">画像をアップロード</div>
                    <i class="fas fa-camera fa-3x"></i>
                    <input type="file" id="file_photo" name="image">
                </label>
                <div class="userImgPreview" id="userImgPreview">
                    <img id="thumbnail" class="userImgPreview_content" accept="image/*" src="">
                    <p class="userImgPreview_text">画像をアップロード済み</p>
                </div>
                <div class="form-group">
                    <label>名前</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>メールアドレス</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <div><label>性別</label></div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="sex" value="0" type="radio" id="inlineRadio1" checked>
                        <label class="form-check-label" for="inlineRadio1">男</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="sex" value="1" type="radio" id="inlineRadio2">
                        <label class="form-check-label" for="inlineRadio2">女</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>自己紹介文</label>
                    <textarea class="form-control" name="self_introduction" value="{{ $user->self_introduction }}" rows="6"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn submitBtn">変更する</button>
                    <div class="linkToLogin">
                        <a href="/">トップページへ戻る</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@endif
