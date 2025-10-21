@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register_step2.css') }}">
@endsection

@section('content')
    <div class="register-form__content">
        <div class="register-form__heading">
            <h2>新規会員登録</h2>
        </div>
        <form class="form" action="/register/step2" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">現在の体重</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="weight" />
                    </div>
                    <div class="form__error">
                        @error('weight')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">目標の体重</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="target_weight" />
                    </div>
                    <div class="form__error">
                        @error('target_weight')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection
