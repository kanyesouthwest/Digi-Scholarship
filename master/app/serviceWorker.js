const version = "1";

const staticDevCoffee = "dev-coffee-site-v1"
const assets = [
    "/",
    "/index.php",
    "/custom.css",
    "/app.js"
]


self.addEventListener('install', installEvent => {
    installEvent.waitUntil(
        caches.open(staticDevCoffee).then(cache => {
            cache.addAll(assets)
        })
        )
});

self.addEventListener('fetch', function(event) {
    event.respondWith(async function() {
       try{
         var res = await fetch(event.request);
         var cache = await caches.open('cache');
         cache.put(event.request.url, res.clone());
         return res;
       }
       catch(error){
         return caches.match(event.request);
        }
      }());
  });