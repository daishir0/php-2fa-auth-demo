## Overview
A PHP-based demonstration application implementing Two-Factor Authentication (2FA) using Google Authenticator. This project showcases a complete authentication system with user registration, login, and TOTP (Time-based One-Time Password) verification.

## Installation

1. Clone the repository
```bash
git clone https://github.com/daishir0/php-2fa-auth-demo.git
cd php-2fa-auth-demo
```

2. Install dependencies using Composer
```bash
composer install
```

3. Set up file permissions
```bash
chmod 777 config.php
```

4. Configure your web server to point to the project directory

5. Access the application through your web browser

## Usage

1. Sign up for a new account:
   - Navigate to the sign-up page
   - Enter your desired user ID and password
   - Submit the form

2. Set up 2FA:
   - After signing up, log in with your credentials
   - You'll be prompted to set up 2FA
   - Scan the QR code with Google Authenticator app
   - Enter the verification code

3. Regular login:
   - Enter your user ID and password
   - When prompted, enter the 6-digit code from Google Authenticator
   - You'll be logged in after successful verification

## Notes

- Ensure that the config.php file is writable by the web server
- For security in production, implement proper file permission management
- The application uses session-based authentication
- TOTP codes are verified with a 2-step window (±1 minute)
- The Google Authenticator library is from PHPGangsta

## License
This project is licensed under the MIT License - see the LICENSE file for details.

---

# php-2fa-auth-demo

## 概要
Google Authenticatorを使用した2要素認証（2FA）を実装したPHPのデモンストレーションアプリケーションです。このプロジェクトでは、ユーザー登録、ログイン、TOTP（時間ベースのワンタイムパスワード）認証を含む完全な認証システムを紹介しています。

## インストール方法

1. レポジトリをクローン
```bash
git clone https://github.com/daishir0/php-2fa-auth-demo.git
cd php-2fa-auth-demo
```

2. Composerで依存関係をインストール
```bash
composer install
```

3. ファイルのパーミッションを設定
```bash
chmod 777 config.php
```

4. Webサーバーをプロジェクトディレクトリに向けるよう設定

5. Webブラウザからアプリケーションにアクセス

## 使い方

1. 新規アカウントの登録:
   - サインアップページに移動
   - 希望するユーザーIDとパスワードを入力
   - フォームを送信

2. 2FAの設定:
   - サインアップ後、認証情報でログイン
   - 2FA設定の画面が表示される
   - Google Authenticatorアプリでシークレットキーをスキャン
   - 認証コードを入力

3. 通常のログイン:
   - ユーザーIDとパスワードを入力
   - プロンプトが表示されたら、Google Authenticatorの6桁コードを入力
   - 認証成功後、ログインが完了

## 注意点

- config.phpファイルがWebサーバーから書き込み可能であることを確認
- 本番環境では、適切なファイルパーミッション管理を実装すること
- セッションベースの認証を使用
- TOTPコードは2ステップウィンドウ（±1分）で検証
- Google Authenticatorライブラリは PHPGangsta のものを使用

## ライセンス
このプロジェクトはMITライセンスの下でライセンスされています。詳細はLICENSEファイルを参照してください。
