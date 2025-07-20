#!/bin/bash

# Docker deployment script for SAP Laravel 12 application
set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Configuration
ENVIRONMENT=${1:-"development"}
COMPOSE_FILE="docker-compose.yml"

echo -e "${GREEN}Deploying SAP Laravel 12 application...${NC}"
echo -e "Environment: ${ENVIRONMENT}"
echo ""

# Set compose file based on environment
case $ENVIRONMENT in
    "production")
        COMPOSE_FILE="docker-compose.yml -f docker-compose.prod.yml"
        ;;
    "development")
        COMPOSE_FILE="docker-compose.yml -f docker-compose.override.yml"
        ;;
    *)
        echo -e "${RED}Invalid environment: ${ENVIRONMENT}${NC}"
        echo "Valid environments: development, production"
        exit 1
        ;;
esac

# Check if .env file exists
if [ ! -f .env ]; then
    echo -e "${YELLOW}Creating .env file from .env.example...${NC}"
    cp .env.example .env
    echo -e "${RED}Please update the .env file with your configuration before continuing.${NC}"
    exit 1
fi

# Pull latest images
echo -e "${BLUE}Pulling latest images...${NC}"
docker-compose -f ${COMPOSE_FILE} pull

# Build and start services
echo -e "${BLUE}Building and starting services...${NC}"
docker-compose -f ${COMPOSE_FILE} up -d --build

# Wait for services to be ready
echo -e "${BLUE}Waiting for services to be ready...${NC}"
sleep 30

# Run Laravel setup commands
echo -e "${BLUE}Running Laravel setup commands...${NC}"
docker-compose -f ${COMPOSE_FILE} exec app php artisan key:generate --force
docker-compose -f ${COMPOSE_FILE} exec app php artisan migrate --force

if [ "$ENVIRONMENT" = "development" ]; then
    docker-compose -f ${COMPOSE_FILE} exec app php artisan db:seed --force
fi

# Clear and cache configurations
docker-compose -f ${COMPOSE_FILE} exec app php artisan config:cache
docker-compose -f ${COMPOSE_FILE} exec app php artisan route:cache
docker-compose -f ${COMPOSE_FILE} exec app php artisan view:cache

# Show running services
echo ""
echo -e "${GREEN}Deployment completed successfully!${NC}"
echo ""
echo -e "${BLUE}Running services:${NC}"
docker-compose -f ${COMPOSE_FILE} ps

echo ""
echo -e "${GREEN}Application URLs:${NC}"
echo -e "Application: http://localhost:8000"
if [ "$ENVIRONMENT" = "development" ]; then
    echo -e "PHPMyAdmin: http://localhost:8080"
    echo -e "Redis Commander: http://localhost:8081"
    echo -e "Mailhog: http://localhost:8025"
fi

echo ""
echo -e "${YELLOW}Useful commands:${NC}"
echo -e "View logs: docker-compose -f ${COMPOSE_FILE} logs -f"
echo -e "Stop services: docker-compose -f ${COMPOSE_FILE} down"
echo -e "Restart services: docker-compose -f ${COMPOSE_FILE} restart"
