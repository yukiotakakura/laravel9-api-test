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
    - VPSとGitHub間で通信を行う為の公開鍵と秘密鍵を作成する
    ▼参考
    https://qiita.com/tbpgr/items/989c6badefff69377da7
    ```sh
    [root@ laravel9-api-test]# cd ~/.ssh
    [root@ ssh]# ssh-keygen -t rsa
    # 【質問1】で公開鍵と秘密鍵のファイル名を指定できる
    Enter file in which to save the key (/Users/(username)/.ssh/id_rsa):id_github_rsa
    ```
    - ~/.ssh/configを作成する
    ```
    Host github.com
        HostName github.com
        IdentityFile /root/.ssh/id_github_rsa
        User git
    ```
    - GitHub上にて公開鍵を登録する
    URL(https://github.com/settings/keys) 「title」に公開鍵名、「key」に公開鍵の中身を入れます。

    - SSH通信ができることを確認する
    ```sh
    [root@ ssh]# ssh -T git@github.com
    ```

    - laravel9-api-testをGitHub上にPUSHする
    ```sh
    [root@ ssh]# cd var/www/laravel9-api-test/
    [root@ laravel9-api-test]# git init
    [root@ laravel9-api-test]# git add .
    [root@ laravel9-api-test]# git commit -m "Laravel9 インストール直後 コミット"
    [root@ laravel9-api-test]# git branch -M main
    [root@ laravel9-api-test]# git remote add origin git@github.com:yukiotakakura/laravel9-api-test.git
    [root@ laravel9-api-test]# git push -u origin main
    ```
    GitHub上にてpushできることを確認できればOK