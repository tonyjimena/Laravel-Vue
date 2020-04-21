if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('./service-worker.js', {scope: './'})
    .then(function(registration) {
      console.log('Service worker registrado: ', registration);
    }).catch(function(error) {
      console.log('Registro de Servicer Worker fallido:', error);
    });
  } else {
    console.log('Tu navegador no soporta Service Workers');
  }
