###
- Build docker image in current location
```
docker build -t php8-postgres:v1.002 .
```
- open docker container using builded image
```
docker run -d -p  8080:80 php8-postgres:v1.002
```
- Open docker container with custom image on custom network
```
docker run -d -p 8081:80 --network my-custom-net --name my-container my-image-name
```
```
docker run -d -p 8081:80 --network mynet-1 --name my-php84 php8-postgres:v1.002
```

### Docker Compose
```
docker compose up --build
```