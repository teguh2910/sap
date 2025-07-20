# Docker Setup for SAP Laravel 12 Application

## Overview

This Docker configuration provides a production-ready, optimized setup for the SAP Laravel 12 application with the following features:

- **Multi-stage builds** for optimized image sizes
- **Security best practices** with non-root user and minimal attack surface
- **Performance optimizations** for PHP, Nginx, MySQL, and Redis
- **Development and production environments** with different configurations
- **Health checks** and monitoring
- **Horizontal scaling** support

## Architecture

```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   Nginx + PHP   │    │     MySQL 8.0   │    │   Redis 7.0     │
│   (Laravel 12)  │◄──►│   (Database)    │    │ (Cache/Session) │
│                 │    │                 │    │                 │
└─────────────────┘    └─────────────────┘    └─────────────────┘
```

## Quick Start

### Development Environment

```bash
# Clone and setup
git clone <repository>
cd sap

# Copy environment file
cp .env.example .env

# Build and start services
docker-compose up -d --build

# Access the application
open http://localhost:8000
```

### Production Environment

```bash
# Build production image
./docker/scripts/build.sh latest production

# Deploy to production
./docker/scripts/deploy.sh production
```

## Services

### Application (Laravel 12)
- **Image**: Custom PHP 8.3-FPM with Nginx
- **Port**: 8000
- **Features**: 
  - Multi-stage build for optimization
  - Non-root user for security
  - OPcache enabled
  - Supervisor for process management
  - Health checks

### Database (MySQL 8.0)
- **Port**: 3306 (3307 in development)
- **Features**:
  - Optimized configuration
  - Health checks
  - Persistent volumes
  - UTF8MB4 character set

### Cache (Redis 7.0)
- **Port**: 6379
- **Features**:
  - Session storage
  - Application cache
  - Queue backend
  - Optimized configuration

### Development Tools
- **PHPMyAdmin**: http://localhost:8080
- **Redis Commander**: http://localhost:8081
- **Mailhog**: http://localhost:8025

## Configuration Files

### Docker Structure
```
docker/
├── nginx/
│   ├── nginx.conf          # Main Nginx configuration
│   └── default.conf        # Laravel site configuration
├── php/
│   ├── php.ini            # PHP configuration
│   └── php-fpm.conf       # PHP-FPM pool configuration
├── supervisor/
│   └── supervisord.conf   # Process management
├── mysql/
│   └── my.cnf            # MySQL optimization
├── redis/
│   └── redis.conf        # Redis configuration
└── scripts/
    ├── build.sh          # Build script
    └── deploy.sh         # Deployment script
```

## Environment Variables

Create a `.env` file with the following variables:

```env
# Application
APP_KEY=base64:your-app-key-here
APP_ENV=production
APP_DEBUG=false

# Database
DB_DATABASE=sap
DB_USERNAME=sap_user
DB_PASSWORD=secure_password
DB_ROOT_PASSWORD=root_password

# Redis
REDIS_PASSWORD=redis_password

# Cache
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

## Commands

### Build Commands
```bash
# Build development image
./docker/scripts/build.sh latest development

# Build production image
./docker/scripts/build.sh latest production

# Build with custom tag
./docker/scripts/build.sh v1.0.0 production
```

### Deployment Commands
```bash
# Deploy development environment
./docker/scripts/deploy.sh development

# Deploy production environment
./docker/scripts/deploy.sh production
```

### Management Commands
```bash
# View logs
docker-compose logs -f

# Execute commands in container
docker-compose exec app php artisan migrate
docker-compose exec app php artisan queue:work

# Scale application
docker-compose up -d --scale app=3

# Stop services
docker-compose down

# Remove volumes (careful!)
docker-compose down -v
```

## Performance Optimizations

### PHP Optimizations
- OPcache enabled with production settings
- Realpath cache configured
- Memory limits optimized
- Process management tuned

### Nginx Optimizations
- Gzip compression enabled
- Static file caching
- Rate limiting configured
- Security headers added

### MySQL Optimizations
- InnoDB buffer pool sized appropriately
- Query cache disabled (MySQL 8.0)
- Connection limits configured
- Slow query logging enabled

### Redis Optimizations
- Memory management configured
- Persistence settings optimized
- Connection pooling enabled

## Security Features

### Container Security
- Non-root user execution
- Minimal base images (Alpine Linux)
- Security headers configured
- File permissions properly set

### Network Security
- Internal network isolation
- Rate limiting on endpoints
- HTTPS ready (certificates needed)

### Application Security
- Environment variables for secrets
- Database credentials secured
- Redis password protection

## Monitoring and Health Checks

### Health Endpoints
- Application: `GET /up`
- PHP-FPM: `GET /status`
- Nginx: Built-in monitoring

### Logging
- Application logs: `/var/log/supervisor/`
- Nginx logs: `/var/log/nginx/`
- PHP logs: `/var/log/php_errors.log`

## Troubleshooting

### Common Issues

1. **Permission Denied**
   ```bash
   docker-compose exec app chown -R www:www /var/www/html/storage
   ```

2. **Database Connection Failed**
   ```bash
   # Check if database is ready
   docker-compose exec db mysqladmin ping -h localhost
   ```

3. **Redis Connection Failed**
   ```bash
   # Check Redis status
   docker-compose exec redis redis-cli ping
   ```

### Debug Commands
```bash
# Check container status
docker-compose ps

# View container logs
docker-compose logs app
docker-compose logs db
docker-compose logs redis

# Execute shell in container
docker-compose exec app sh
```

## Production Deployment

### Prerequisites
- Docker Engine 20.10+
- Docker Compose 2.0+
- SSL certificates (for HTTPS)
- Domain name configured

### Steps
1. Configure environment variables
2. Set up SSL certificates
3. Configure domain DNS
4. Deploy using production compose file
5. Set up monitoring and backups

### Scaling
```bash
# Scale application containers
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d --scale app=3

# Use Docker Swarm for multi-node deployment
docker swarm init
docker stack deploy -c docker-compose.prod.yml sap-stack
```

## Backup and Recovery

### Database Backup
```bash
# Create backup
docker-compose exec db mysqldump -u root -p sap > backup.sql

# Restore backup
docker-compose exec -T db mysql -u root -p sap < backup.sql
```

### Volume Backup
```bash
# Backup volumes
docker run --rm -v sap_db_data:/data -v $(pwd):/backup alpine tar czf /backup/db_backup.tar.gz /data
```

## Support

For issues and questions:
1. Check the troubleshooting section
2. Review container logs
3. Verify environment configuration
4. Check Docker and system resources
