# AI Assistant Feature Setup Guide

## Overview
AI Assistant adalah fitur chatbot yang terintegrasi dengan aplikasi SAP Anda untuk menganalisis data bisnis seperti inventory, purchase order, invoice, dan cashflow.

## Fitur
1. **Chat Interface** - Interface chat yang user-friendly
2. **Analisis Data Real-time** - AI dapat mengakses data bisnis terkini
3. **Suggested Questions** - Pertanyaan saran untuk memulai percakapan
4. **Chat History** - Menyimpan history percakapan dalam session
5. **Multi-provider Support** - Mendukung OpenAI dan Anthropic API

## Setup Instructions

### 1. Konfigurasi Environment
Edit file `.env` dan tambahkan konfigurasi berikut:

```env
# Pilih satu provider: openai atau anthropic
AI_PROVIDER=openai

# Untuk OpenAI
OPENAI_API_KEY=your-openai-api-key-here
OPENAI_MODEL=gpt-3.5-turbo  # atau gpt-4, gpt-4-turbo

# Untuk Anthropic
ANTHROPIC_API_KEY=your-anthropic-api-key-here
ANTHROPIC_MODEL=claude-3-haiku-20240307  # atau claude-3-sonnet, claude-3-opus
```

### 2. Mendapatkan API Key

#### OpenAI
1. Kunjungi https://platform.openai.com/api-keys
2. Buat API key baru
3. Copy key ke `OPENAI_API_KEY` di `.env`

#### Anthropic
1. Kunjungi https://console.anthropic.com/
2. Buat API key baru
3. Copy key ke `ANTHROPIC_API_KEY` di `.env`

### 3. File yang Telah Ditambahkan

```
app/
├── Services/
│   └── AIService.php          # Service untuk integrasi AI API
├── Http/Controllers/
│   └── AIAssistantController.php  # Controller untuk chat

resources/views/
└── ai/
    └── chat.blade.php         # View untuk chat interface

routes/web.php                 # Route baru untuk AI
resources/views/layouts/sidebar.blade.php  # Menu AI di sidebar
```

### 4. Cara Menggunakan

1. Login ke aplikasi SAP
2. Klik menu "AI Assistant" di sidebar
3. Mulai chat dengan AI
4. Gunakan suggested questions untuk pertanyaan cepat

### 5. Contoh Pertanyaan

- "Berapa total stock saat ini?"
- "Bagaimana performa cashflow bulan ini?"
- "Item apa saja yang stocknya hampir habis?"
- "Berapa total invoice bulan ini?"
- "Analisis kondisi PO supplier dan customer"
- "Apa rekomendasi untuk meningkatkan penjualan?"

### 6. Troubleshooting

#### Error: "Failed to send message. Please check your API key configuration."
- Pastikan API key sudah benar di `.env`
- Pastikan provider yang dipilih sesuai (openai/anthropic)
- Cek koneksi internet

#### Error: "API key not found"
- Restart aplikasi Laravel setelah mengubah `.env`
- Jalankan `php artisan config:clear`

#### Chat tidak responsif
- Cek console browser untuk error JavaScript
- Pastikan jQuery sudah terload

### 7. Customization

#### Mengubah Model AI
Edit `.env`:
```env
# Untuk OpenAI
OPENAI_MODEL=gpt-4-turbo

# Untuk Anthropic
ANTHROPIC_MODEL=claude-3-sonnet-20240229
```

#### Menambahkan Data Context
Edit `app/Services/AIService.php` method `getBusinessContext()` untuk menambahkan data tambahan.

#### Mengubah UI
Edit `resources/views/ai/chat.blade.php` untuk mengubah tampilan chat.

### 8. Security Considerations

1. **API Key Protection** - Jangan commit `.env` ke repository
2. **Rate Limiting** - Pertimbangkan untuk menambahkan rate limiting
3. **Data Access** - AI hanya mengakses data yang diperlukan untuk analisis
4. **Session Storage** - Chat history disimpan di session, tidak di database

### 9. Biaya

#### OpenAI
- GPT-3.5 Turbo: ~$0.50 per 1M tokens
- GPT-4: ~$5-30 per 1M tokens tergantung model

#### Anthropic
- Claude 3 Haiku: ~$0.25 per 1M tokens input, $1.25 per 1M tokens output
- Claude 3 Sonnet: ~$3 per 1M tokens input, $15 per 1M tokens output

### 10. Support

Untuk masalah teknis, hubungi developer atau buka issue di repository.

---

**Note:** Fitur ini memerlukan koneksi internet untuk mengakses API AI. Pastikan server memiliki akses ke internet.
