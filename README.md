# Laravel アプリケーションのVercelへのデプロイ

## 参考記事
Laravel10をVercelに簡単にデプロイ！外部公開までの手順
https://qiita.com/Masanarea_qiita/items/2e1616e4e18f6c8ee26d

## 参考記事との差異
- WSLを利用する点。
- Laravelのインストールにsailを利用すること。(つまり、Dockerが入る)

## (重要：Vercelにアップするまでの手順)
1. Docker Desktopを起動
2. WSLで以下を実行
```
# example-appの部分は作成するプロジェクト名にする
# 時間がかかる(私の環境では30分程度)
curl -s "https://laravel.build/example-app" | bash
```
3. 作成されたプロジェクトに移動して動作確認
```
cd sample-app
./vendor/bin/sail up
```
4. Githubにプロジェクトを作成
5. プロジェクトをGit化
6. 以下コマンドでVercel関係のインストール
```
sail composer require revolution/laravel-vercel-installer --dev
sail artisan vercel:install
```
7. 『vercel.json』が生成されるので変更（記事を参考）
8. Githubにアップ
9. Vercelの設定画面で
  - 『Flamework preset』は 『Other』で選択
  - APP_KEY という環境変数を設定(Laravel の .env ファイルのAPP_KEYをそのまま入れる)
10. デプロイされたことを確認


# Sail commad

LaravelのデフォルトのDocker開発環境を操作するための軽量コマンドラインインターフェイス
sailコマンドとして使用するためにエイリアスを登録する必要がある。

## 起動
1. Docker Desktop 起動
2. sail up 

## phpコマンドの実行について
php コマンドの部分をsail に置き換える。だけ

## Node／NPMコマンドの実行
Nodeコマンドはnpmコマンドを使用して実行し、NPMコマンドはnpmコマンドを使用して実行します。
```
sail node --version

sail npm run dev
```