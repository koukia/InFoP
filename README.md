# InFoP

## InFoP - Inquery Form by PHP

PHP を用いた お問い合わせフォーム
## 使い方
### 起動
1. `docker-compose up -d`
2. ブラウザに`http://localhost:8081`にアクセス
### 終了
1. `docker-compose down`
2. `docker-compose ps` で確認
## 開発環境
## 実装に費やした時間
## 実装中に問題となったこと/工夫したところ
## 改善点
## 動作テスト
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
  DB PDO
    https://gray-code.com/php/insert-data-by-using-pdo/
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