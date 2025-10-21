@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">
@endsection

@section('content')
    <div class="attendance__content">
        <div class="weight-table">
            <table class="weight-table__inner">
                <tr class="weight-table__row">
                    <th class="weight-table__header">目標体重</th>
                    <th class="weight-table__header">目標まで</th>
                    <th class="weight-table__header">最新体重</th>
                </tr>
                <tr class="weight-table__row">
                    <td class="weight-table__item">
                        {{ $weight_target->target_weight }}kg</td>
                    <td class="weight-table__item">{{ $remaining }}kg</td>
                    <td class="weight-table__item">{{ $latest_weight->weight }}kg
                    </td>
                </tr>
            </table>

        </div>

        <!-- 📩 モーダル本体 -->
        <div class="modal" id="weight-modal">
            <!-- 背景をクリックで閉じる -->
            <a href="#" class="modal-overlay"></a>
            <div class="modal__inner">
                <div class="modal__content">
                    <h2>Weight Logを追加</h2>
                    <form action="/weight_logs/create" method="POST">
                        @csrf
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">日付</span>
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--date">
                                    <input type="date" name="date" placeholder="" />
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
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="text" name="weight" placeholder="50.0" />
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
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="text" name="calories" placeholder="1200" />
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
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="time" name="exercise_time" placeholder="1200" />
                                </div>
                                <div class="form__error">
                                    @error('exercise_time')
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
                                    <textarea name="exercise_content" placeholder="運動内容を追加"></textarea>
                                </div>
                                <div class="form__error">
                                    @error('exersise_content')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form__button">
                            <a href="/weight_logs">戻る</a>
                            <button class="form__button-submit" type="submit">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="weight-logs__contents">
            <div class="weight-logs__search">
                <form class="search-form" action="/weight_logs/search" method="post">
                    @csrf
                    <input type="date" name="from">
                    〜
                    <input type="date" name="until">
                    <button class="search-form__submit">検索</button>
                </form>
                <!-- 🔘 モーダルを開くボタン -->
                <a href="#weight-modal" class="open-modal-btn">データ追加</a>
            </div>
            <div class="weight-log__search-result">
                @if (request('from') && request('until'))
                    <p> {{ request('from') }}〜{{ request('until') }} の検索結果 &nbsp{{ $counts }}件</p>
                    <a href="/weight_logs" class="search-reset">リセット</a>
                @endif
            </div>
            <div class="weight-logs__table">
                <table class="weight-logs__table-inner">
                    <tr class="weight-logs__table-row">
                        <th class="weight-logs__table-header">日付</th>
                        <th class="weight-logs__table-header">体重</th>
                        <th class="weight-logs__table-header">食事摂取カロリー</th>
                        <th class="weight-logs__table-header">運動時間</th>
                        <th class="weight-logs__table-header">運動内容</th>
                        <th class="weight-logs__table-header">編集</th>
                    </tr>
                    @foreach ($weights as $weight)
                        <tr class="weight-logs__table-row">
                            <td class="weight-logs__table-item">{{ $weight->date }}</td>
                            <td class="weight-logs__table-item">{{ $weight->weight }}</td>
                            <td class="weight-logs__table-item">{{ $weight->calories }}</td>
                            <td class="weight-logs__table-item">{{ $weight->exercise_time }}</td>
                            <td class="weight-logs__table-item">{{ $weight->exercise_content }}</td>
                            <td class="weight-logs__table-item">
                                <form action="/weight_logs/{{ $weight->id }}" class="form" method="get">
                                    <button class="weight-logs__button-submit">更新</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{ $weights->links() }}
        </div>
    </div>
@endsection
