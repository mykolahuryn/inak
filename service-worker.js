const CACHE_NAME = 'my-site-cache-v1';
const urlsToCache = [
  '/',
  './styles/main.css',
  './script/main.js',
  './logo.png',
  './index.html',
  './index-ua.html',
  './pages/aktuality.html',
  './pages/aktuality-ua.html',
  './pages/prihlaska.html',
  './pages/prihlaska-ua.html',
  './pages/tlaciva.html',
  './pages/tlaciva-ua.html',
  './pages/vote.html',
  './pages/vote-ua.html',
  './pages/vyhody.html',
  './pages/vyhody-ua.html',
  
];

self.addEventListener('install', function(event) {
  // Встановлення кешу при першому виклику сервісного працівника
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('fetch', function(event) {
  // Обробка запитів на ресурси
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Повернення ресурсу з кешу, якщо він є
        if (response) {
          return response;
        }
        // В іншому випадку, виконання запиту до мережі
        return fetch(event.request);
      })
  );
});

self.addEventListener('activate', function(event) {
  // Очищення застарілих кешів при активації нового сервісного працівника
  var cacheWhitelist = ['pages-cache-v1', 'blog-posts-cache-v1'];
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});