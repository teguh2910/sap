#!/bin/bash

# Docker build script for SAP Laravel 12 application
set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Configuration
IMAGE_NAME="sap-laravel"
TAG=${1:-"latest"}
ENVIRONMENT=${2:-"production"}

echo -e "${GREEN}Building SAP Laravel 12 Docker image...${NC}"
echo -e "Image: ${IMAGE_NAME}:${TAG}"
echo -e "Environment: ${ENVIRONMENT}"
echo ""

# Build the image
if [ "$ENVIRONMENT" = "development" ]; then
    echo -e "${YELLOW}Building development image...${NC}"
    docker build \
        --target builder \
        --build-arg APP_ENV=local \
        --tag ${IMAGE_NAME}:${TAG}-dev \
        --file Dockerfile \
        .
    
    echo -e "${GREEN}Development image built successfully!${NC}"
    echo -e "Image: ${IMAGE_NAME}:${TAG}-dev"
else
    echo -e "${YELLOW}Building production image...${NC}"
    docker build \
        --target production \
        --build-arg APP_ENV=production \
        --tag ${IMAGE_NAME}:${TAG} \
        --file Dockerfile \
        .
    
    echo -e "${GREEN}Production image built successfully!${NC}"
    echo -e "Image: ${IMAGE_NAME}:${TAG}"
fi

# Show image size
echo ""
echo -e "${GREEN}Image information:${NC}"
if [ "$ENVIRONMENT" = "development" ]; then
    docker images ${IMAGE_NAME}:${TAG}-dev
else
    docker images ${IMAGE_NAME}:${TAG}
fi

echo ""
echo -e "${GREEN}Build completed successfully!${NC}"

# Optional: Run security scan
if command -v trivy &> /dev/null; then
    echo ""
    echo -e "${YELLOW}Running security scan...${NC}"
    if [ "$ENVIRONMENT" = "development" ]; then
        trivy image ${IMAGE_NAME}:${TAG}-dev
    else
        trivy image ${IMAGE_NAME}:${TAG}
    fi
fi
