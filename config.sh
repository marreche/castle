#!/bin/bash

GREEN='\033[0;32m'
NC='\033[0m'

echo "HELLO $(whoami) and WELCOME TO MAURICIO ARRECHEA'S STRONGHOLD TECHNICAL TEST"
echo "Please wait while some configurations are made for the project to work"
echo "--------------------------------------------------"
echo "Configuring Docker..."
sudo docker-compose up -d
echo -e "${GREEN}Docker Configured!"
echo "Installing dependencies..."
composer require symfony/runtime
echo -e "${GREEN}Installation complete!${NC}"
echo "Launching server..."
sudo symfony serve -d
echo -e "${GREEN}Server running at localhost!${NC}"
echo "Instructions for MySQL cli"
echo "USE main;"
echo "Copy the query below and insert in the mysql cli: "
echo 
echo "CREATE TABLE projects ( "
echo "id INT AUTO_INCREMENT NOT NULL, "
echo "name VARCHAR(255) NOT NULL, "
echo "amount BIGINT NOT NULL, "
echo "start_date DATETIME NOT NULL, "
echo "PRIMARY KEY(id))" 
echo "DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci' ENGINE = InnoDB;"
echo 
echo -e "To exit the mysql cli just type ${RED}'exit'${NC}"



