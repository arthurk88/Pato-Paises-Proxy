



// // https://api.github.com/users/arthurk88

//     const proxies = ['222.179.155.90:9091',
//         '111.225.153.31:8089'];

//         reso = axios.get('https://patoacademy.network/hit/qrcyfzx-87954', {
//             proxy: {
//                 protocol: ['https','http'],
//                 host: '222.179.155.90',
//                 port: '9091',
//             }
//         })

//         console.log('ok', res)

//         Promise.all([res]).then(response => {
//             console.log(response.data.message)
//             var elemento = document.getElementById('jsp');

//             elemento.innerHTML += '<div class="alert alert-dark" >' + response.config.proxy.host + ':' + response.config.proxy.port + ' - ' + response.data.message + '</div>';

//         }).catch(error => {
//             console.log(error)
//         })