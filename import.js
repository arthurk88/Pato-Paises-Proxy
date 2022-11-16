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

        var proxys = proxy.split(':');

        setInterval(

        res = await axios.get(url, {
          proxy: {
            host: proxys[0],
            port: proxys[1]
          }
        })

        ,60000);

        Promise.all([res]).then(response => {
          console.log(response[0].data.message)
          var elemento = document.getElementById('jsp');

          elemento.innerHTML += '<div class="alert alert-dark" >' + response[0].config.proxy.host + ':' + response[0].config.proxy.port + ' - ' + response[0].data.message + '</div>';

        }).catch(error => {
          console.log(error)
          var elemento = document.getElementById('jsp');

          elemento.innerHTML += '<div class="alert alert-dark">' + err + '</div>';
        })

      })

    })
}

teste()