# Web Proxy using Docker, NGINX and Let's Encrypt

With this repo you will be able to set up your server with multiple sites using a single NGINX proxy to manage your connections, automating your apps container (port 80 and 443) to auto renew your ssl certificates with Let´s Encrypt.

Something like:

![Web Proxy environment](https://github.com/evertramos/images/raw/master/webproxy.jpg)


## Why use it?

Using this set up you will be able start a production environment in a few seconds. For each new web project simply start the containers with the option `-e VIRTUAL_HOST=your.domain.com` and you will be ready to go. If you want to use SSL (Let's Encrypt) just add the tag `-e LETSENCRYPT_HOST=your.domain.com`. Done!

Easy and trustworthy!


## Prerequisites

In order to use this compose file (docker-compose.yml) you must have:

1. docker (https://docs.docker.com/engine/installation/)
2. docker-compose (https://docs.docker.com/compose/install/)


## How to use it

1. Clone this repository.

2. Run `./setup.sh`.

3. Update `.env` file with your settings.

4. Start services

In foreground (useful for local development):

```bash
docker-compose up
```

In background, with SSL (usually for production):

```bash
docker-compose -f docker-compose.yml -f http.yml up -d
```

In background, with a companion staging instance, both with SSL:

```bash
docker-compose -f docker-compose.yml -f staging.yml -f http.yml up -d
```

WordPress is ready to go!


# [DEPRECATED]

## Starting your web containers

After following the steps above you can start new web containers with port 80 open and add the option `-e VIRTUAL_HOST=your.domain.com` so proxy will automatically generate the reverse script in NGINX Proxy to forward new connections to your web/app container, as of:

```bash
docker run -d -e VIRTUAL_HOST=your.domain.com \
              --network=webproxy \
              --name my_app \
              httpd:alpine
```

To have SSL in your web/app you just add the option `-e LETSENCRYPT_HOST=your.domain.com`, as follow:

```bash
docker run -d -e VIRTUAL_HOST=your.domain.com \
              -e LETSENCRYPT_HOST=your.domain.com \
              -e LETSENCRYPT_EMAIL=your.email@your.domain.com \
              --network=webproxy \
              --name my_app \
              httpd:alpine
```

> You don´t need to open port *443* in your container, the certificate validation is managed by the web proxy.


> Please note that when running a new container to generate certificates with LetsEncrypt (`-e LETSENCRYPT_HOST=your.domain.com`), it may take a few minutes, depending on multiples circumstances.

## Further Options

1. Basic Authentication Support

In order to be able to secure your virtual host with basic authentication, you must create a htpasswd file within `${NGINX_FILES_PATH}/htpasswd/${VIRTUAL_HOST}` via:

```bash
sudo sh -c "echo -n '[username]:' >> ${NGINX_FILES_PATH}/htpasswd/${VIRTUAL_HOST}"
sudo sh -c "openssl passwd -apr1 >> ${NGINX_FILES_PATH}/htpasswd/${VIRTUAL_HOST}"
```

> Please substitute the `${NGINX_FILES_PATH}` with your path information, replace `[username]` with your username and `${VIRTUAL_HOST}` with your host's domain. You will be prompted for a password.

2. Using multiple networks

If you want to use more than one network to better organize your environment you could set the option `SERVICE_NETWORK` in our `.env.sample` or you can just create your own network and attach all your containers as of:

```bash
docker network create myownnetwork
docker network connect myownnetwork nginx-web
docker network connect myownnetwork nginx-gen
docker network connect myownnetwork nginx-letsencrypt
```

3. Using different ports to be proxied

If your service container runs on port 8545 you probably will need to add the `VIRTUAL_PORT` environment variable to your container, in the `docker-compose.yml`, as of:

```bash
parity
    image: parity/parity:v1.8.9
    [...]
    environment:
      [...]
      VIRTUAL_PORT: 8545
```

Or as of below:

```bash
docker run [...] -e VIRTUAL_PORT=8545 [...]
```

## Testing your proxy with scripts preconfigured 

1. Run the script `test.sh` informing your domain already configured in your DNS to point out to your server as follow:

```bash
./test_start_ssl.sh your.domain.com
```

or simply run:

```bash
docker run -dit -e VIRTUAL_HOST=your.domain.com --network=webproxy --name test-web httpd:alpine
```

Access your browser with your domain!

To stop and remove your test container run our `stop_test.sh` script:

```bash
./test_stop.sh
```

Or simply run:

```bash
docker stop test-web && docker rm test-web 
```

## Production Environment using Web Proxy and Wordpress

1. [docker-wordpress-letsencrypt](https://github.com/evertramos/docker-wordpress-letsencrypt)
2. [docker-portainer-letsencrypt](https://github.com/evertramos/docker-portainer-letsencrypt)
3. [docker-nextcloud-letsencrypt](https://github.com/evertramos/docker-nextcloud-letsencrypt)

In this repo you will find a docker-compose file to start a production environment for a new wordpress site.

## Credits

Without the repositories below this webproxy wouldn´t be possible.

Credits goes to:
- nginx-proxy [@jwilder](https://github.com/jwilder/nginx-proxy)
- docker-gen [@jwilder](https://github.com/jwilder/docker-gen)
- docker-letsencrypt-nginx-proxy-companion [@JrCs](https://github.com/JrCs/docker-letsencrypt-nginx-proxy-companion)


### Special thanks to:

- [@j7an](https://github.com/j7an) - Many contributions and the ipv6 branch!
- [@buchdag](https://github.com/JrCs/docker-letsencrypt-nginx-proxy-companion/pull/226#event-1145800062)
- [@fracz](https://github.com/fracz) - Many contributions!

