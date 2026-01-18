@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>Confirm</h2>
        </div>
        <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table__container">
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <span>{{ $contact['last_name'] }}&nbsp;{{ $contact['first_name'] }}</span>
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                    @php
                        $gender = ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact['gender']] ?? 'その他';
                    @endphp
                        <span>{{ $gender }}</span>
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <span>{{ $contact['email'] }}</span>
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                    @php
                        $t1 = $contact['tel_1'] ?? $contact['tel1'] ?? '';
                        $t2 = $contact['tel_2'] ?? $contact['tel2'] ?? '';
                        $t3 = $contact['tel_3'] ?? $contact['tel3'] ?? '';
                        $tel = $t1 . $t2 . $t3;
                    @endphp
                        <span>{{ $tel }}</span>
                        <input type="hidden" name="tel_1" value="{{ $t1 }}" />
                        <input type="hidden" name="tel_2" value="{{ $t2 }}" />
                        <input type="hidden" name="tel_3" value="{{ $t3 }}" />
                        <input type="hidden" name="tel" value="{{ $tel }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <span>{{ $contact['address'] }}</span>
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <span>{{ $contact['building'] }}</span>
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                    @php
                        $categories = [
                            '1' => '商品のお届けについて',
                            '2' => '商品の交換について',
                            '3' => '商品トラブル',
                            '4' => 'ショップへのお問い合わせ',
                            '5' => 'その他'
                        ];
                        $category_content = $categories[$contact['category_id']] ?? '不明';
                    @endphp
                        <span>{{ $category_content }}</span>
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <span>{{ $contact['detail'] }}</span>
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                    </td>
                </tr>
            </table>
        </div>
        </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
                <button class="form__button-back" type="button" onclick="history.back()">修正</button>
        </div>
        </form>
    </div>
@endsection
