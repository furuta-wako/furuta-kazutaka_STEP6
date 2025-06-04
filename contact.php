<?php
// --- 変数初期化 ---
$errors = [];
$data = [
  'name' => '',
  'companyName' => '',
  'email' => '',
  'age' => '',
  'message' => ''
];

// --- POST処理（バリデーション） ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($data as $key => $value) {
    if (empty($_POST[$key])) {
      $errors[] = "{$key} が入力されていません。";
    } else {
      $data[$key] = htmlspecialchars($_POST[$key], ENT_QUOTES, 'UTF-8');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お問い合わせフォーム<?= ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) ? ' - 確認画面' : '' ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h2>お問い合わせフォーム<?= ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) ? ' - 確認画面' : '' ?></h2>
</header>

<ul>
  <li><a href="#">トップページ</a></li>
  <li><a href="#">人気投稿</a></li>
  <li><a href="#">エンジニアおすすめ商品</a></li>
  <li><a href="#">エンジニアおすすめ記事</a></li>
  <li><a href="#">投稿ページ</a></li>
</ul>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
  <?php if (!empty($errors)) : ?>
    <!-- エラー表示 -->
    <ul style="color: red;">
      <?php foreach ($errors as $error) : ?>
        <li><?= $error ?></li>
      <?php endforeach; ?>
    </ul>
    <p><a href="contact.php">戻る</a></p>
  <?php else : ?>
    <!-- 確認画面 -->
    <form action="send.php" method="post">
      <table class="contact-table">
        <tr><th>お名前</th><td><?= $data['name'] ?></td></tr>
        <tr><th>会社名</th><td><?= $data['companyName'] ?></td></tr>
        <tr><th>メールアドレス</th><td><?= $data['email'] ?></td></tr>
        <tr><th>年齢</th><td><?= $data['age'] ?></td></tr>
        <tr><th>お問い合わせ内容</th><td><?= nl2br($data['message']) ?></td></tr>
      </table>

      <?php foreach ($data as $key => $val) : ?>
        <input type="hidden" name="<?= $key ?>" value="<?= $val ?>">
      <?php endforeach; ?>

      <input type="submit" value="送信">
      <input type="button" value="戻る" onclick="history.back()">
    </form>
  <?php endif; ?>

<?php else : ?>
  <!-- 初期フォーム画面 -->
  <form action="contact.php" method="post">
    <table class="contact-table">
      <tr><th>お名前</th><td><input type="text" name="name" size="40" id="name"></td></tr>
      <tr><th>会社名</th><td><input type="text" name="companyName" size="40" id="companyName"></td></tr>
      <tr><th>メールアドレス</th><td><input type="email" name="email" size="40" id="email"></td></tr>
      <tr><th>年齢</th><td><input type="text" name="age" size="40" id="age"></td></tr>
      <tr><th>お問い合わせ内容</th><td><textarea name="message" rows="5" cols="40" id="message"></textarea></td></tr>
    </table>
    <input type="submit" value="送信">
  </form>
<?php endif; ?>
<script src="style.js"></script>
</body>
<footer>
  <p>ボタンを押すとfooterの背景色が変わります。</p>
  <button>押してみてね！</button>
</footer>

</html>
