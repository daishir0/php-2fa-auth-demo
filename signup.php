<?php
require 'includes/init.php';
require 'includes/auth.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = signup($_POST['user_id'], $_POST['password']);
}

$page_title = '2FA Demo - サインアップ';
require 'includes/header.php';
?>

<div class="auth-container">
    <h1 class="auth-title">サインアップ</h1>
    
    <?php if ($message): ?>
        <div class="alert alert-info" role="alert">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
    
    <form method="post">
        <div class="form-group">
            <label class="form-label">ユーザーID</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">パスワード</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">サインアップ</button>
        </div>
    </form>
    
    <p class="text-center mt-3">
        <a href="index.php" class="text-decoration-none">ログインページへ</a>
    </p>
</div>

<?php require 'includes/footer.php'; ?> 