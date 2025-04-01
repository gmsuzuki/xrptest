<!-- form.html -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録</title>
</head>

<body>
  <h2>ユーザー登録フォーム</h2>
  <form action="02save_member.php" method="POST" enctype="multipart/form-data">
    <label for="userName">名前:</label>
    <input type="text" id="userName" name="userName" required><br>

    <label for="userImage">画像:</label>
    <input type="file" id="userImage" name="userImage" required><br>

    <label for="approval">承認:</label>
    <input type="checkbox" id="approval" name="approval" value="1"><br>

    <input type="submit" value="送信">
  </form>
  <button>
    <a href="setting_index.php">戻る</a>
  </button>
</body>

</html>