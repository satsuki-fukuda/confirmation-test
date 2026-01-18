@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>
        <form class="form" action="/contacts/confirm" method="post">
        @csrf
            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--flex">
            <div class="form__input--text">
                <input type="text" name="last_name" placeholder="例: 山田"value="{{ old('last_name') }}" />
            </div>
            <div class="form__input--text">
                <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
            </div>
            </div>
            <div class="form__error">
                @error('last_name')
                    {{ $message }}
                @enderror
                @error('first_name')
                    {{ $message }}
                @enderror
            </div>
            </div>
            </div>

            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--radio">
                <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }} /> 男性</label>
                <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} /> 女性</label>
                <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} /> その他</label>
            </div>
            <div class="form__error">
                @error('gender')
                    {{ $message }}
                @enderror
            </div>
            </div>
            </div>

            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--text">
                <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            </div>
            </div>

            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--tel">
                <input type="tel" name="tel_1" placeholder="090" value="{{ old('tel_1') }}" />
                <span>-</span>
                <input type="tel" name="tel_2" placeholder="1234" value="{{ old('tel_2') }}" />
                <span>-</span>
                <input type="tel" name="tel_3" placeholder="5678" value="{{ old('tel_3') }}" />
            </div>
            <div class="form__error">
                @error('tel_1')
                    {{ $message }}
                @enderror
                @error('tel_2')
                    {{ $message }}
                @enderror
                @error('tel_3')
                    {{ $message }}
                @enderror
            </div>
            </div>
            </div>

            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
            </div>
            <div class="form__error">
                @error('address')
                    {{ $message }}
                @enderror
            </div>
            </div>
            </div>

            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
            </div>
            </div>

            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--select">
                <select name="category_id" required>
                    <option value="">選択してください</option>
                    <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
                    <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
                    <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            <div class="form__error">
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>
            </div>
            </div>

            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
            <div class="form__input--textarea">
                <textarea name="detail" placeholder="お問い合わせ内容を記載ください">{{ old('detail') }}</textarea>
            </div>
            <div class="form__error">
                @error('detail')
                    {{ $message }}
                @enderror
            </div>
            </div>
            </div>

            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
        </div>
        </form>
    </div>
@endsection
