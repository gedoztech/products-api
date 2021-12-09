# Tecnologies

- Nginx 1.21.3
- PHP 8.0.12
- FPM (FastCGI Process Manager)
- MySQL 8.0.27
- Alpine 3.1.14
- Docker Engine
- Docker Compose

# Install

Clone from repo:

```sh
git clone https://github.com/johnny00joe/products-api.git
```

Access project root folder:

```sh
cd products-api
```

Build services and run the containers:

```sh
make build
```

# Other commands

In background, builds, (re)creates, starts, and attaches to containers for a service:

```sh
make up
```

Stops containers and removes containers, networks, volumes, and images created by `up`:

```sh
make down
```

Stops running containers without removing them:

```sh
make stop
```

Starts existing containers for a service:

```sh
make start
```

Restarts all stopped and running services:

```sh
make restart
```

# Endpoints outside Docker

Webserver:

```
http://localhost:4000
```

Base de Dados:

```
mysql -h localhost -P 4001 -u products -p12344 products
```
