<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us | Yaki Electronics</title>
    <link rel="stylesheet" href="public/css/product.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include __DIR__ . '/partials/nav-bar.php' ?>
    <!-- breadcumb -->
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item"><a href="index.php?route=home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>

    <div class="container my-4">
        <div class="row">
            <!-- Sidebar (1/4) -->
            <div class="col-12 col-md-3 bg-light border-end p-3">
                <h5 class="mb-3">Products</h5>
                <form id="filterForm">
                    <!-- Search -->
                    <div class="mb-3">
                        <input type="text" name="search-name-product" class="form-control" placeholder="Search">
                    </div>

                    <!-- Categories (radio buttons, only one can be selected) -->
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="category" id="catPhones" value="1">
                        <label class="form-check-label" for="catPhones">Phones</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="category" id="catSmartWatches" value="2">
                        <label class="form-check-label" for="catSmartWatches">Smart Watches</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="category" id="catLaptops" value="4">
                        <label class="form-check-label" for="catLaptop">Laptop</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="category" id="catHeadphones" value="5">
                        <label class="form-check-label" for="catHeadphones">Headphones</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="category" id="catCameras" value="3">
                        <label class="form-check-label" for="catCameras">Cameras</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="catAll" value="all">
                        <label class="form-check-label" for="catAll">All</label>
                    </div>
                </form>
            </div>

            <!-- Main content -->
            <div class="col-12 col-md-9 p-3">
                <div id="product-list">
                    <h4>Main Product Area</h4>

                </div>
                <nav>
                    <ul class="pagination justify-content-center mt-3" id="pagination"></ul>
                </nav>
            </div>
        </div>
    </div>



    <?php include __DIR__ . '/partials/footer.php' ?>
    <script src="public/js/product.js"></script>
    <script>
        sendFilterRequest(1, cat = <?= json_encode($cate) ?>);
        switch (<?= json_encode($cate) ?>) {
            case "1":

                document.getElementById("catPhones").checked = true;
                break;
            case "2":
                console.log(<?= json_encode($cate) ?>);

                document.getElementById("catSmartWatches").checked = true;
                break;
            case "3":
                document.getElementById("catCameras").checked = true;
                break;
            case "4":
                document.getElementById("catLaptops").checked = true;
                break;
            case "5":
                document.getElementById("catHeadphones").checked = true;
                break;
            default:
                document.getElementById("catAll").checked = true;
                break;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>