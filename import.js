const url = 'https://patoacademy.network/hit/qrcyfzx-87954'

function teste() {

  fetch('proxies.txt')
    .then(response => response.text())
    .then(text => {
      array = text.split("\r\n");

      const proxies = array;

      const length = proxies.length;

      console.log(length);

      proxies.map(async proxy => {
        
        try {

          var proxys = proxy.split(':');

          const res = await axios.get('https://patoacademy.network/hit/qrcyfzx-87954', {
            responseType: 'json',
            timeout: 5000,
            proxy: {
              host: proxys[0],
              port: proxys[1]
            }
          })

          console.log('ok', res)

          var elemento = document.getElementById('jsp');

          elemento.innerHTML += '<br>' + res.config.proxy.host + ':' + res.config.proxy.port + ' - ' + res.data.message;

        } catch (err) {
          console.log(err);

          var elemento = document.getElementById('jsp');

          elemento.innerHTML += '<br>' + err;

        }

       

      })

      

    })
}

teste()

