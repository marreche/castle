Requirements : Docker, Docker-Compose, Twig, Doctrine

Clone the repository: 
```
git clone git@github.com:marreche/castle.git
```
Run config.sh:
```
bash config.sh
```
After running the script, follow the instructions below to create the empty "projects" table in the database.

TO START MySQL cli:
```
sudo docker-compose exec database mysql --password=password
```
NAVIGATE TO "main" DATABASE:
```
USE main;
```
CREATE THE "projects" TABLE:
```
CREATE TABLE projects (
id INT AUTO_INCREMENT NOT NULL,
name VARCHAR(255) NOT NULL,
amount BIGINT NOT NULL,
start_date DATETIME NOT NULL,
PRIMARY KEY(id))
DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci' ENGINE = InnoDB;
```
EXIT MySQL cli:
```
exit
```

I tried to create the new table using the commands below but I don't really understand how to use them correctly. When I ran them an error message stated the "projects" table is already created even though when I search for the table apparently its not. 

```
symfony console doctrine:migrations:diff --from-empty-schema
symfony console doctrine:migrations:migrate
```

When you wish to stop the server run:

```
symfony server:stop
sudo docker-compose down
```

ENJOY!