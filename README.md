# PJ-Sample01

## 開発環境の動作手順

### 前提
このプロジェクトでは動作確認のため、Dockerを使用しています。  
そのため、使用する端末に[Rancher Desktop](https://rancherdesktop.io/)等をインストールしてください。  
これ以降は`docker-compose`コマンドが動作するものとして説明を記載します。  

### 開発環境の起動手順
1. 下記コマンドを使用して`dockerディレクトリ`に移動します。  
   ```console
   cd <PJ-Sample01までのパス>/PJ-Sample01/docker
   ```

2. 下記コマンドを使用してイメージ・コンテナの構築をします。  
   ※オプション『-d』はバックグランド実行、『--build』はイメージを再構築するという意味です。  
   ```console
   docker-compose up -d --build
   ```

3. 【必要に応じて】  
   下記コマンドを使用してコンテナが正常に起動しているかを確認します。  
   ```console
   docker-compose ps
   ```

4. 下記コマンドを使用して`php-apacheコンテナ`に入ります。
   ```console
   docker exec -it php-apache /bin/bash
   ```

5. 【初回のみ】  
   `php-apacheコンテナ`内で下記コマンドを実行し、データベースを初期化します。
   ```console
   php artisan migrate
   php artisan db:seed
   ```

6. `php-apacheコンテナ`内で下記コマンドを実行し、開発サーバを起動します。
   ```console
   php artisan serve
   ```

7. コマンドプロンプト/ターミナルで新しいウィンドウを開き、下記コマンドを使用して`dockerディレクトリ`に移動します。  
   ```console
   cd <PJ-Sample01までのパス>/PJ-Sample01/docker
   ```

8. 下記コマンドを使用して`php-apacheコンテナ`に入ります。
   ```console
   docker exec -it php-apache /bin/bash
   ```

9. `php-apacheコンテナ`内で下記コマンドを実行し、開発環境を起動します。
   ```console
   npm run dev
   ```

以上が開発環境の起動手順です。

### 開発環境へのアクセス
- トップページへのアクセス  
   Google Chrome等のブラウザソフトを使用して[http://localhost:8000](http://localhost:8000)にアクセスするとトップページが表示されます。  

- DBへのアクセス
  MySQL Workbench等のDB操作ソフトを使用して下記にアクセスするとデータを確認することが出来ます。  
  
  |項目|値|
  |:--|:--|
  |接続方式|TCP/IP|
  |ホスト名|127.0.0.1|
  |ユーザ名|root|
  |パスワード|root|

### 開発環境の停止手順
1. 開発環境の起動手順 No.6 のコマンドプロンプト/ターミナルで『Ctrl + C』を押して開発サーバを停止します。  

2. `php-apacheコンテナ`内で下記コマンドを実行し、コンテナから抜けます。  
   ```console
   exit
   ```

3. 開発環境の起動手順 No.9 のコマンドプロンプト/ターミナルで『Ctrl + C』を押して開発環境を停止します。  

4. `php-apacheコンテナ`内で下記コマンドを実行し、コンテナから抜けます。  
   ```console
   exit
   ```

5. 下記コマンドを使用してコンテナを停止します。
   ```console
   docker-compose down
   ```

以上が開発環境の停止手順です。
