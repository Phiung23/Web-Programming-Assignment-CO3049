<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us | Yaki Electronics</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.8rem;
            letter-spacing: 2px;
        }

        header p {
            font-size: 1.2rem;
            margin-top: 0.5rem;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 2rem auto;
            text-align: center;
        }

        .about-section {
            margin-bottom: 3rem;
        }

        .about-section h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #2a5298;
        }

        .about-section p {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 800px;
            margin: auto;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin: 3rem 0;
        }

        .stat {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 0 10px;
            transition: transform 0.3s;
        }

        .stat:hover {
            transform: translateY(-5px);
        }

        .stat h3 {
            font-size: 2rem;
            margin: 0;
            color: #1e3c72;
        }

        .stat p {
            margin-top: 0.5rem;
            font-size: 1rem;
            color: #555;
        }

        .team {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .team-member {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .team-member:hover {
            transform: scale(1.05);
        }

        .team-member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        footer {
            background: #1e3c72;
            color: white;
            text-align: center;
            padding: 1.5rem;
            margin-top: 3rem;
        }

        .badge {
            display: inline-block;
            background: #ff9800;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php include __DIR__ . '/partials/nav-bar.php' ?>

    <header>
        <h1>About Yaki</h1>
        <p>Your trusted partner in the world of electronics</p>
    </header>
    <div class="container">
        <!-- About -->
        <section class="about-section">
            <h2>Who We Are</h2>
            <p>
                At <strong>Yaki</strong>, we believe technology should inspire, empower, and connect people.
                From cutting-edge smartphones and laptops to the latest smart gadgets, we bring you the best of the digital world
                with unmatched quality and customer service.
            </p>
        </section>

        <!-- Stats with dynamic counters -->
        <div class="stats">
            <div class="stat">
                <h3 id="customers">0</h3>
                <p>Happy Customers</p>
            </div>
            <div class="stat">
                <h3 id="products">0</h3>
                <p>Products</p>
            </div>
            <div class="stat">
                <h3 id="stores">0</h3>
                <p>Stores over the globe</p>
            </div>
        </div>

        <!-- Team -->
        <section class="about-section">
            <h2>Meet Our Team</h2>
            <div class="team">
                <div class="team-member">
                    <img src="public/images/founder.jpg" alt="CEO">
                    <h3>Nguyễn Hồ Phi Ưng</h3>
                    <p>CEO & Founder</p>
                    <span class="badge">Visionary</span>
                </div>
                <div class="team-member">
                    <img src="public/images/founder.jpg" alt="CTO">
                    <h3>Ưng Nguyễn Hồ Phi</h3>
                    <p>Chief Technology Officer</p>
                    <span class="badge">Tech Guru</span>
                </div>
                <div class="team-member">
                    <img src="public/images/founder.jpg" alt="CMO">
                    <h3>Nguyễn Ưng</h3>
                    <p>Chief Marketing Officer</p>
                    <span class="badge">Storyteller</span>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <p>© 2025 Yaki Electronics. All rights reserved.</p>
    </footer>

    <script>
        // Dynamic counter animation
        function animateCounter(id, target) {
            const el = document.getElementById(id);
            let count = 0;
            const increment = target / 100; // smooth animation
            const interval = setInterval(() => {
                count += increment;
                if (count >= target) {
                    count = target;
                    clearInterval(interval);
                }
                el.textContent = Math.floor(count).toLocaleString();
            }, 20);
        }

        // Start counters when page loads
        window.onload = () => {
            animateCounter("customers", <?= $numUsers ?>);
            animateCounter("products", <?= $numProducts ?>);
            animateCounter("stores", <?= $numStores ?>);
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>