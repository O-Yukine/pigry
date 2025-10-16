@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">
@endsection

@section('content')
    <div class="attendance__content">
        <div class="attendance__panel">
            <form class="attendance__button">
                <button class="attendance__button-submit" type="submit">勤務開始</button>
            </form>
            <form class="attendance__button">
                <button class="attendance__button-submit" type="submit">勤務終了</button>
            </form>
            <!-- 🔘 モーダルを開くボタン -->
            <a href="#weight-modal" class="open-modal-btn">データ追加</a>

            <!-- 📩 モーダル本体 -->
            <div class="modal" id="weight-modal">
                <!-- 背景をクリックで閉じる -->
                <a href="#" class="modal-overlay"></a>
                <div class="modal__inner">
                    <div class="modal__content">
                        <h2>Weight Logを追加</h2>
                        <form action="/" method="POST">
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
                                        <!--バリデーション機能を実装したら記述します。-->
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
                                        <!--バリデーション機能を実装したら記述します。-->
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
                                        <!--バリデーション機能を実装したら記述します。-->
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
                                        <!--バリデーション機能を実装したら記述します。-->
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

        </div>
        <div class="attendance-table">
            <table class="attendance-table__inner">
                <tr class="attendance-table__row">
                    <th class="attendance-table__header">名前</th>
                    <th class="attendance-table__header">開始時間</th>
                    <th class="attendance-table__header">終了時間</th>
                </tr>
                <tr class="attendance-table__row">
                    <td class="attendance-table__item">サンプル太郎</td>
                    <td class="attendance-table__item">サンプル</td>
                    <td class="attendance-table__item">サンプル</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
