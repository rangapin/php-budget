  // self.addEventListener('activate', evt => {
  //   console.log(evt);
  // });

  // self.addEventListener('fetch', evt => {
  //   evt.respondWith(
  //     caches.match(evt.request).then(rep => {
  //       if (rep) {
  //         return rep;
  //       }
  //       return fetch(evt.request).then(
  //         newResponse => {
  //           caches.open('APP2').then(
  //             cache => cache.put(evt.request, newResponse)
  //           );
  //           return newResponse.clone();
  //         });
  //     })
  //   )
  // });

  self.addEventListener(​ 'install'​ , evt=>{
    console​ .log(evt);
    caches.open(​ 'lpdwca-PWA'​ ).then(
    cache=>{
    cache.addAll([
    'index.php'​ ,
    'sw.js'​ ,
    'dashboard.php'
    ]);
    })
    })

    self.addEventListener(​ 'activate'​ , evt=>{
    console​ .log(evt);
    })

    self.addEventListener(​ 'fetch'​ , evt=>{
    if​ (!navigator.onLine){
    evt.respondWith( ​ new​ Response(​ 'No Internet​ ))
    }
    console​ .log(evt.request.url);

    evt.respondWith(
    caches.match(evt.request).then(rep=>{
    if​ (rep){
    return​ rep;
    }
    return fetch(evt.request).then(
      newResponse => {
        caches.open('APP2').then(
          cache => cache.put(evt.request, newResponse)
        );
        return newResponse.clone();
      });
  })
)
});

