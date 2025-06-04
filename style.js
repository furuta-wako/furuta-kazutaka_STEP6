document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
  
    form.addEventListener("submit", function (e) {
      const name = document.getElementById("name").value.trim();
      const companyName = document.getElementById("companyName").value.trim();
      const email = document.getElementById("email").value.trim();
      const age = document.getElementById("age").value.trim();
      const message = document.getElementById("message").value.trim();
  
      // 未入力チェック
      if (!name || !companyName || !email || !age || !message) {
        e.preventDefault();
        alert("必須項目が未入力です。入力内容をご確認ください。");
        return;
      }
  
      // すべて入力済みなら確認ダイアログ
      const confirmText = `
  下記の内容を本当に送信しますか？
  
  お名前→${name}
  会社名→${companyName}
  メールアドレス→${email}
  年齢→${age}
  お問い合わせ内容→${message}
      `.trim();
  
      if (!confirm(confirmText)) {
        e.preventDefault(); // キャンセルされたら送信中止
      }
    });
  });
  
  document.addEventListener("DOMContentLoaded", function () {
  
    // 背景色変更機能
    const button = document.querySelector("button"); // 「押してみてね！」ボタン
    const footer = document.querySelector("footer");
    const colors = ["blue", "red", "yellow", "gray"];
    let currentIndex = 0;
  
    button.addEventListener("click", function () {
      footer.style.backgroundColor = colors[currentIndex];
      currentIndex = (currentIndex + 1) % colors.length; // 0 → 1 → 2 → 3 → 0 ...
    });
  });
  
