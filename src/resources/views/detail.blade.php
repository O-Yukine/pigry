@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="weight-logs__detail">
        <div class="detail__inner">
            <div class="detail__content">
                <h2>Weight Log</h2>
                <form action="/weight_logs/{{ $weight->id }}/update" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">日付</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--date">
                                <input type="date" name="date" value="{{ $weight->date }}" placeholder="" />
                            </div>
                            <div class="form__error">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">体重</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="weight" value="{{ $weight->weight }}" placeholder="50.0" />
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
                            <span class="form__label--item">摂取カロリー</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="calories" value="{{ $weight->calories }}" />
                            </div>
                            <div class="form__error">
                                @error('calories')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">運動時間</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="time" name="exercise_time" value="{{ $weight->exercise_time }}" />
                            </div>
                            <div class="form__error">
                                @error('exersise_time')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">運動内容</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--textarea">
                                <textarea name="exercise_content">{{ $weight->exercise_content }}</textarea>
                            </div>
                            <div class="form__error">
                                @error('exersise_content')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <div class="form__button-link">
                            <a href="/weight_logs">戻る</a>
                        </div>
                        <button class="form__button-submit" type="submit">更新</button>
                        <div class="trash-can-content">
                            <a href="/weight_logs/{{ $weight->id }}/delete">
                                削除
                                {{-- <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can" /> --}}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
