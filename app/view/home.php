<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="public/css/home-page.css">
  <!-- Latest Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



</head>

<body>
  <!-- Navigation bar begin-->
  <?php
  include __DIR__ . '/partials/nav-bar.php';

  ?>
  <!-- Navigation bar end -------------------------------- -->
  <!-- hero banner begin ------------------------------- -->
  <section class="container-fluid">
    <div class="row g-0">
      <!-- Left: Text -->
      <div
        class="col-12 col-md-6 bg-dark text-white d-flex flex-column justify-content-center p-4 p-lg-5"
        style="min-height: 400px;">
        <h1 class="display-5 mb-3"><?= $heroProduct['name'] ?></h1>
        <p class="lead mb-4"><?= $heroProduct['description'] ?></p>
        <a href="#" class="btn btn-light btn-lg align-self-start">Shop Now</a>
      </div>

      <!-- Right: Image -->
      <?php
      $heroImg = $heroProduct['image_url'] ?? 'public/images/default.png';
      ?>
      <div class="col-12 col-md-6 p-0" style="min-height:400px;">
        <img
          src="<?= htmlspecialchars($heroImg) ?>"
          alt="<?= htmlspecialchars($heroProduct['name'] ?? 'Hero image') ?>"
          class="w-100 h-100"
          style="object-fit:cover;">
      </div>
    </div>
  </section>
  <!-- hero banner end ------------------------------- -->

  <!-- category block begin ------------------------------- -->

  <section class="categories container my-5">
    <h2 class="mb-4 fw-bold">Browse By Category</h2>

    <div class="row justify-content-center g-4">
      <!-- Phones -->
      <div class="col-6 col-md-4 col-lg-2">
        <div class="card category-card text-center p-4 h-100 shadow-sm" id='phone-cat'>
          <img src="public/images/phones.png" class="card-img-top mx-auto" style="width:60px;" alt="Phones">
          <div class="card-body">
            <h6 class="fw-semibold">Phones</h6>
          </div>
        </div>
      </div>

      <!-- Smart Watches -->
      <div class="col-6 col-md-4 col-lg-2">
        <div class="card category-card text-center p-4 h-100 shadow-sm" id="watch-cat">
          <img src="public/images/watches.png" class="card-img-top mx-auto" style="width:60px;" alt="Smart Watches">
          <div class="card-body">
            <h6 class="fw-semibold">Smart Watches</h6>
          </div>
        </div>
      </div>

      <!-- Cameras -->
      <div class="col-6 col-md-4 col-lg-2">
        <div class="card category-card text-center p-4 h-100 shadow-sm" id="camera-cat">
          <img src="public/images/cameras.png" class="card-img-top mx-auto" style="width:60px;" alt="Cameras">
          <div class="card-body">
            <h6 class="fw-semibold">Cameras</h6>
          </div>
        </div>
      </div>

      <!-- Headphones -->
      <div class="col-6 col-md-4 col-lg-2">
        <div class="card category-card text-center p-4 h-100 shadow-sm" id="headphone-cat">
          <img src="public/images/headphones.png" class="card-img-top mx-auto" style="width:60px;" alt="Headphones">
          <div class="card-body">
            <h6 class="fw-semibold">Headphones</h6>
          </div>
        </div>
      </div>

      <!-- Computers -->
      <div class="col-6 col-md-4 col-lg-2">
        <div class="card category-card text-center p-4 h-100 shadow-sm" id="laptop-cat">
          <img src="public/images/laptops.png" class="card-img-top mx-auto" style="width:60px;" alt="Computers">
          <div class="card-body">
            <h6 class="fw-semibold">Laptops</h6>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- category block end ------------------------------- -->
  <!-- new-arrival block begin ------------------------------- -->

  <div class="container mt-4">
    <ul class="nav nav-tabs border-0">
      <li class="nav-item">
        <div class="nav-link border-bottom border-3 fw-bold" id="new-arrival" role="button">
          New Arrival
        </div>
      </li>
      <li class="nav-item">
        <div class="nav-link border-bottom border-3 fw-bold" id="best-seller" role="button">
          Best Sellers
        </div>
      </li>
    </ul>
  </div>



  <div class="new-arrival container my-5">

    <div class="row g-4 promoted-products">
      <?php foreach ($latestProduct as $product): ?>
        <div class="col-6 col-md-4 col-lg-3">
          <div class="card h-100 shadow-sm border-0">
            <!-- Product Image -->
            <?php
            $imagePath = $product['image_url'];
            ?>
            <img src="<?= htmlspecialchars($imagePath) ?>"
              class="card-img-top p-3"
              alt="<?= htmlspecialchars($product['name']) ?>"
              style="height:200px; object-fit:contain;">

            <!-- Card Body -->
            <div class="card-body text-center d-flex flex-column">
              <h6 class="card-title fw-semibold mb-2">
                <?= htmlspecialchars($product['name']) ?>
              </h6>
              <p class="text-dark fw-bold fs-5 mb-3">
                $<?= number_format($product['price'], 0) ?>
              </p>

              <!-- Buy Now Button -->
              <a href="index.php?route=product&id=<?= $product['product_id'] ?>"
                class="btn btn-dark mt-auto">
                Buy Now
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>



  <!-- new-arrival block end ------------------------------- -->

  <?php include __DIR__ . '/partials/footer.php' ?>
  <script src="public/js/home.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>