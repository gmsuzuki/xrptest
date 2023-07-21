<?php

function setSessionImg($imgName, $file)
{
    $_SESSION[$imgName]['data'] = base64_encode(file_get_contents($file['tmp_name']));
    $_SESSION[$imgName]['type'] = mime_content_type($file['tmp_name']);
    $_SESSION[$imgName]['width'] = getimagesize($file['tmp_name'])[0];
    $_SESSION[$imgName]['height'] = getimagesize($file['tmp_name'])[1];
}

// チェック系ーーーーーーーーーーーーーーーーーーーーーーーーーーー


// 縦横比

function check_vh($imgName, $width, $height)
{
    if (
        $_SESSION[$imgName]['width'] % $width != 0 ||
        $_SESSION[$imgName]['height'] % $height != 0
    ) {
        echo '<p class="img_err">画像の縦横比率が異なるため、<br>表示が崩れる可能性があります。</p>';
    }
}


// ポストから来たか？
function check_post($file)
{
    if (!is_uploaded_file($file['tmp_name'])) {
        throw new RuntimeException('POST通信以外の方法でアップロードされました。');
    }
}
function check_file_error($file)
{
    // 未定義である・複数ファイルである・$_FILES Corruption 攻撃を受けた
    // どれかに該当していれば不正なパラメータとして処理する
    if (!isset($file['error']) || !is_int($file['error'])) {
        throw new RuntimeException('パラメータが不正です');
    }

    // $file['error'] の値を確認
    switch ($file['error']) {
        case UPLOAD_ERR_OK: // OK
            break;
        case UPLOAD_ERR_NO_FILE:   // ファイル未選択
            throw new RuntimeException('ファイルが選択されていませんよーだ');
        case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
        case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過 (設定した場合のみ)
            throw new RuntimeException('ファイルサイズが大きすぎます');
        default:
            throw new RuntimeException('その他のエラーが発生しました');
    }
}


function check_file_size($file, $max_size)
{
    // ここで定義するサイズ上限のオーバーチェック
    // (必要がある場合のみ)
    if ($file['size'] > $max_size) {
        throw new RuntimeException('ファイルサイズが大きすぎます');
    }
}
function check_file_type($file)
{
    // $file['mime']の値はブラウザ側で偽装可能なので
    // MIMEタイプに対応する拡張子を自前で取得する
    if (!$ext = array_search(
        mime_content_type($file['tmp_name']),
        array(
            'gif' => 'image/gif',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
        ),
        true
    )) {
        throw new RuntimeException('ファイル形式が不正です');
    }
}
function save_file($file)
{
    // ファイルデータからSHA-1ハッシュを取ってファイル名を決定し，保存する
    if (!move_uploaded_file(
        $file['tmp_name'],
        $path = sprintf(
            './uploads/%s.%s',
            sha1_file($file['tmp_name']),
            $ext
        )
    )) {
        throw new RuntimeException('ファイル保存時にエラーが発生しました');
    }

    // ファイルのパーミッションを確実に0644に設定する
    chmod($path, 0644);
}