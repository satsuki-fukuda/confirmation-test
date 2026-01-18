<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
            <form action="/logout" method="post">
                @csrf
                <nav>
                    <button type="submit">logout</button>
                </nav>
            </form>
        </div>
    </header>

    <main>
        <div class="admin__container">
            <h2 class="admin__title">admin</h2>
            <div class="search-form">
                <form action="/admin/search" method="get" class="search-form__inner">
                    <div class="search-form__item">
                        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
                    </div>
                    <div class="search-form__item">
                        <select name="gender">
                            <option value="">性別</option>
                            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>

                    <div class="search-form__item">
                        <select name="category_id">
                            <option value="">お問い合わせの種類</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="search-form__item">
                        <input type="date" name="date" value="{{ request('date') }}">
                    </div>

                    <div class="search-form__button">
                    <div class="search-form__button-main-actions">
                        <button class="search-form__button-submit" type="submit">検索</button>
                        <a href="/admin" class="search-form__button-reset">リセット</a>
                    </div>
                    </div>
                </form>
            </div>

                    <div class="admin-toolbar">
                        <button class="search-form__button-export" type="submit" formaction="/admin/export">エクスポート</button>
                        <div class="pagination">
                            {{ $contacts->links() }}
                        </div>
                    </div>

            <div class="admin__content">
                <div class="admin-options">
                <table class="admin-table">
                    <thead>
                        <tr class="admin-table__row">
                            <th class="admin-table__header">お名前</th>
                            <th class="admin-table__header">性別</th>
                            <th class="admin-table__header">メールアドレス</th>
                            <th class="admin-table__header">お問い合わせの種類</th>
                            <th class="admin-table__header"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($contacts as $contact)
                        <tr class="admin-table__row">
                            <td class="admin-table__item">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                            <td class="admin-table__item">
                                @if($contact->gender == 1) 男性
                                @elseif($contact->gender == 2) 女性
                                @else その他
                                @endif
                            </td>
                            <td class="admin-table__item">{{ $contact->email }}</td>
                            <td class="admin-table__item">{{ $contact->category->content ?? '' }}</td>
                            <td class="admin-table__item">
                                <a href="#modal-{{ $contact->id }}" class="admin-table__detail-btn">詳細</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    @foreach ($contacts as $contact)
                    <div id="modal-{{ $contact->id }}" class="modal-overlay">
                        <div class="modal__window">
                            <a href="#" class="modal__close">&times;</a>
                            <table class="modal-table">
                                <tr><th>お名前</th><td>{{ $contact->last_name }} {{ $contact->first_name }}</td></tr>
                                <tr><th>性別</th><td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td></tr>
                                <tr><th>メールアドレス</th><td>{{ $contact->email }}</td></tr>
                                <tr><th>電話番号</th><td>{{ $contact->tel }}</td></tr>
                                <tr><th>住所</th><td>{{ $contact->address }}</td></tr>
                                <tr><th>建物名</th><td>{{ $contact->building }}</td></tr>
                                <tr><th>お問い合わせの種類</th><td>{{ $contact->category->content ?? '' }}</td></tr>
                                <tr><th>お問い合わせ内容</th><td>{{ $contact->detail }}</td></tr>
                            </table>
                            <div class="modal__footer">
                                <form action="/admin/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                <button type="submit" class="delete-btn">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>
</html>