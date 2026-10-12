<section class="hero">
    <h1>Sản phẩm</h1>
    <p>Chọn sản phẩm bạn muốn mua</p>
</section>

<style>
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background: #f4f6f8;
        margin: 0;
        color: #333;
    }

    .hero {
        text-align: center;
        padding: 40px 20px;
        background: linear-gradient(90deg, #1976d2, #1565c0);
        color: #fff;
        margin-bottom: 30px;
    }

    .hero h1 {
        margin: 0;
        font-size: 32px;
    }

    .hero p {
        margin-top: 10px;
        font-size: 18px;
        opacity: 0.9;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        padding: 0 20px 40px;
    }

    .card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
    }

    .card-body h2 {
        font-size: 18px;
        margin: 0 0 10px;
    }

    .card-body h2 a {
        text-decoration: none;
        color: #1976d2;
        transition: color 0.2s ease;
    }

    .card-body h2 a:hover {
        color: #0d47a1;
    }

    .price {
        font-size: 16px;
        font-weight: bold;
        color: #d32f2f;
        margin-bottom: 15px;
    }

    .card-body form button {
        width: 100%;
        padding: 10px;
        background: #1976d2;
        color: #fff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.2s ease;
    }

    .card-body form button:hover {
        background: #1565c0;
    }
</style>

<div class="grid">
    <?php foreach ($products as $product): ?>
        <article class="card">
            <a href="/product/<?= (int) $product['id'] ?>">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
            </a>
            <div class="card-body">
                <h2><a href="/product/<?= (int) $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></a></h2>
                <p class="price"><?= number_format((int) $product['price'], 0, ',', '.') ?>đ</p>
                <form method="post" action="/cart/add">
                    <input type="hidden" name="id" value="<?= (int) $product['id'] ?>">
                    <button type="submit">Thêm vào giỏ</button>
                </form>
            </div>
        </article>
    <?php endforeach; ?>
</div>
