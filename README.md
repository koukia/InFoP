# InFoP

## InFoP - Inquery Form by PHP

PHP を用いた お問い合わせフォーム
## 使い方
### 起動
1. `docker-compose up -d`
2. ブラウザで`http://localhost:8080`にアクセス
### 終了
1. `docker-compose down`
2. `docker-compose ps` で確認
### DB 確認
1. ブラウザで`http://localhost:8081`にアクセス
2. phpMyAdmin にアクセスできるのでDBが確認可能
## 開発環境
- PHP 7.4-fpm
- nginx 1.17.9 (バージョン固定していない)
- mydwl 5.7
- phpMyAdmin 5.0.1 (バージョン固定していない)
- Docker version 18.09.1
- docker-compose version 1.21.0
## 実装に費やした時間
- 25時間 (だいたい)
## 実装中に問題となったこと/工夫したところ
- PHP のファイルわけ
  - www/html/ にHTMLを含むPHPファイルを入れて、php/にスクリプト単位でPHPファイルを置いた
- Docker での テスト環境構築
  - composer の Docker イメージ を PHP の Docker イメージ内にコピーして, PHP のDockerイメージ からcomposerを使いphpunit をインストールしてテストコードを動かす
  - 本番用のDockerイメージにはテストを除くようにする必要がある．
- phpMyAdmin のdockerイメージに権限エラーでアクセスできなかった
  - php/data/ 内のDB自体のデータがキャッシュされているのが原因だったため、rm で解決できた
- PDOでデータ登録する方法として、prepareメソッドであとから変数を指定する方法を試したがsytax error となり、想定外に時間を要した
  - 結局、SQL文作成時に変数を展開する実装にした
- メールによる登録完了の通知は実装していない
## 改善点
- 特になし
## 動作テスト
- PHPプログラムは、phpunit
- DB 登録はphpMyAdminで目視で確認
- 一通りの動作テストは、人力で入力ページから完了ページまで人力した
  - 項目の異常・正常時の判定部分はテストコードがあるので表示の確認のみ
## 参考資料/参考サイト
- 環境構築
  - https://qiita.com/nemui_/items/f911be7ffa4f29293fd5
  - https://qiita.com/kotarella1110/items/634f6fafeb33ae0f51dc
- 入力フォーム
  - https://developer.mozilla.org/ja/docs/Learn/HTML/Forms/Sending_and_retrieving_form_data
- 問合せフォーム
  - http://www.kanda-it-school.com/sample/php/seminar/php_seminar_sample_code/ch04_2.php
- ファイルわけ
  - https://shellcat.hatenadiary.org/entry/20091006/1254834870
- 入力値のバリデーション
  - https://techacademy.jp/magazine/22847
  - http://life-collections.com/dev/programming/php_validation_check#10
  - https://qiita.com/tukiyo3/items/b994ffafb7f01e79fe34
- phpunit
  - https://qiita.com/engineerjyef/items/6d54b8edcc636e29c1e2
    - `$ docker-compose run php composer update`
- DB PDO
    - https://gray-code.com/php/insert-data-by-using-pdo/
- HTML
    - https://www.hs.cuc.ac.jp/teachers/math/html/4-4.htm

## 画面フロー

フォームの動作は以下の流れに従うものとします。
1. フォームページ
- 項目、入力方法、条件は以下のとおりです。
  - 件名 - セレクトボックス(選択肢: ご意見|ご感想|その他) - 必須
  - 名前 - 文字列 - 必須
  - メールアドレス - メールアドレス - 必須
  - 電話番号 - 数字 - 必須
  - お問い合わせ内容 - 文字列 - 必須
  - 送信ボタンのクリックで確認ページへ遷移します。
    - このとき入力内容の型・条件に不備があれば再びフォームページを表示します。
2. 確認ページ
  - フォームページで入力した内容を表示し、内容を確認させます。
  - 修正ボタンを用意してください。
  - 送信ボタンのクリックで送信完了ページへ遷移します。
3. 送信完了ページ
要件
  - メール送信もしくは、データベースへの登録を行います。両方対応した場合は、どちらも評価します。（必須）
  - メール送信（任意）
      - フォームページで入力した内容をメールで送信します。(管理者あてとユーザーあて)
      - メールの内容はフォームページで入力した内容がわかるものであれば様式は問いません。
      - 管理者の送信先は適当なメールアドレスで作成し、こちらが動作チェックを行うときにこちらが指定するメールアドレスに送信するようにしてもらいます。
  - データベースへの登録（任意）
      - フォームページで入力した内容をデータベースに登録します。
      - テーブルは一つとします。カラムは入力項目に合わせて設定してください。
  - メール送信もしくは、データベースへの登録したら、完了したとわかるメッセージを表示します。