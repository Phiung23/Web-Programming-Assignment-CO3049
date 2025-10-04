<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="public/css/nav-bar.css">

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom position-relative">
    <div class="container-fluid px-4">

        <a class="navbar-brand fw-bold text-primary" href="index.php?route=home">Yaki</a>

        <!-- Hamburger -->
        <button class="navbar-toggler z-3 ms-auto" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible -->
        <div class="collapse navbar-collapse" id="mainNav">
            <!-- Search -->
            <form class="d-flex my-3 my-lg-0 ms-lg-3">
                <input class="form-control rounded-3" type="search" placeholder="Search" aria-label="Search">
            </form>

            <!-- Center links -->
            <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0 gap-lg-3">
                <li class="nav-item"><a class="nav-link <?= ($page === 'home') ? 'active' : '' ?>" href="index.php?route=home">Home</a></li>
                <li class="nav-item"><a class="nav-link <?= ($page === 'about') ? 'active' : '' ?>" href="index.php?route=about">About</a></li>
                <li class="nav-item"><a class="nav-link <?= ($page === 'product') ? 'active' : '' ?>" href="index.php?route=product&cat=all">Product</a></li>
                <li class="nav-item"><a class="nav-link <?= ($page === 'contact') ? 'active' : '' ?>" href="#">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link <?= ($page === 'blog') ? 'active' : '' ?>" href="#">Blog</a></li>
            </ul>

            <!-- Right side -->
            <div class="d-flex align-items-center gap-3 ms-lg-4">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="index.php?route=cart" class="btn btn-outline-secondary btn-sm">Cart</a>
                    <span class="text-body-secondary">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="index.php?route=logout" class="btn btn-outline-danger btn-sm">Logout</a>
                <?php else: ?>
                    <a href="index.php?route=register" class="btn btn-outline-primary btn-sm">Register</a>
                    <a href="index.php?route=login" class="btn btn-primary btn-sm">Login</a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</nav>