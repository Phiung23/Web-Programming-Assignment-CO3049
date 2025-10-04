const form = document.getElementById("filterForm");
const radios = form.querySelectorAll('input[name="category"]');
const searchInput = form.querySelector('input[name="search-name-product"]');

function sendFilterRequest(page, cat = "all") {
    const category =
        form.querySelector('input[name="category"]:checked') !== null
            ? form.querySelector('input[name="category"]:checked').value
            : cat;
    const search = searchInput.value.trim();
    if (!page || isNaN(page) || page < 1) page = 1;
    const url =
        "index.php?route=get_filtered_products" +
        "&category=" +
        encodeURIComponent(category) +
        "&search=" +
        encodeURIComponent(search) +
        "&page=" +
        encodeURIComponent(page);
    fetch(url)
        .then((res) => res.json())
        .then((data) => {

            const container = document.getElementById("product-list");
            if (!container) return;
            container.innerHTML = "";

            // Render products
            if (data.products.length === 0) {
                container.innerHTML = "<p>No products found.</p>";
            } else {
                const row = document.createElement("div");
                row.className = "row g-3"; // g-3 adds spacing between cols

                data.products.forEach((p) => {
                    const col = document.createElement("div");
                    col.className = "col-12 col-md-4"; // full width on mobile, 3 cols on md+

                    const card = document.createElement("div");
                    card.dataset.productId = p.product_id;
                    console.log(p)
                    card.className = "card h-100"; // h-100 makes all cards same height
                    card.innerHTML = `
            <img src="${p.imageUrl}" class="card-img-top" alt="${p.name}">
        <div class="card-body">
          <h5 class="card-title">${p.name}</h5>
          <p class="card-text">${p.description}</p>
        </div>
        `;
                    card.addEventListener("click", () => {
                        const id = card.dataset.productId;
                        window.location.href = `index.php?route=product_details&id=${id}`;
                    });
                    col.appendChild(card);
                    row.appendChild(col);
                });
                container.appendChild(row);
            }

            // Render pagination
            renderPagination(data.totalPages, data.currentPage);
        })
        .catch((err) => console.error("Error:", err));
}
function renderPagination(totalPages, currentPage) {
    const pagination = document.getElementById("pagination");
    if (!pagination) return;

    pagination.innerHTML = "";

    // Prev button
    const prev = document.createElement("li");
    prev.className = "page-item" + (currentPage === 1 ? " disabled" : "");
    prev.innerHTML = `<a class="page-link" href="#">«</a>`;
    prev.onclick = (e) => {
        e.preventDefault();
        if (currentPage > 1) sendFilterRequest(currentPage - 1);
    };
    pagination.appendChild(prev);

    // Pages
    for (let i = 1; i <= totalPages; i++) {
        const li = document.createElement("li");
        li.className = "page-item" + (i === currentPage ? " active" : "");
        li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        li.onclick = (e) => {
            e.preventDefault();
            sendFilterRequest(i);
        };
        pagination.appendChild(li);
    }

    // Next button
    const next = document.createElement("li");
    next.className =
        "page-item" + (currentPage === totalPages ? " disabled" : "");
    next.innerHTML = `<a class="page-link" href="#">»</a>`;
    next.onclick = (e) => {
        e.preventDefault();
        if (currentPage < totalPages) sendFilterRequest(currentPage + 1);
    };
    pagination.appendChild(next);
}

// Trigger when a radio changes
radios.forEach((r) => {
    r.addEventListener("change", sendFilterRequest);
});

// Trigger when search submitted (Enter key)
form.addEventListener("submit", (e) => {
    e.preventDefault(); // prevent full page reload
    sendFilterRequest();
});
