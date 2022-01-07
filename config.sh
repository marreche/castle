#!/bin/bash

GREEN='\033[0;32m'
NC='\033[0m'

echo "HELLO $(whoami) and WELCOME TO MAURICIO ARRECHEA'S STRONGHOLD TECHNICAL TEST"
echo "Please wait while some configurations are made for the project to work"
echo "--------------------------------------------------"
echo "Configuring Docker..."
docker-compose up -d
echo "${GREEN}Docker Configured!"
echo "Installing dependencies..."
composer require symfony/runtime
echo "${GREEN}Installation complete!${NC}"
echo "Launching server..."
sudo symfony serve -d
echo "${GREEN}Server running at localhost!${NC}"
echo "Copy the query below and insert in the mysql cli: \
CREATE TABLE projects ( \
id INT AUTO_INCREMENT NOT NULL, \
name VARCHAR(255) NOT NULL, \
amount BIGINT NOT NULL, \
start_date DATETIME NOT NULL, \
PRIMARY KEY(id)) \
DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci' ENGINE = InnoDB;"
echo "to exit the mysql cli just type ${RED}'exit'${NC}"
docker-compose exec database mysql --password=password



