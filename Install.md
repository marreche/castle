Requirements : Docker, Docker-Compose, Twig, Doctrine

Clone the repository: 
```
git clone git@github.com:marreche/castle.git
```
Run config.sh:
```
bash config.sh
```
Follow the instructions displayed on your terminal.
```
sudo docker-compose exec database mysql --password=password
```

When you wish to stop the server run:

```
symfony server:stop
sudo docker-compose down
```

ENJOY!