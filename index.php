<?php
require 'includes/init.php';
require 'includes/auth.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $message = login($_POST['user_id'], $_POST['password']);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'verify_totp') {
        $message = verifyTotp($_POST['code']);
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    logout();
    header('Location: index.php');
    exit;
}

$page_title = '2FA Demo - ログイン';
require 'includes/header.php';
?>

<?php if ($message): ?>
    <div class="alert alert-info" role="alert">
        <?php echo htmlspecialchars($message); ?>
    </div>
<?php endif; ?>

<?php if (!isLoggedIn()): ?>
    <div class="auth-container">
        <h1 class="auth-title">ログイン</h1>
        <form method="post">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label class="form-label">ユーザーID</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">パスワード</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">ログイン</button>
            </div>
        </form>
        <p class="text-center mt-3">
            <a href="signup.php" class="text-decoration-none">新規登録はこちら</a>
        </p>
    </div>
<?php elseif (!is2FAVerified()): ?>
    <div class="auth-container">
        <h1 class="auth-title">2要素認証</h1>
        <div class="text-center mb-3">
            <a href="qr.php" class="btn btn-outline-primary">QRコードを表示</a>
        </div>
        <form method="post">
            <input type="hidden" name="action" value="verify_totp">
            <div class="form-group">
                <label class="form-label">認証コード</label>
                <input type="text" name="code" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">認証</button>
            </div>
        </form>
    </div>
<?php else: ?>
    <div class="auth-container">
        <h1 class="auth-title">ログイン完了</h1>
        <div class="alert alert-success" role="alert">
            2要素認証が完了しました。
        </div>
    </div>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>

