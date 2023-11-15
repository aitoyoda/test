<?php
session_start();

// POSTで受け取った場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $num = $_POST['num'];
    $_SESSION['cart'][$product] = $num;
}

$cart = array();

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

var_dump($cart);
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>

<body>
    <h1>商品一覧</h1>

    <a href="cart.php">カートを見る</a>

    <table style="text-align:center">
        <tr>
            <th>商品</th>
            <th>数量</th>
            <th>ボタン</th>
        </tr>
        <form action="" method="post">
            <tr>
                <td>マウス</td>
                <td>
                    <select name="num">
                        <?php for ($i = 1; $i < 10; $i++) : ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="product" value="pc_mouse">
                    <?php if (isset($cart['pc_mouse']) === TRUE) : ?>
                        <p>追加済み</p>
                    <?php else : ?>
                        <input type="submit" value="カートに入れる">
                    <?php endif; ?>
                </td>
            </tr>
        </form>

        <form action="" method="post">
            <tr>
                <td>キーボード</td>
                <td>
                    <select name="num">
                        <?php for ($i = 1; $i < 10; $i++) : ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="product" value="pc_keyboard">
                    <?php if (isset($cart['pc_keyboard']) === TRUE) : ?>
                        <p>追加済み</p>
                    <?php else : ?>
                        <input type="submit" value="カートに入れる">
                    <?php endif; ?>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>