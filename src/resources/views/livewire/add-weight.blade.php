<div>
    <!-- 🔘 モーダルを開くボタン -->
    <button wire:click="openModal" class="open-modal-btn">データ追加</button>
    <!-- 📩 モーダル本体 -->
    @php
        $showModal = $errors->any() ? true : $showModal;
    @endphp
    @if ($showModal)
        <div class="modal">
            <div class="modal__inner">
                <div class="modal__content">
                    <h2>Weight Logを追加</h2>
                    <form action="/weight_logs/create" method="post">
                        @csrf
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">日付</span>
                                <span class="form__label--required">必須</span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--date">
                                    <input type="date" wire:model="date" name="date" placeholder="" />
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
                                    <input type="text" name="weight" wire:model="weight" placeholder="50.0" />
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
                                    <input type="text" name="calories" wire:model="calories" placeholder="1200" />
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
                                    <input type="time" name="exercise_time" wire:model="exercise_time"
                                        placeholder="1200" />
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
                                    <textarea name="exercise_content"wire:model="exercise_content" placeholder="運動内容を追加"></textarea>
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
                            <button wire:click="closeModal" class="form__button-submit" type="submit">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> {{-- Nothing in the world is as soft and yielding as water. --}}
    @endif
</div>
