#!/bin/bash

GREEN='\033[0;32m'
NC='\033[0m'

echo "HELLO $(whoami) and WELCOME TO MAURICIO ARRECHEA'S STRONGHOLD TECHNICAL TEST"
echo "Please wait while some configurations are made for the project to work"
echo "--------------------------------------------------"
echo "Configuring Docker..."
sudo docker-compose up -d
echo -e "${GREEN}Docker Configured!"
echo "--------------------------------------------------"
echo "Installing dependencies..."
composer require symfony/runtime
echo -e "${GREEN}Installation complete!${NC}"
echo "--------------------------------------------------"
echo "Launching server..."
sudo symfony serve -d
echo -e "${GREEN}Server running at localhost!${NC}"
echo "--------------------------------------------------"
echo -e "${GREEN} CONFIGURATION COMPLETE!"



