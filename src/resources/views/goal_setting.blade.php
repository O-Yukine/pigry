@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="target-weight">
            <h2>目標体重設定</h2>
            <input class="target-weight__input"type="text">
            <p>kg</p>
            <div class="button-group">
                <a href="/weight_logs">戻る</a>
                <button class="target-weight__submit" type="submit">更新</button>
            </div>
        </div>
    </div>
@endsection
