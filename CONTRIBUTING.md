# Contributing to SAP Enterprise Resource Planning System

Thank you for your interest in contributing to the SAP ERP System! This document provides guidelines and information for contributors.

## 📋 Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [Development Workflow](#development-workflow)
- [Coding Standards](#coding-standards)
- [Testing Guidelines](#testing-guidelines)
- [Documentation](#documentation)
- [Pull Request Process](#pull-request-process)
- [Issue Reporting](#issue-reporting)
- [Security Vulnerabilities](#security-vulnerabilities)

## 🤝 Code of Conduct

This project adheres to a code of conduct that we expect all contributors to follow. Please read and follow our [Code of Conduct](CODE_OF_CONDUCT.md).

## 🚀 Getting Started

### Prerequisites

- PHP 8.3+
- Composer 2.0+
- Node.js 18.0+
- Docker & Docker Compose
- Git

### Development Setup

1. **Fork and Clone**
   ```bash
   git clone https://github.com/your-username/sap-laravel.git
   cd sap-laravel
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   # Using Docker
   docker-compose up -d db redis
   
   # Run migrations
   php artisan migrate --seed
   ```

5. **Start Development Server**
   ```bash
   php artisan serve &
   npm run dev
   ```

## 🔄 Development Workflow

### Branch Naming Convention

- `feature/feature-name` - New features
- `bugfix/bug-description` - Bug fixes
- `hotfix/critical-fix` - Critical production fixes
- `docs/documentation-update` - Documentation updates
- `refactor/component-name` - Code refactoring

### Commit Message Format

We follow the [Conventional Commits](https://www.conventionalcommits.org/) specification:

```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

**Types:**
- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, etc.)
- `refactor`: Code refactoring
- `test`: Adding or updating tests
- `chore`: Maintenance tasks

**Examples:**
```bash
feat(inventory): add real-time stock tracking
fix(auth): resolve login session timeout issue
docs(api): update authentication documentation
test(financial): add unit tests for transaction processing
```

### Development Process

1. **Create Feature Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. **Make Changes**
   - Write clean, well-documented code
   - Follow coding standards
   - Add appropriate tests

3. **Test Your Changes**
   ```bash
   # Run tests
   php artisan test
   
   # Check code style
   ./vendor/bin/pint
   
   # Static analysis
   ./vendor/bin/phpstan analyse
   ```

4. **Commit Changes**
   ```bash
   git add .
   git commit -m "feat(module): add new feature"
   ```

5. **Push and Create PR**
   ```bash
   git push origin feature/your-feature-name
   ```

## 📝 Coding Standards

### PHP Standards

We follow PSR-12 coding standards and Laravel best practices:

#### Code Style
```php
<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {}

    public function createUser(array $data): User
    {
        return $this->userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
```

#### Naming Conventions
- **Classes**: PascalCase (`UserService`, `BankController`)
- **Methods**: camelCase (`createUser`, `getUserById`)
- **Variables**: camelCase (`$userData`, `$bankAccount`)
- **Constants**: UPPER_SNAKE_CASE (`MAX_RETRY_ATTEMPTS`)
- **Database Tables**: snake_case (`user_profiles`, `bank_accounts`)

#### Documentation
```php
/**
 * Create a new user account with the provided data.
 *
 * @param array $data User registration data
 * @return User The created user instance
 * @throws ValidationException When data is invalid
 */
public function createUser(array $data): User
{
    // Implementation
}
```

### Frontend Standards

#### Vue.js Components
```vue
<template>
  <div class="user-profile">
    <h1 class="text-2xl font-bold">{{ user.name }}</h1>
    <p class="text-gray-600">{{ user.email }}</p>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
  user: {
    type: Object,
    required: true
  }
})

const isActive = computed(() => props.user.status === 'active')
</script>
```

#### CSS/Tailwind
- Use Tailwind CSS utility classes
- Follow mobile-first responsive design
- Maintain consistent spacing and typography

### Database Standards

#### Migrations
```php
public function up(): void
{
    Schema::create('bank_accounts', function (Blueprint $table) {
        $table->id('id_bank');
        $table->string('kode_bank')->unique();
        $table->string('nama_bank');
        $table->text('alamat_bank')->nullable();
        $table->string('no_rek_bank');
        $table->string('currency_bank', 10)->default('IDR');
        $table->timestamps();
        
        $table->index(['kode_bank', 'currency_bank']);
    });
}
```

#### Models
```php
class Bank extends Model
{
    protected $table = 'banks';
    protected $primaryKey = 'id_bank';
    
    protected $fillable = [
        'kode_bank',
        'nama_bank',
        'alamat_bank',
        'no_rek_bank',
        'currency_bank',
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
```

## 🧪 Testing Guidelines

### Test Structure

```php
<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Bank;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BankManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_bank_account(): void
    {
        // Arrange
        $user = User::factory()->create();
        $bankData = [
            'kode_bank' => 'BCA001',
            'nama_bank' => 'Bank Central Asia',
            'no_rek_bank' => '1234567890',
            'currency_bank' => 'IDR',
        ];

        // Act
        $response = $this->actingAs($user)
            ->postJson('/api/v1/banks', $bankData);

        // Assert
        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'id_bank',
                    'kode_bank',
                    'nama_bank',
                ],
            ]);

        $this->assertDatabaseHas('banks', [
            'kode_bank' => 'BCA001',
            'nama_bank' => 'Bank Central Asia',
        ]);
    }
}
```

### Testing Requirements

- **Unit Tests**: Test individual methods and classes
- **Feature Tests**: Test complete user workflows
- **Integration Tests**: Test component interactions
- **API Tests**: Test all API endpoints
- **Browser Tests**: Test critical user journeys

### Test Commands

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/BankManagementTest.php

# Run with coverage
php artisan test --coverage

# Run parallel tests
php artisan test --parallel
```

## 📚 Documentation

### Code Documentation

- Document all public methods and classes
- Use PHPDoc standards for PHP code
- Include examples for complex functionality
- Document API endpoints with OpenAPI/Swagger

### README Updates

When adding new features:
- Update feature lists
- Add configuration instructions
- Include usage examples
- Update system requirements if needed

## 🔍 Pull Request Process

### Before Submitting

1. **Code Quality Checks**
   ```bash
   # Format code
   ./vendor/bin/pint
   
   # Static analysis
   ./vendor/bin/phpstan analyse
   
   # Run tests
   php artisan test
   ```

2. **Documentation**
   - Update relevant documentation
   - Add/update API documentation
   - Include code comments

3. **Testing**
   - Add tests for new functionality
   - Ensure all tests pass
   - Test manually in browser

### PR Template

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Breaking change
- [ ] Documentation update

## Testing
- [ ] Unit tests added/updated
- [ ] Feature tests added/updated
- [ ] Manual testing completed

## Checklist
- [ ] Code follows style guidelines
- [ ] Self-review completed
- [ ] Documentation updated
- [ ] Tests pass
```

### Review Process

1. **Automated Checks**: CI/CD pipeline runs tests and quality checks
2. **Code Review**: At least one maintainer reviews the code
3. **Testing**: Changes are tested in staging environment
4. **Approval**: PR is approved and merged

## 🐛 Issue Reporting

### Bug Reports

Use the bug report template:

```markdown
**Bug Description**
Clear description of the bug

**Steps to Reproduce**
1. Go to '...'
2. Click on '...'
3. See error

**Expected Behavior**
What should happen

**Screenshots**
If applicable, add screenshots

**Environment**
- OS: [e.g., Ubuntu 20.04]
- Browser: [e.g., Chrome 91]
- Version: [e.g., 1.2.3]
```

### Feature Requests

```markdown
**Feature Description**
Clear description of the feature

**Use Case**
Why is this feature needed?

**Proposed Solution**
How should this be implemented?

**Alternatives**
Alternative solutions considered
```

## 🔒 Security Vulnerabilities

**Do not report security vulnerabilities through public GitHub issues.**

Instead, please email security@sap-system.com with:
- Description of the vulnerability
- Steps to reproduce
- Potential impact
- Suggested fix (if any)

We will respond within 48 hours and work with you to resolve the issue.

## 🏆 Recognition

Contributors will be recognized in:
- CONTRIBUTORS.md file
- Release notes
- Project documentation

Thank you for contributing to the SAP ERP System! 🎉
