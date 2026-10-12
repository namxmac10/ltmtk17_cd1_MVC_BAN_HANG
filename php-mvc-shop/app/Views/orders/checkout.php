<h1>Thanh toán</h1>
<style>
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background: #f4f6f8;
        margin: 0;
        color: #333;
    }

    h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #1976d2;
    }

    .checkout {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }

    .panel {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        flex: 1;
        min-width: 300px;
    }

    .form label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
    }

    .form input, .form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .form button {
        width: 100%;
        padding: 12px;
        background: #1976d2;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .form button:hover {
        background: #1565c0;
    }

    .error {
        background: #ffebee;
        color: #c62828;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .summary h2 {
        margin-top: 0;
        color: #1976d2;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .summary-row strong {
        color: #333;
    }

    .total-line strong {
        color: #d32f2f;
        font-size: 18px;
    }
</style>

<div class="checkout">
    <form method="post" action="/checkout" class="panel form">
        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <label>Họ tên</label>
        <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
        <label>Số điện thoại</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" required>
        <label>Địa chỉ</label>
        <textarea name="address" rows="4" required><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
        <button type="submit">Đặt hàng</button>
    </form>

    <div class="panel summary">
        <h2>Đơn hàng</h2>
        <?php foreach ($items as $item): ?>
            <div class="summary-row">
                <span><?= htmlspecialchars($item['product']['name']) ?> × <?= (int) $item['quantity'] ?></span>
                <strong><?= number_format((int) $item['subtotal'], 0, ',', '.') ?>đ</strong>
            </div>
        <?php endforeach; ?>
        <div class="summary-row total-line">
            <span>Tổng</span>
            <strong><?= number_format((int) $total, 0, ',', '.') ?>đ</strong>
        </div>
    </div>
</div>
