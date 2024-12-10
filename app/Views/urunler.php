<!DOCTYPE html>
<html>
<head>
    <title>Ürünler Listesi</title>
</head>
<body>
    <h1>Ürünler Listesi</h1>
    <?php if (isset($urunler) && !empty($urunler)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad</th>
                    <th>Marka</th>
                    <th>Adet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($urunler as $urun): ?>
                    <tr>
                        <td><?php echo $urun['id']; ?></td>
                        <td><?php echo $urun['ad']; ?></td>
                        <td><?php echo $urun['marka']; ?></td>
                        <td><?php echo $urun['adet']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Ürün bulunamadı.</p>
    <?php endif; ?>
</body>
</html>
