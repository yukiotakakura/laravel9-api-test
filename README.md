## 環境構築手順

### 前提条件
- 

### 手順
- サブドメイン取得を取得する。取得方法は(https://www.tweeeety.blog/entry/2015/05/06/212529)

- サブドメイン専用のVirtualHostを作成

/etc/httpd/conf.d/laravel9.api.test.takacube.com.conf
```
aaa
```

- Laravelプロジェクトを作成する
```sh
# まずはディレクトリ構造を確認する
[root@ www]# cd /var/www
[root@ www]# ls
cgi-bin  exment  wordpress

# composerでLaravel9をインストールする
# 「-prefer-dist」オプションでzipからダウンロードする。
[root@ www]# composer create-project --prefer-dist laravel/laravel laravel9-api-test "9.*"

# Laravelプロジェクトが作成されていることを確認する
[root@ www]# ls
cgi-bin  exment  laravel9-api-test  wordpress
```

- LaravelプロジェクトをGitHubにプッシュする
    - GitHub上にてリモートリポジトリを作成する
    - VPSに潜って以下コマンドを実行する


