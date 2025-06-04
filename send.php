<?php
// POSTチェック
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: contact.php');
  exit;
}

// データ取得
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$companyName = htmlspecialchars($_POST['companyName'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

// メール本文作成
$to = 'your-email@example.com'; // ← あなたのメールアドレスに変更！
$subject = '【お問い合わせ】フォームより';
$body = <<<EOT
以下の内容が送信されました。

お名前：$name
会社名：$companyName
メールアドレス：$email
年齢：$age
お問い合わせ内容：
$message
EOT;

// 送信ヘッダー（Fromアドレスなど）
$headers = "From: " . $email;

// メール送信処理
$success = mb_send_mail($to, $subject, $body, $headers);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お問い合わせフォーム - 送信完了画面</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h1>お問い合わせフォーム - 送信完了画面</h1>

  <?php if ($success) : ?>
    <p>お問い合わせが送信されました。ありがとうございます！</p>
  <?php else : ?>
    <p style="color: red;">送信に失敗しました。</p>
  <?php endif; ?>

  <p><a href="contact.php">お問い合わせフォームに戻る</a></p>

</body>
</html>
