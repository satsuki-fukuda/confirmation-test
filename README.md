<h1>環境構築</h1>

<h2>Dockerビルド</h2>
<p>
・<br />
・docker-compose up -d --build
</p>

<h2>Laravel環境構築</h2>
<p>
・docker-compose exec php bash<br />
・composer install<br />
・cp .env.example .env 環境環境を適宜変更<br />
・php artisan key:generate<br />
・php artisan migrate<br />
・php artisan db:seed<br />
</p>

<h2>開発環境</h2>
<p>
・お問い合せ画面：http://localhost/<br />
・ユーザー登録：http://localhost/register<br />
・ログイン画面：http://localhost/login<br />
・管理画面：http://localhost/admin<br />
・phpMyAdmin:http://localhost:8080/<br />
</p>

<h2>使用技術（実行環境）</h2>
<p>
・PHP<br />
・Laravel<br />
・jquery<br />
・MySQL<br />
・nginx<br />
</p>

<h2>ER図</h2>
<img width="767" height="423" alt="スクリーンショット 2026-01-13 13 51 23" src="https://github.com/user-attachments/assets/60f8ed0a-89f1-4a33-917b-0f89556e3404" />
