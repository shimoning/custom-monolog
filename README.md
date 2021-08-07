# customize monolog
Monologのカスタマイズ集(仮)

## Install

利用するプロジェクトの `composer.json` に以下を追加する。
```composer.json
"repositories": {
    "custom-monolog": {
        "type": "vcs",
        "url": "https://github.com/shimoning/custom-monolog.git"
    }
},
```

その後以下でインストールする。

```bash

composer require shimoning/custom-monolog
```

## Usage

### ログファイル名にPHP実行ユーザ名を付与する
#### For Laravel
5.6系 以上なら動作するはず。
8.5まで確認。

`config/logging.php` のファイルにおいて、 `daily` の配列に以下の行を追加する。
```
'tap' => [ Shimoning\CustomMonolog\FilenameWithSapi::class ],
```

`single` はファイル名を変更するための public な関数や変数を用意していないので未対応。
