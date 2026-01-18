環境構築

Dockerビルド
・
・docker-compose up -d --build

Laravel環境構築
・docker-compose exec php bash
・composer install
・cp .env.example .env 環境環境を適宜変更
・php artisan key:generate
・php artisan migrate
・php artisan db:seed

開発環境
・お問い合せ画面：http://localhost/
・ユーザー登録：http://localhost/register
・ログイン画面：http://localhost/login
・管理画面：http://localhost/admin
・phpMyAdmin:http://localhost:8080/

使用技術（実行環境）
・PHP
・Laravel
・jquery
・MySQL
・nginx

ER図
<img width="767" height="423" alt="スクリーンショット 2026-01-13 13 51 23" src="https://github.com/user-attachments/assets/60f8ed0a-89f1-4a33-917b-0f89556e3404" />
