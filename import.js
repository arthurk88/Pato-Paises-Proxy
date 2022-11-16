const url = 'https://patoacademy.network/hit/qrcyfzx-87954'

function teste() {

  fetch('proxies.txt')
  .then(response => response.text())
  .then(text => {
    array = text.split("\r\n");

  const proxies = array;

  proxies.forEach(proxy => {

    console.log(proxy);

    var proxys = proxy.split(':');

    axios.get('https://patoacademy.network/hit/qrcyfzx-87954',{
    proxy: {
      host: proxys[0],
      port: proxys[1],
      auth: {username: 'my-user', password: 'my-password'}
  }})

    .then((res) => { 
        console.log('ok',res.data.message) 
    })
    .catch((err) => {
      console.log(err);
    })

   

  })

})
}
teste()

