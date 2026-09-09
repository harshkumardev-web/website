<?php
$products = require __DIR__ . '/data/products.php';
$whatsappNumber = '923001234567';
$categories = ['All Laptops', 'Lenovo', 'Dell', 'HP', 'Apple'];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function price(int $amount): string
{
    return 'Rs. ' . number_format($amount);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Quality checked second-hand laptops at honest prices.">
    <title>ReLaptop | Pre-owned laptops, properly checked</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container nav">
            <a class="logo" href="index.php" aria-label="ReLaptop home">
                <span class="logo-mark">R</span>
                <span>ReLaptop</span>
            </a>
            <nav class="nav-links" aria-label="Main navigation">
                <a href="#inventory">Inventory</a>
                <a href="#why-us">Why us</a>
                <a class="nav-contact" href="https://wa.me/<?= e($whatsappNumber) ?>" target="_blank" rel="noreferrer">Chat with us ↗</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-content">
                <span class="eyebrow">Second-hand, first choice</span>
                <h1>Good laptops.<br>Better prices.</h1>
                <p class="hero-copy">Quality checked pre-owned laptops for work, study, and everything in between. Pick a machine that works as hard as you do.</p>
                <form class="search-box" onsubmit="return false;">
                    <span aria-hidden="true">⌕</span>
                    <input id="product-search" type="search" placeholder="Search by brand or model..." aria-label="Search laptops">
                    <button type="submit">Find a laptop</button>
                </form>
            </div>
        </section>

        <section class="trust-strip" id="why-us" aria-label="Our promises">
            <div class="container trust-items">
                <div class="trust-item"><span class="trust-icon">✓</span><span>Quality checked<small>Every laptop tested before sale</small></span></div>
                <div class="trust-item"><span class="trust-icon">↺</span><span>7-day checking warranty<small>Buy with a little more confidence</small></span></div>
                <div class="trust-item"><span class="trust-icon">▣</span><span>Honest condition<small>Clear details, no surprises</small></span></div>
            </div>
        </section>

        <section class="catalog" id="inventory">
            <div class="container">
                <div class="section-heading">
                    <div><span class="eyebrow">In the shop</span><h2>Fresh arrivals</h2></div>
                    <p>Handpicked machines, cleaned up and ready for their next chapter.</p>
                </div>
                <div class="filters" role="group" aria-label="Filter by brand">
                    <?php foreach ($categories as $index => $category): ?>
                        <button class="filter<?= $index === 0 ? ' active' : '' ?>" data-category="<?= e($category) ?>" type="button"><?= e($category) ?></button>
                    <?php endforeach; ?>
                </div>
                <div class="product-grid" id="product-grid">
                    <?php foreach ($products as $product): ?>
                        <article class="product-card" data-brand="<?= e($product['brand']) ?>" data-search="<?= e(strtolower($product['brand'] . ' ' . $product['model'] . ' ' . $product['specs'])) ?>">
                            <div class="product-image">
                                <img src="<?= e($product['image']) ?>" alt="<?= e($product['brand'] . ' ' . $product['model']) ?>" loading="lazy">
                                <span class="product-badge <?= e($product['color']) ?>"><?= e($product['badge']) ?></span>
                            </div>
                            <div class="product-info">
                                <div class="product-brand"><?= e($product['brand']) ?></div>
                                <h3><?= e($product['model']) ?></h3>
                                <p class="product-specs"><?= e($product['specs']) ?></p>
                                <div class="product-bottom">
                                    <div class="price"><small>Starting from</small><?= e(price($product['price'])) ?></div>
                                    <span class="condition"><?= e($product['condition']) ?></span>
                                </div>
                                <a class="inquiry" href="https://wa.me/<?= e($whatsappNumber) ?>?text=<?= rawurlencode('Hi, I am interested in the ' . $product['brand'] . ' ' . $product['model'] . ' (' . price($product['price']) . '). Is it available?') ?>" target="_blank" rel="noreferrer">Ask about it ↗</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    <div class="empty-state">No laptop matched your search. Try another model or brand.</div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <div>
                <a class="logo" href="index.php"><span class="logo-mark">R</span><span>ReLaptop</span></a>
                <p>Reliable pre-owned laptops for the smart second-hand shopper.</p>
            </div>
            <div class="footer-details"><strong>Want to visit or ask a question?</strong><br>WhatsApp: +92 300 1234567<br>Mon - Sat · 11:00 AM - 8:00 PM</div>
        </div>
    </footer>
    <script src="assets/app.js"></script>
</body>
</html>
