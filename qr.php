<?php
require 'includes/init.php';
require 'includes/auth.php';

if (!isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$userId = $_SESSION['user_id'];
$secret = $users[$userId]['secret'];
$qrCodeUrl = $g->getQRCodeGoogleUrl('2FADemo', $secret);

$page_title = '2FA Demo - QRコード';
require 'includes/header.php';
?>

<div class="auth-container">
    <h1 class="auth-title">QRコード</h1>
    <div class="text-center">
        <p class="mb-4">Google Authenticatorで以下のQRコードをスキャンしてください：</p>
        <img src="<?php echo htmlspecialchars($qrCodeUrl); ?>" alt="QR Code" class="img-fluid mb-3">
        <div class="alert alert-info">
            シークレットキー: <strong><?php echo htmlspecialchars($secret); ?></strong>
        </div>
        <a href="index.php" class="btn btn-primary">戻る</a>
    </div>
</div>

<?php require 'includes/footer.php'; ?> 