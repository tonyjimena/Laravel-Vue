//importScripts('/cache-polyfill.js');
const version = 'v3.1'
//instalacion
self.addEventListener('install', function(e) {
 e.waitUntil(
    //console.log('service worker instalado')
    caches.open(version)
      .then(function(cache) {
        return cache.addAll([
          'offlineIndex.html',
          './images/offlineImage.png'
        ])
      })
   )
});

//Activacion
self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys()
      .then(function(keys){
        //Borrar versiones antiguas del SW
        return Promise.all(keys.filter(function(key){
          return key !==version
        }).map(function(key){
          return caches.delete(key)
        }))
      })
  )
})

//Activacion
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        if(response) {
          return response
        }
        if( !navigator.onLine) {
          return caches.match(new Request('offlineIndex.html'))
        }
        return fetch(event.request)
      })
  )
})




