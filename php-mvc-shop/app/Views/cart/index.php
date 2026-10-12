<h1>Giỏ hàng</h1>

<style>
.cart-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 20px;
}

.cart-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border: 1px solid #eee;
    border-radius: 8px;
    background: #fafafa;
    transition: box-shadow 0.2s ease;
}

.cart-item:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.cart-item img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
}

.cart-item .grow {
    flex: 1;
}

.cart-item strong {
    color: #333;
}

.qty {
    width: 60px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-align: center;
}

.cart-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.cart-actions .total {
    font-size: 18px;
    font-weight: bold;
    color: #d32f2f;
}

.button {
    display: inline-block;
    padding: 10px 18px;
    background: #1976d2;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    transition: background 0.2s ease;
}

.button:hover {
    background: #1565c0;
}

.secondary {
    background: #f5f5f5;
    color: #333;
    border: 1px solid #ccc;
    padding: 10px 18px;
    border-radius: 6px;
    cursor: pointer;
}

.secondary:hover {
    background: #e0e0e0;
}

.empty {
    text-align: center;
    padding: 30px;
}
</style>

<?php if (!$items): ?>
    <div class="empty">
        <p>Giỏ hàng đang trống</p>
        <a class="button" href="/">Mua hàng</a>
    </div>
<?php else: ?>
    <form method="post" action="/cart/update">
        <div class="cart-list">
            <?php foreach ($items as $item): ?>
                <div class="cart-item">
                    <img src="<?= htmlspecialchars($item['product']['image']) ?>" alt="<?= htmlspecialchars($item['product']['name']) ?>">
                    <div class="grow">
                        <strong><?= htmlspecialchars($item['product']['name']) ?></strong>
                        <div><?= number_format((int) $item['product']['price'], 0, ',', '.') ?>đ</div>
                    </div>
                    <input class="qty" type="number" min="0" name="quantity[<?= (int) $item['product']['id'] ?>]" value="<?= (int) $item['quantity'] ?>">
                    <strong><?= number_format((int) $item['subtotal'], 0, ',', '.') ?>đ</strong>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cart-actions">
            <button type="submit" class="secondary">Cập nhật</button>
            <div class="total">Tổng: <?= number_format((int) $total, 0, ',', '.') ?>đ</div>
            <a class="button" href="/checkout">Thanh toán</a>
        </div>
    </form>
<?php endif; ?>
