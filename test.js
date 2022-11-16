



// https://api.github.com/users/arthurk88


async function getDataGithub() {

    const url = 'https://patoacademy.network/hit/qrcyfzx-87954'

    const proxies = ['222.179.155.90:9091',
    '111.225.153.31:8089']

    // fetch('proxies.txt')
    //     .then(response => response.text())
    //     .then(text => {
    //         array = text.split("\r\n");

    //         const proxies = array;
    //     })

    proxies.map(async proxy => {

        var proxys = proxy.split(':');

        const res = await axios.get(url, {
            headers: {
                'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36'
            },
            proxy: true,
            proxy: {
                host: proxys[0],
                port: proxys[1]
            }
        })


        var elemento = document.getElementById('jsp');
        elemento.innerHTML += '<div class="alert alert-dark" >' + res.config.proxy.host + ':' + res.config.proxy.port + ' - ' + res.data.message + '</div>';
    }



    )
}



getDataGithub()
