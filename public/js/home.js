// Select the buttons by their IDs
const newArrivalBtn = document.getElementById("new-arrival");
const bestSellerBtn = document.getElementById("best-seller");

// Add click events
newArrivalBtn.addEventListener("click", () => {
    setActive(newArrivalBtn);
    loadProducts("home_new_arrivals");
});

bestSellerBtn.addEventListener("click", () => {
    setActive(bestSellerBtn);
    loadProducts("home_best_sellers");
});
setActive(newArrivalBtn);
// Function to toggle "active" class
function setActive(selectedBtn) {
    newArrivalBtn.classList.remove("active");
    bestSellerBtn.classList.remove("active");
    selectedBtn.classList.add("active");
}

function loadProducts(route) {
    fetch(`index.php?route=${route}`)
        .then((response) => response.json())
        .then((data) => {
            const container = document.querySelector(".promoted-products");

            // Step 1: clear old products
            container.innerHTML = "";

            // Step 2: build new cards from JSON
            data.forEach((product) => {
                // fallback image
                const imageUrl =
                    product.image_url && product.image_url.trim() !== ""
                        ? product.image_url
                        : "public/images/default.png";

                const col = document.createElement("div");
                col.className = "col-6 col-md-4 col-lg-3";

                col.innerHTML = `
          <div class="card h-100 shadow-sm border-0">
            <img src="${imageUrl}"
                 class="card-img-top p-3"
                 alt="${product.name}"
                 style="height:200px; object-fit:contain;onerror="this.onerror=null;this.src='public/images/default.png';"">
            <div class="card-body text-center d-flex flex-column">
              <h6 class="card-title fw-semibold mb-2">${product.name}</h6>
              <p class="text-dark fw-bold fs-5 mb-3">$${Number(
                  product.price
              ).toFixed(2)}</p>
              <a href="index.php?route=product_details&id=${product.product_id}"
                 class="btn btn-dark mt-auto">Buy Now</a>
            </div>
          </div>
        `;

                container.appendChild(col);
            });
        })
        .catch((error) => {
            console.error("Error fetching products:", error);
        });
}

const phoneCat = document.getElementById("phone-cat");

if (phoneCat) {
    phoneCat.addEventListener("click", () => {
        // redirect to another page
        window.location.href = "index.php?route=product&cat=1";
    });
}

const watchCat = document.getElementById("watch-cat");

if (watchCat) {
    watchCat.addEventListener("click", () => {
        // redirect to another page
        window.location.href = "index.php?route=product&cat=2";
    });
}

const cameraCat = document.getElementById("camera-cat");

if (cameraCat) {
    cameraCat.addEventListener("click", () => {
        // redirect to another page
        window.location.href = "index.php?route=product&cat=3";
    });
}

const laptopCat = document.getElementById("laptop-cat");

if (laptopCat) {
    laptopCat.addEventListener("click", () => {
        // redirect to another page
        window.location.href = "index.php?route=product&cat=4";
    });
}

const headphoneCat = document.getElementById("headphone-cat");

if (headphoneCat) {
    headphoneCat.addEventListener("click", () => {
        // redirect to another page
        window.location.href = "index.php?route=product&cat=5";
    });
}
