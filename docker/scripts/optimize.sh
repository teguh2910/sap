#!/bin/bash

# Docker optimization script for SAP Laravel 12 application
set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${GREEN}Optimizing SAP Laravel 12 Docker setup...${NC}"
echo ""

# Function to check if command exists
command_exists() {
    command -v "$1" >/dev/null 2>&1
}

# Clean up unused Docker resources
echo -e "${BLUE}Cleaning up unused Docker resources...${NC}"
docker system prune -f
docker volume prune -f
docker network prune -f

# Optimize Docker images
echo -e "${BLUE}Optimizing Docker images...${NC}"
if command_exists dive; then
    echo "Analyzing image layers with dive..."
    dive sap-laravel:latest
else
    echo "Install 'dive' for detailed image analysis: https://github.com/wagoodman/dive"
fi

# Security scan
if command_exists trivy; then
    echo -e "${BLUE}Running security scan...${NC}"
    trivy image sap-laravel:latest
else
    echo -e "${YELLOW}Install 'trivy' for security scanning: https://github.com/aquasecurity/trivy${NC}"
fi

# Performance recommendations
echo ""
echo -e "${GREEN}Performance Recommendations:${NC}"
echo ""

# Check Docker daemon configuration
echo -e "${BLUE}Docker Daemon Configuration:${NC}"
echo "1. Ensure Docker has sufficient resources allocated"
echo "2. Enable BuildKit for faster builds: export DOCKER_BUILDKIT=1"
echo "3. Use Docker layer caching in CI/CD"
echo ""

# Check system resources
echo -e "${BLUE}System Resources:${NC}"
echo "Available memory: $(free -h | awk '/^Mem:/ {print $7}')"
echo "Available disk space: $(df -h / | awk 'NR==2 {print $4}')"
echo ""

# Database optimization
echo -e "${BLUE}Database Optimization:${NC}"
echo "1. Monitor MySQL slow query log"
echo "2. Optimize database queries in Laravel"
echo "3. Consider read replicas for high traffic"
echo ""

# Redis optimization
echo -e "${BLUE}Redis Optimization:${NC}"
echo "1. Monitor Redis memory usage"
echo "2. Configure appropriate eviction policies"
echo "3. Use Redis clustering for high availability"
echo ""

# Application optimization
echo -e "${BLUE}Application Optimization:${NC}"
echo "1. Enable OPcache in production"
echo "2. Use Laravel's built-in caching"
echo "3. Optimize Composer autoloader"
echo "4. Use CDN for static assets"
echo ""

# Monitoring recommendations
echo -e "${BLUE}Monitoring Setup:${NC}"
echo "1. Set up application performance monitoring (APM)"
echo "2. Monitor container metrics with Prometheus"
echo "3. Set up log aggregation with ELK stack"
echo "4. Configure health checks and alerts"
echo ""

# Security recommendations
echo -e "${BLUE}Security Recommendations:${NC}"
echo "1. Regularly update base images"
echo "2. Scan images for vulnerabilities"
echo "3. Use secrets management for sensitive data"
echo "4. Enable Docker Content Trust"
echo "5. Run containers as non-root users"
echo ""

# Backup recommendations
echo -e "${BLUE}Backup Strategy:${NC}"
echo "1. Automate database backups"
echo "2. Backup Docker volumes"
echo "3. Test backup restoration procedures"
echo "4. Store backups in multiple locations"
echo ""

echo -e "${GREEN}Optimization analysis completed!${NC}"
echo ""
echo -e "${YELLOW}Next steps:${NC}"
echo "1. Review the recommendations above"
echo "2. Implement monitoring and alerting"
echo "3. Set up automated backups"
echo "4. Configure CI/CD pipeline"
echo "5. Plan for scaling and high availability"
