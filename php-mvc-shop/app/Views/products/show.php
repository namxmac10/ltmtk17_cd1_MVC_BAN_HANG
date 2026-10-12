<div class="product-detail">
    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
    <div class="info">
        <a class="back" href="/">← Sản phẩm</a>
        <h1><?= htmlspecialchars($product['name']) ?></h1>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <p class="price large"><?= number_format((int) $product['price'], 0, ',', '.') ?>đ</p>
        <form method="post" action="/cart/add">
            <input type="hidden" name="id" value="<?= (int) $product['id'] ?>">
            <button type="submit">Thêm vào giỏ</button>
        </form>
    </div>
</div>

<style>
    .product-detail {
        display: flex;
        gap: 30px;
        align-items: flex-start;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        margin: 30px auto;
        max-width: 1000px;
    }

    .product-detail img {
        width: 400px;
        max-width: 100%;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .product-detail .info {
        flex: 1;
    }

    .back {
        display: inline-block;
        margin-bottom: 15px;
        text-decoration: none;
        color: #1976d2;
        font-weight: bold;
        transition: color 0.2s ease;
    }

    .back:hover {
        color: #0d47a1;
    }

    .product-detail h1 {
        margin: 0 0 15px;
        font-size: 28px;
        color: #333;
    }

    .product-detail p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 15px;
    }

    .price.large {
        font-size: 22px;
        font-weight: bold;
        color: #d32f2f;
        margin-bottom: 20px;
    }

    .product-detail form button {
        padding: 12px 20px;
        background: #1976d2;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .product-detail form button:hover {
        background: #1565c0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-detail {
            flex-direction: column;
            text-align: center;
        }

        .product-detail img {
            width: 100%;
            margin-bottom: 20px;
        }
    }
</style>
