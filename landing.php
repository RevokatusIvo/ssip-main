<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="landing.css">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Radatouli</title>
    </head>
    <body>
        <!--===== HEADER =====-->
        <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <a href="#" class="nav__logo">Radatouli</a>
                </div>

                <div class="nav__home" id="nav-home">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active">home</a></li>
                        <li class="nav__item"><a href="#reserve" class="nav__link">Reserve</a></li>
                        <li class="nav__item"><a href="#menu" class="nav__link">menu</a></li>
                        <?php
                        session_start();
                        if(isset($_SESSION['username'])) {
                            // Jika sudah login, tampilkan tautan Logout
                            echo '<li class="nav__item"><a href="logout.php" class="nav__link">Logout</a></li>';
                        } else {
                            // Jika belum login, tampilkan tautan Login
                            echo '<li class="nav__item"><a href="submit-login.php" class="nav__link">Login</a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-home'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--===== home =====-->
            <section class="home" id="home">
                <div class="home__container bd-grid">
                    <h1 class="home__title"><span>RADATOULI</span></h1>

                    <div class="home__scroll">
                        <a href="#reserve" class="home__scroll-link"><i class='bx bx-up-arrow-alt' ></i>Scroll down</a>
                    </div>

                    <img src="" alt="" class="home__img">
                </div>
            </section>
              
            <!--===== reserve =====-->
            <section class="reserve section" id="reserve">
                <h2 class="section-title">Reserve</h2>
                <div class="reserve__container bd-grid">
                    <div class="reserve__img">
                        <img src="./image/image5.jpg" alt="">
                    </div>
                    <div>
                        <h2 class="reserve__subtitle">Wanna Reserve?</h2>
                        <p class="reserve__text">Click The button👇bellow to make a reservation</p>

                        <div class="reserve__button">
                            <a href="#" class="reserve__button-link">Reservation</a>
                          </div>
                    </div>
                </div>
            </section>

            <!--===== menu =====-->
            <section class="menu section" id="menu" >
                <h2 class="section-title">Menu</h2>

                <div class="menu__container bd-grid">
                    <div class="menu__box">
                        <h3 class="menu__subtitle">Food</h3>
                        <span class="menu__name">Noodle</span>
                        <span class="menu__name">Pizza</span>
                        <span class="menu__name">Dessert</span>
                        <span class="menu__name">Apetaizer</span>

                        <h3 class="menu__subtitle">Drink</h3>
                        <span class="menu__name">Juice</span>
                    </div>
                    <div class="menu__img">
                        <img src="./image/image1.png" alt="">
                        <img src="./image/image2.png" alt="">
                        <img src="./image/image3.png" alt="">
                    </div>
                </div>
            </section>
        </main>
        <!--===== FOOTER =====-->
        <footer class="footer section">
            <div class="footer__container bd-grid">
                <div class="footer__data">
                    <h2 class="footer__title">RADATOULI</h2>
                    <p class="footer__text">PEPEK</p>
                </div>

                <div class="footer__data">
                    <h2 class="footer__title"></h2>
                    <ul>
                        <li><a href="#home" class="footer__link">home</a></li>
                        <li><a href="#reserve" class="footer__link">reserve</a></li>
                        <li><a href="#menu" class="footer__link">menu</a></li>
                    </ul>
                </div>

                <div class="footer__data">
                    <h2 class="footer__title">Follow</h2>
                    <a href="#" class="footer__social"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="footer__social"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="footer__social"><i class="bx bxl-twitter"></i></a>
                </div>
            </div>
        </footer>

        <!--===== SCROLL REVEAL =====-->
        <script src="https://unpkg.com/scrollreveal"></script>
        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
        
    </body>
</html>