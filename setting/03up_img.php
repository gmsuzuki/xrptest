<!-- form.html -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>画像登録</title>
</head>

<body>
  <h2>画像登録フォーム</h2>
  <form action="04save_img.php" method="POST" enctype="multipart/form-data">
    <label for="imageName">画像名:</label>
    <input type="text" id="imageName" name="imageName" required><br>

    <label for="staffImage">画像:</label>
    <input type="file" id="staffImage" name="staffImage" required><br>

    <label for="staffId">スタッフ番号:</label>
    <input type="number" id="staffId" name="staffId" required><br>

    <input type="submit" value="送信">
  </form>

  <button>
    <a href="setting_index.php">戻る</a>
  </button>
</body>

</html>