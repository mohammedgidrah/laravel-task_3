<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

.navbar {
    background-color: #333;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar-brand a {
    color: white;
    text-decoration: none;
    font-size: 24px;
    font-weight: bold;
}

.navbar-links {
    list-style: none;
    display: flex;
}

.navbar-links li {
    margin-left: 20px;
}

.navbar-links a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s;
}

.navbar-links a:hover {
    color: #007bff;
}

.navbar-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
}

.navbar-toggle .bar {
    width: 25px;
    height: 3px;
    background-color: white;
    margin: 4px 0;
    transition: all 0.3s;
}

/* Responsive Design */

@media (max-width: 768px) {
    .navbar-links {
        display: none;
        flex-direction: column;
        width: 100%;
        background-color: #333;
        position: absolute;
        top: 60px;
        left: 0;
    }

    .navbar-links.active {
        display: flex;
    }

    .navbar-links li {
        text-align: center;
        margin: 10px 0;
    }

    .navbar-toggle {
        display: flex;
    }
}
</style>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
        </div>
        <ul class="navbar-links" id="nav-links">
            <li><a href="{{ route('product.index') }}">product</a></li>
            <li><a href="{{ route('category.index') }}">category</a></li>
            <li><a href="{{ route('Users.index') }}">View Users</a></li>

        </ul>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.getElementById('nav-links');

        mobileMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>
