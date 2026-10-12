<div class="success">
    <h1>Đặt hàng thành công</h1>
    <p>Mã đơn hàng: #<?= (int) $id ?></p>
    <p>Tổng tiền: <strong><?= number_format((int) $total, 0, ',', '.') ?>đ</strong></p>
    <a class="button" href="/">Tiếp tục mua hàng</a>
</div>

<style>
    .success {
        max-width: 500px;
        margin: 50px auto;
        background: #e8f5e9;
        border: 1px solid #c8e6c9;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        animation: fadeIn 0.6s ease;
    }

    .success h1 {
        color: #2e7d32;
        margin-bottom: 20px;
    }

    .success p {
        font-size: 16px;
        margin: 10px 0;
    }

    .success strong {
        color: #d32f2f;
        font-size: 18px;
    }

    .button {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 20px;
        background: #1976d2;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.2s ease;
    }

    .button:hover {
        background: #1565c0;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>
