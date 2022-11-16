const url = 'https://patoacademy.network/hit/qrcyfzx-87954'

function teste() {

  fetch('proxies.txt')
    .then(response => response.text())
    .then(text => {
      array = text.split("\r\n");

      const proxies = array;

      const length =  proxies.length;

      console.log(length);

      proxies.forEach( async proxy => {
        try {
          
          var proxys = proxy.split(':');

          const res = await axios.get('https://patoacademy.network/hit/qrcyfzx-87954', {
            responseType: 'json',
            timeout: 20000,
            proxy: {
              protocol: 'https',
              host: proxys[0],
              port: proxys[1]
            }
          })

          var url = "https://patoacademy.network/hit/qrcyfzx-87954";
          var xhttp = new XMLHttpRequest();
          xhttp.open("GET", url,{proxy: {
                        host: proxys[0],
                        port: proxys[1]
                      }});
          xhttp.send();
          console.log(xhttp.response.data);


          console.log('ok', res.data.message)

        } catch (err) {
          console.log(err);
        }





    })

})
}

teste()

