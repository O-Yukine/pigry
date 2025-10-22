@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">
@endsection

@section('content')
    <div class="weight-logs__panel">
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

        <div class="weight-logs__contents">
            <div class="weight-logs__search">
                <form class="search-form" action="/weight_logs/search" method="post">
                    @csrf
                    <input type="date" name="from">
                    〜
                    <input type="date" name="until">
                    <button class="search-form__submit">検索</button>
                </form>
                @livewire('add-weight')
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
                        <th class="weight-logs__table-header">編集</th>
                    </tr>
                    @foreach ($weights as $weight)
                        <tr class="weight-logs__table-row">
                            <td class="weight-logs__table-item">{{ $weight->date }}</td>
                            <td class="weight-logs__table-item">{{ $weight->weight }}</td>
                            <td class="weight-logs__table-item">{{ $weight->calories }}</td>
                            <td class="weight-logs__table-item">{{ $weight->exercise_time }}</td>
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
