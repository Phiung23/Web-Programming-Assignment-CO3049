<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us | Yaki Electronics</title>
    <link rel="stylesheet" href="public/css/product-details.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
    <?php include __DIR__ . '/partials/nav-bar.php' ?>
    <!-- breadcumb -->
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item"><a href="index.php?route=home">Home</a></li>
            <li class="breadcrumb-item "><a href="index.php?route=product&cat=<?= $product['category_id'] ?>">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product['name'] ?></li>

        </ol>
    </nav>
    <!-- prodcut price and image -->
    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Left column: Image -->
            <div class="col-12 col-md-6 mb-4 mb-md-0 text-center">
                <img src="public/images/default.png" class="img-fluid rounded shadow-sm" alt="Product Image">
            </div>

            <!-- Right column: Details -->
            <div class="col-12 col-md-6">
                <h2 class="fw-bold mb-3"><?= $product['name'] ?></h2>
                <p class="text-muted mb-4">
                    <?= $product['description'] ?>
                </p>
                <?php if ($product['discount'] == 0): ?>
                    <h4 class="text-primary mb-3">$<?= $product['price'] ?></h4>
                <?php else: ?>
                    <h4 class="text-primary mb-3">
                        $<?= $product['price'] * (1 - $product['discount'] / 100) ?>
                    </h4>
                    <span class="text-muted text-decoration-line-through">
                        $<?= $product['price'] ?>
                    </span>
                <?php endif; ?>

                <div class="d-flex gap-3">
                    <button class="btn btn-primary">Add to Cart</button>
                    <button class="btn btn-outline-secondary">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- product details -->
    <div class="container my-5">
        <div class="row justify-content-center g-4">

            <!-- Product Details -->
            <div class="col-12 col-lg-6">
                <div class="p-4 p-md-5 bg-white rounded shadow-sm h-100">
                    <h4 class="fw-bold mb-3">Details</h4>
                    <p class="text-muted mb-0">
                        <?= nl2br(htmlspecialchars($product['details'])) ?>
                    </p>
                </div>
            </div>

            <!-- Ratings & Reviews -->
            <div class="col-12 col-lg-6">
                <div class="p-4 p-md-5 bg-white rounded shadow-sm text-center h-100">
                    <h4 class="fw-bold mb-3">Ratings & Reviews</h4>

                    <!-- Average Rating Number -->
                    <div class="display-4 fw-bold text-warning">
                        <?= number_format($product['avg_rating'], 1) ?>
                    </div>

                    <!-- Star Visualization -->
                    <div class="mb-2">
                        <?php
                        $rating = round($product['avg_rating']);
                        for ($i = 1; $i <= 5; $i++) {
                            echo $i <= $rating
                                ? '<i class="bi bi-star-fill text-warning"></i>'
                                : '<i class="bi bi-star text-warning"></i>';
                        }
                        ?>
                    </div>

                    <!-- Total Reviews -->
                    <p class="text-muted small mb-0">
                        Based on <?= htmlspecialchars($product['total_reviews']) ?> reviews
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- comment bar -->
    <div class="row justify-content-center mt-4">
        <div class="col-12 col-lg-10">
            <form class="d-flex" id="comment-bar" action="index.php?route=post_comments" method="POST">
                <input
                    class="form-control form-control-lg rounded-3"
                    type="text"
                    name="comment"
                    placeholder="Leave Comment"
                    aria-label="Search">
                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['product_id']) ?>">
                <div class="text-center mb-2">
                    <div id="rating-stars" class="d-inline-flex justify-content-center">
                        <i class="bi bi-star fs-3 text-secondary" data-index="1"></i>
                        <i class="bi bi-star fs-3 text-secondary" data-index="2"></i>
                        <i class="bi bi-star fs-3 text-secondary" data-index="3"></i>
                        <i class="bi bi-star fs-3 text-secondary" data-index="4"></i>
                        <i class="bi bi-star fs-3 text-secondary" data-index="5"></i>
                    </div>
                    <input type="hidden" name="rating" id="rating-value" value="0">
                    <button type="submit" class="btn btn-primary ms-2">Send</button>

                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- Comment Section -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <?php if (!empty($comments)): ?>
                    <?php foreach ($comments as $c): ?>
                        <div class="p-4 mb-3 bg-white rounded shadow-sm">
                            <!-- Header: user + date -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">User #<?= htmlspecialchars($c['user_id']) ?></h6>
                                <small class="text-muted">
                                    <?= date("d F, Y", strtotime($c['created_at'])) ?>
                                </small>
                            </div>

                            <!-- Stars -->
                            <div class="mb-2 text-warning">
                                <?php
                                // Display ★ for rating, ☆ for the rest up to 5
                                $rating = (int)$c['rating'];
                                echo str_repeat("★", $rating) . str_repeat("☆", 5 - $rating);
                                ?>
                            </div>

                            <!-- Review text -->
                            <p class="mb-0 text-muted">
                                <?= nl2br(htmlspecialchars($c['comment'])) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">No comments yet. Be the first to leave one!</p>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php include __DIR__ . '/partials/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/product-details.js"></script>
</body>

</html>