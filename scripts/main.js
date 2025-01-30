//start Swiper
new Swiper('.slider', {
  autoplay: {
    delay: 5000,
  },

  speed: 800,
});

new Swiper('.slider-testimonials', {
  breakpoints: {
    380: {
      slidesPerView: 1,
    },

    740: {
      slidesPerView: 2,
    },

    1180: {
      slidesPerView: 3,
    },
  },
  autoplay: {
    delay: 5000,
  },
  speed: 800,
  spaceBetween: 100,
  loop: true,
});

(function () {
  var items = document.querySelectorAll(".timeline li");

  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function callbackFunc() {
    for (var i = 0; i < items.length; i++) {
      if (isElementInViewport(items[i])) {
        items[i].classList.add("in-view");
      }
    }
  }

  window.addEventListener("load", callbackFunc);
  window.addEventListener("resize", callbackFunc);
  window.addEventListener("scroll", callbackFunc);
})();



document.addEventListener("DOMContentLoaded", function () {
  var navLinksP = document.querySelectorAll('.nav__link--p');
  var subMenus = document.querySelectorAll('.nav__item--sub-menu');
  
  var clickCounts = new Array(navLinksP.length).fill(0);
  
  navLinksP.forEach(function(navLinkP, index) {
    navLinkP.addEventListener("click", function (e) {
      // Скидаємо всі інші підменю
      clickCounts.forEach((_, i) => {
        if (i !== index) clickCounts[i] = 0;
        updateSubMenuStyles(subMenus[i], clickCounts[i]);
      });

      // Оновлюємо поточне підменю
      clickCounts[index]++;
      updateSubMenuStyles(subMenus[index], clickCounts[index]);
      
      e.preventDefault();
      e.stopPropagation(); // Зупиняє подію, щоб вона не дійшла до document
    });
  });

  document.addEventListener("wheel", function () {
    clickCounts.fill(0);
    subMenus.forEach(function(subMenu, index) {
      updateSubMenuStyles(subMenu, clickCounts[index]);
    });
  });

  document.addEventListener("click", function () {
    clickCounts.fill(0);
    subMenus.forEach(function(subMenu, index) {
      updateSubMenuStyles(subMenu, clickCounts[index]);
    });
  });

  function updateSubMenuStyles(subMenu, clickCount) {
    subMenu.style.opacity = clickCount % 2 === 1 ? 1 : 0;
    subMenu.style.maxHeight = clickCount % 2 === 1 ? "200px" : "0";
  }
});


document.addEventListener('DOMContentLoaded', function () {
  var newsPerPage = 3;
  var newsBlocks = document.querySelectorAll('.newses__news');
  var totalPages = Math.ceil(newsBlocks.length / newsPerPage);
  var paginationContainer = document.querySelector('.pagination');

  showPage(1);

  function showPage(pageNumber) {

    window.scrollTo(0, 0);

    newsBlocks.forEach(function (block) {
      block.classList.remove('active');
    });

    var startIndex = (pageNumber - 1) * newsPerPage;
    var endIndex = startIndex + newsPerPage;

    for (var i = startIndex; i < endIndex && i < newsBlocks.length; i++) {
      newsBlocks[i].classList.add('active');
    }
  }

  for (var i = 1; i <= totalPages; i++) {
    var pageLink = document.createElement('a');
    pageLink.href = '#';
    pageLink.textContent = i;

    pageLink.addEventListener('click', function (event) {
      event.preventDefault();
      showPage(parseInt(event.target.textContent));
    });

    paginationContainer.appendChild(pageLink);
  }
});

$(document).ready(function() {

	//E-mail Ajax Send
	$(".footer__form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Ďakujeme, budeme Vás čo najskôr kontaktovať!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

});

$(document).ready(function() {

	//E-mail Ajax Send
	$(".invite__form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Ďakujeme, budeme Vás čo najskôr kontaktovať!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

});

// Перевірка, чи підтримує браузер сервісні робочі праці
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
      // Реєстрація сервісного працівника успішна
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
      
      // Оновлення кешу
      registration.update();
    }, function(err) {
      // Реєстрація сервісного працівника не вдалася
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}

document.addEventListener("DOMContentLoaded", function() {
    const userBlock = document.querySelector('.login__form--type-user');
    const adminBlock = document.querySelector('.login__form--type-admin');

    userBlock.addEventListener('click', function() {
        userBlock.classList.add('active');
        adminBlock.classList.remove('active');
        document.querySelector('.login__form--admin').classList.add('hidden');
        document.querySelector('.login__form--user').classList.remove('hidden');
    });

    adminBlock.addEventListener('click', function() {
        adminBlock.classList.add('active');
        userBlock.classList.remove('active');
        document.querySelector('.login__form--user').classList.add('hidden');
        document.querySelector('.login__form--admin').classList.remove('hidden');
    });
});


document.addEventListener('DOMContentLoaded', function() {
  var bonusCards = document.querySelectorAll('.bonus__card');
  var overlay = document.querySelector('.overlay');

  bonusCards.forEach(function(card) {
      var bonusInfo = card.querySelector('.bonus__card--info');
      var closeButton = card.querySelector('.bonus__card--info-cros');

      card.addEventListener('click', function() {
          bonusInfo.classList.add('show');
          overlay.style.display = 'block';
      });

      closeButton.addEventListener('click', function(event) {
          event.stopPropagation(); // Зупинити подальше спрацювання події
          bonusInfo.classList.remove('show');
          overlay.style.display = 'none';
      });
  });

  overlay.addEventListener('click', function() {
      bonusCards.forEach(function(card) {
          var bonusInfo = card.querySelector('.bonus__card--info');
          bonusInfo.classList.remove('show');
      });
      overlay.style.display = 'none';
  });
});


document.addEventListener("DOMContentLoaded", () => {
  const galleries = document.querySelectorAll(".bonus__main-gallery");

  galleries.forEach(gallery => {
      const thumbnails = gallery.querySelectorAll(".bonus__main-thumbnail");
      const mainImage = gallery.querySelector(".bonus__main-large-img");

      thumbnails.forEach(thumbnail => {
          thumbnail.addEventListener("click", function() {
              mainImage.src = this.src;
              mainImage.alt = this.alt;
          });
      });
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const menuItems = document.querySelectorAll('.bonus__menu > div');
  const mainItems = document.querySelectorAll('.bonus__main > div');

  menuItems.forEach((menuItem, index) => {
      menuItem.addEventListener('click', () => {
          // Видалити клас bonus__active з усіх блоків main
          mainItems.forEach(mainItem => {
              mainItem.classList.remove('bonus__active');
          });
          // Додати клас bonus__active до відповідного блоку main
          mainItems[index].classList.add('bonus__active');

          // Видалити клас active з усіх елементів меню
          menuItems.forEach(item => {
              item.classList.remove('active');
          });
          // Додати клас active до натиснутого елементу меню
          menuItem.classList.add('active');
      });
  });
});


document.addEventListener('DOMContentLoaded', function () {
  var newsPerPage = 1;
  var newsBlocks = document.querySelectorAll('.user__new');
  var totalPages = Math.ceil(newsBlocks.length / newsPerPage);
  var paginationContainer = document.querySelector('.pagination');

  showPage(1);

  function showPage(pageNumber) {

    window.scrollTo(0, 0);

    newsBlocks.forEach(function (block) {
      block.classList.remove('active');
    });

    var startIndex = (pageNumber - 1) * newsPerPage;
    var endIndex = startIndex + newsPerPage;

    for (var i = startIndex; i < endIndex && i < newsBlocks.length; i++) {
      newsBlocks[i].classList.add('active');
    }
  }

  for (var i = 1; i <= totalPages; i++) {
    var pageLink = document.createElement('a');
    pageLink.href = '#';
    pageLink.textContent = i;

    pageLink.addEventListener('click', function (event) {
      event.preventDefault();
      showPage(parseInt(event.target.textContent));
    });

    paginationContainer.appendChild(pageLink);
  }
});