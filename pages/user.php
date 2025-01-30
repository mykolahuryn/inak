<?php
session_start();

// Перевірка, чи натиснута кнопка Logout
if (isset($_POST['logout'])) {
    // Завершення сеансу користувача
    session_destroy();
    // Перенаправлення на головну сторінку
    header("Location: /pages/login.html");
    exit();
}

// Перевірка, чи користувач автентифікований
if (!isset($_SESSION['user'])) {
    // Якщо користувач не автентифікований, перенаправлення на сторінку входу або будь-яку іншу потрібну сторінку
    header("Location: /pages/login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en" class="page">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles/main.css">
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />
  <title>INAK ❘ Aktuálne prieskumy</title>
  <link rel="shortcut icon" type="image/x-icon" href="../logo.png">
</head>
<body class="page__body">
  <header class="header">
    <div class="header__content">
      <div class="header__top">
        <div class="header__top--content">
          <a href="../index.html" class="header__logo">
            <img src="../images/icon/logo.png" alt="logo" class="logo">
          </a>
          
          <div class="nav header__nav">
            <div class="nav__content">
              <ul class="nav__item">
                <li class="nav__list">
                  <a href="../index.html" class="nav__link">Domov</a>
                </li>
                <li class="nav__list">
                  <a href="../index.html#about-us" class="nav__link">O nás</a>
                </li>
                <li class="nav__list">
                  <p class="nav__link nav__link--p">Aktuality</p>

                  <ul class="nav__item--sub-menu">
                    <li class="nav__list--sub-menu">
                      <a href="./aktuality.html" class="nav__link nav__link--active">Aktuálne novinky</a>

                      <a href="./vote.html" class="nav__link">Aktuálne prieskumy</a>
                    </li>
                  </ul>

                </li>
                
                <li class="nav__list">
                  <p class="nav__link nav__link--p">Výhody pre členov</p>

                  <ul class="nav__item--sub-menu">
                    <li class="nav__list--sub-menu">
                      <a href="./vyhody.html" class="nav__link">Sociálne benefity</a>

                      <a href="./vyhody-od-partnerov.html" class="nav__link">Benefity od partnerov</a>
                    </li>
                  </ul>

                </li>

                <li class="nav__list">
                  <a href="./tlaciva.html" class="nav__link">Tlačivá</a>
                </li>
                <li class="nav__list">
                  <a href="./prihlaska.html" class="nav__link">Elektronická prihláška</a>
                </li>
                <li class="nav__list">
                  <a href="#contacts" class="nav__link">Kontakty</a>
                </li>
              </ul>
            </div>
          </div>
  
          <div class="header__top-right">
            <a href="tel:+421903153428" class="header__phone">
              <img src="../images/icon/phone.svg" alt="phone" class="icon">
            </a>


    
            <a href="#menu" class="header__menu-open">
              <img src="../images/icon/menu-open.svg" alt="menu-open" class="icon">
            </a>
          </div>
        </div>
      </div>        

      <aside class="aside header__aside" id="menu">
        <div class="aside__content">
          
          <div class="aside__top">
            <a href="#" class="aside__logo">
              <img src="../images/icon/logo.png" alt="logo" class="logo">
            </a>
            
            <a href="#" class="header__menu-close">
              <img src="../images/icon/menu-close.svg" alt="menu-close" class="icon">
            </a>
          </div>

          <div class="nav aside__nav">
            <div class="nav__content">
              <ul class="nav__item aside__nav-item">
                <li class="nav__list">
                  <a href="../index.html" class="nav__link">Domov</a>
                </li>
                <li class="nav__list">
                  <a href="../index.html#about-us" class="nav__link">O nás</a>
                </li>
                <li class="nav__list">
                  <p class="nav__link nav__link--p nav__link--active">Aktuality</p>

                  <ul class="nav__item--sub-menu nav__item--sub-menu--mob">
                    <li class="nav__list--sub-menu nav__list--sub-menu--mob">
                      <a href="./aktuality.html" class="nav__link nav__link--active">Aktuálne novinky</a>

                      <a href="./vote.html" class="nav__link">Aktuálne prieskumy</a>
                    </li>
                  </ul>
                </li>
                
                <li class="nav__list">
                  <p class="nav__link nav__link--p">Výhody pre členov</p>

                  <ul class="nav__item--sub-menu nav__item--sub-menu--mob">
                    <li class="nav__list--sub-menu nav__list--sub-menu--mob">
                      <a href="./vyhody.html" class="nav__link">Sociálne benefity</a>

                      <a href="./vyhody-od-partnerov.html" class="nav__link">Benefity od partnerov</a>
                    </li>
                  </ul>
                </li>

                <li class="nav__list">
                  <a href="./tlaciva.html" class="nav__link">Tlačivá</a>
                </li>
                <li class="nav__list">
                  <a href="./prihlaska.html" class="nav__link">Elektronická prihláška</a>
                </li>
                <li class="nav__list">
                  <a href="#contacts" class="nav__link">Kontakty</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="aside__social social">
            <a
              href="https://www.facebook.com/groups/980731282849397"
              class="aside__icon-fb"
              target="_blank"
            >
              <img
                src="../images/icon/fasebook.svg"
                alt="icon"
                class="icon"
              >
            </a>

            <a
              href="https://www.tiktok.com/@odbory.inak?_t=8iX3qMJiIoH"
              class="aside__icon-tw"
              target="_blank"
            >
              <img
                src="../images/icon/tiktok.svg"
                alt="icon"
                class="icon"
              >
            </a>

            <a
              href="https://www.instagram.com/odbory.inak?igsh=MTdlaDB3MjM0anUzcg=="
              class="aside__icon-in"
              target="_blank"
            >
              <img
                src="../images/icon/instagram.svg"
                alt="icon"
                class="icon"
              >
            </a>
          </div>
        </div>
      </aside>
    </div>
  </header>

  <main class="user main__section">
    <div class="user__content">

      <div class="user__top">
        <div class="user__grop">
          <img class="user__logo" src="../images/icon/logo-user.png" alt="logo user">
          <h3 class="user__title">
            <?php echo $_SESSION['user']['name']; ?> 
            <?php echo $_SESSION['user']['surname']; ?>
          </h3>
        </div>
  
        <form class="user__form" method="post">
          <input class="user__button-exit" type="submit" name="logout" value="Odhlásiť sa">
        </form>
      </div>

      <div class="user__news">
        <div class="user__new">
          <h2 class="user__news--title">Info k BENEFITOM</h2>
          <p class="user__news--info">
            Dobrý deň všetkým členom. 
            <br> 
            <br>
            Nakoľko nám začal mesiac Júl tak ako som písal v predchádzajúcom maily od tohto mesiaca sú dostupné všetky benefity aj našej zastrešujúcej organizácie ECHOZ. Na ich stránke Benefity členstva - ECHOZ (https://www.echoz.sk/benefity-clenstva/)  nájdete všetky dostupné benfity. Ak je pri niektorom benefite uvedené, že treba heslo alebo kód, ktorí Vám poskytne predseda Vašej organizácie tak ma kontaktujte buď mailom alebo telefonicky a ja Vám heslo poprípade kód poskytnem. Taktiež sú dostupné naše interné benefity.

            Tí členovia ktorí si ešte neprevzali darčekové poukážky Kaufland v hodnote 20€ pri príležitosti nášho prvého výročia nám buď napíšte aby sme si dohodli spôsob odovzdania alebo sa zastavte u nás v kancelárii v budove TR51 na 1 poschodí nad jedálňou. Sme tu prítomný každý deň od pondelka do piatku v čase od 07:00 do 15:30. 

            Členovia ktorí majú záujem o lístky do Family Parku v Rakúsku za cenu 26€/osoba (originál cena lístkov je od 34€ do 41€) aj pre rodinných príslušníkov, napíšte nám mail a počet lístkov. My ich tento týždeň v piatok objednáme a keď budú k dispozícii tak sa Vám ozveme. Do mailu napíšte Family Park a počet lístkov. 

            V procese vybavovania sú lístky do Aqvaparku v Trnave a Vincovho lesa. O ich dostupnosti Vás budeme informovať. 
            <br>
            <br>
            S pozdravom
            <br>
            ANDREJ KRALOVIČ
            <br>
            <br>
            Predseda ZO ECHOZ Odbory INAK 
            <br>
            pri PCA Slovakia s.r.o.
          </p>
        </div>

        <div class="user__new">
          <h2 class="user__news--title">Odovzdávanie poukážok a podpis prihlášok ECHOZ</h2>
          <p class="user__news--info">
            Dobrý deň všetkým členom. 
            <br> 
            <br>
            Tak ako som Vám písal v poslednom maili tento mesiac budeme pri príležitosti nášho prvého výročia a vstupu pod celoslovenskú odborovú organizáciu ECHOZ odovzdávať našim členom poukážky na nákup tovaru v sieti predajní Kaufland a zároveň budeme dávať podpisovať nové prihlášky do ECHOZ-u aby ste mohli čerpať všetky benefity spojené s členstvom v tejto organizácii. Odovzdávanie a podpisy budú prebiehať vo vstupných halách jednotlivých prevádzok nasledovne:
            • MONTÁŽ, KVALITA, LOGISTIKA - v piatok 14.6.2024 v čase od 13:00 do 15:00 hod
            • LAKOVŇA - v pondelok 17.6.2024 v čase od 13:00 do 15:00 hod
            • ZVAROVŇA a LISOVŇA - v piatok 21.6.2024 v čase od 13:00 do 15:00hod
           Pre členov z víkendovej zmeny, nočnej zmeny alebo pre tých čo z nejakého dôvodu nebudú v práci alebo sa nemôžu dostaviť, budeme k dispozícii v našej kancelárii, alebo si môžu dohodnúť  individuálne vyzdvihnutie ak nám napíšu alebo zavolajú.
            <br>
            <br>
            S pozdravom
            <br>
            ANDREJ KRALOVIČ
            <br>
            <br>
            Predseda ZO ECHOZ Odbory INAK 
            <br>
            pri PCA Slovakia s.r.o.
          </p>
        </div>

        <div class="user__new">
          <h2 class="user__news--title">Prvé výročie našej organizácie</h2>
          <p class="user__news--info">
            Dobrý deň všetkým členom.
            <br> 
            <br>
            Nakoľko sa blíži výročie založenia našej odborovej organizácie rozhodli sme sa Vám oznámiť pár noviniek, ktoré nás pri tejto príležitosti čakajú. V prvom rade sme úspešne dotiahli náš vstup pod celoslovenský odborový zväz ECHOZ, ktorí nám bude výraznou pomocou či už pri obhajovaní Vašich záujmov alebo poskytovaní právnych poradenstiev, poskytovaní rôznych benefitov a odborných školení pre našich zástupcov. 30.6. budeme mať prvé výročie založenia našej organizácie a preto sme sa rozhodli našich členov pri tomto výročí odmeniť za ich podporu darčekovou poukážkou vo výške 20€. Poukážky budeme odovzdávať v priebehu júna vo vstupných halách jednotlivých prevádzok. Dátumy a miesta Vám oznámime v priebehu tohto týždňa. Taktiež Vám budú naši zástupcovia dávať podpisovať aj prihlášku do ECHOZU. Je to len formálna záležitosť aby ste mohli čerpať aj benefity z tejto organizácie. Pre Vás sa tým nič nemení, nezvyšujú sa žiadne poplatky, všetko zostáva tak ako doteraz. Od 1.7 spúšťame aj náš sociálny program a bude možné po tomto dátume čerpať aj benefity, ktoré poskytuje ECHOZ. Bližšie informácie Vám poskytnú naši zástupcovia na jednotlivých prevádzkach, pri preberaní darčekových poukážok alebo sa na nás obráťte telefonicky, mailom radi Vám vysvetlíme, poradíme.
            <br>
            <br>
            S pozdravom
            <br>
            ANDREJ KRALOVIČ
            <br>
            <br>
            Predseda ZO ECHOZ Odbory INAK 
            <br>
            pri PCA Slovakia s.r.o.
          </p>
        </div>

        <div class="pagination"></div>
      </div>

    </div>
  </main>

  <footer class="footer">
    <div class="footer__content" id="contacts">
      <div class="footer__grop--left">
        <h2 class="footer__grop--left-title">Napíšte nám</h2>

        <form method="post" class="form footer__form">
          <!-- Hidden Required Fields -->
          <input type="hidden" name="project_name" value="odboryinak.sk">
          <input type="hidden" name="admin_email" value="info@odboryinak.sk">
          <input type="hidden" name="form_subject" value="Forma spätnej väzby">
          <!-- END Hidden Required Fields -->

      <input
        name="Meno"
        type="text"
        class="form__input"
        placeholder="Meno"
        required
      >

      <input
        name="Email"
        type="email"
        class="form__input"
        placeholder="E-mail"
        required
      >

      <input
        name="Sprava"
        type="text"
        placeholder="Tvoja správa"
        class="form__input"
        required
      >

      <button class="button form__button">Poslať</button>
    </form>
      </div>

      <div class="footer__grop--right">
        <h2 class="footer__grop--right-title">Naše kontakty</h2>

        <h3 class="footer__grop--right-name">Kontaktujte nás</h3>
        <a href="tel:+421903153428" class="footer__grop--right-link">+421903153428</a>
        <a href="e-mail:odbory.inak@gmail.com" class="footer__grop--right-link">odbory.inak@gmail.com</a>
        
        <h3 class="footer__grop--right-name">Navštívte nás</h3>
        <a
          href="https://maps.app.goo.gl/qfohM48gK4zqPQLv8"
          class="footer__grop--right-link"
          target="_blank"
        >
          Automobilová 1, 917 01 Trnava
        </a>

        <h3 class="footer__grop--right-name">Naše sociálne siete</h3>
        <div class="footer__grop--right-social social">
          <a
            href="https://www.facebook.com/groups/980731282849397"
            class="aside__icon-fb"
            target="_blank"
          >
            <img
              src="../images/icon/fasebook.svg"
              alt="icon"
              class="icon"
            >
          </a>

          <a
            href="https://www.tiktok.com/@odbory.inak?_t=8iX3qMJiIoH"
            class="aside__icon-tw"
            target="_blank"
          >
            <img
              src="../images/icon/tiktok.svg"
              alt="icon"
              class="icon"
            >
          </a>

          <a
            href="https://www.instagram.com/odbory.inak?igsh=MTdlaDB3MjM0anUzcg=="
            class="aside__icon-in"
            target="_blank"
          >
            <img
              src="../images/icon/instagram.svg"
              alt="icon"
              class="icon"
            >
          </a>
        </div>

      </div>

      <div class="footer__grop--strip"></div>

      <div class="footer__grop--bottom">
        
        <div>
          <h3 class="footer__grop--bottom-title">Kde nás nájdete</h3>

          <p class="footer__grop--bottom-info">Kancelaria sa nachádza v budove TR51 na prvom poschodí. Dvere sú označené našim logom.</p>
        </div>

        <img src="../images/footer/where_we_are.jpg" alt="where we are" class="footer__grop--bottom-image">
      </div>

      <iframe
          src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d637.6735470330658!2d17.63245916961682!3d48.36457628921895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDjCsDIxJzUyLjUiTiAxN8KwMzcnNTkuMiJF!5e1!3m2!1ssk!2ssk!4v1709551512222!5m2!1ssk!2ssk"
          class="footer__grop--bottom-map"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
      </iframe>


      <div class="footer__grop--strip"></div>

      <div class="footer__grop--corporation">© 2023 Odbory INAK</div>

    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../scripts/main.js"></script>
</body>
</html>
