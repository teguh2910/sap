<?php

namespace App\Services;

use App\gudang_satu;
use App\gudang_dua;
use App\po_supplier;
use App\po_customer;
use App\invoice;
use App\incoming_cash;
use App\out_cash;
use Illuminate\Support\Facades\DB;

class AIService
{
    protected $apiKey;
    protected $apiUrl;
    protected $provider;

    protected $model;

    public function __construct()
    {
        $this->provider = env('AI_PROVIDER', 'openai');

        if ($this->provider === 'openai') {
            $this->apiKey = env('OPENAI_API_KEY');
            $this->apiUrl = 'https://api.openai.com/v1/chat/completions';
            $this->model = env('OPENAI_MODEL', 'gpt-3.5-turbo');
        } elseif ($this->provider === 'anthropic') {
            $this->apiKey = env('ANTHROPIC_API_KEY');
            $this->apiUrl = 'https://api.anthropic.com/v1/messages';
            $this->model = env('ANTHROPIC_MODEL', 'claude-3-haiku-20240307');
        } elseif ($this->provider === 'openai_compatible') {
            $baseUrl = rtrim(env('OPENAI_COMPAT_BASE_URL', ''), '/');
            $this->apiKey = env('OPENAI_COMPAT_API_KEY');
            $this->apiUrl = $baseUrl . '/chat/completions';
            $this->model = env('OPENAI_COMPAT_MODEL', 'gpt-3.5-turbo');
        }
    }

    /**
     * Get business context data for AI
     */
    public function getBusinessContext()
    {
        $context = [];

        // Stock summary
        $stockG1 = gudang_satu::select(
            DB::raw('SUM(beginning_balance) as total_qty'),
            DB::raw('COUNT(DISTINCT part_no) as total_parts')
        )->first();

        $stockG2 = gudang_dua::select(
            DB::raw('SUM(beginning_balance) as total_qty'),
            DB::raw('COUNT(DISTINCT part_no) as total_parts')
        )->first();

        $context['stock'] = [
            'gudang_satu' => [
                'total_qty' => $stockG1->total_qty ?? 0,
                'total_parts' => $stockG1->total_parts ?? 0
            ],
            'gudang_dua' => [
                'total_qty' => $stockG2->total_qty ?? 0,
                'total_parts' => $stockG2->total_parts ?? 0
            ],
            'total' => ($stockG1->total_qty ?? 0) + ($stockG2->total_qty ?? 0)
        ];

        // PO Supplier summary with monthly breakdown
        $context['po_supplier'] = [
            'total' => po_supplier::count(),
            'this_month' => po_supplier::whereMonth('tgl_po', date('m'))
                ->whereYear('tgl_po', date('Y'))
                ->count(),
            'by_month' => po_supplier::selectRaw('MONTH(tgl_po) as month, YEAR(tgl_po) as year, COUNT(*) as count')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->limit(12)
                ->get()
                ->map(function($item) {
                    return [
                        'month' => $item->month,
                        'year' => $item->year,
                        'count' => $item->count
                    ];
                })
                ->toArray()
        ];

        // PO Customer summary with monthly breakdown
        $context['po_customer'] = [
            'total' => po_customer::count(),
            'this_month' => po_customer::whereMonth('tgl_po_customer', date('m'))
                ->whereYear('tgl_po_customer', date('Y'))
                ->count(),
            'by_month' => po_customer::selectRaw('MONTH(tgl_po_customer) as month, YEAR(tgl_po_customer) as year, COUNT(*) as count')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->limit(12)
                ->get()
                ->map(function($item) {
                    return [
                        'month' => $item->month,
                        'year' => $item->year,
                        'count' => $item->count
                    ];
                })
                ->toArray()
        ];

        // Invoice summary with monthly breakdown and current month details
        $currentMonth = date('m');
        $currentYear = date('Y');

        $context['invoice'] = [
            'total' => invoice::count(),
            'this_month' => invoice::whereMonth('tgl_invoice', $currentMonth)
                ->whereYear('tgl_invoice', $currentYear)
                ->count(),
            'by_month' => invoice::selectRaw('MONTH(tgl_invoice) as month, YEAR(tgl_invoice) as year, COUNT(*) as count')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->limit(12)
                ->get()
                ->map(function($item) {
                    return [
                        'month' => $item->month,
                        'year' => $item->year,
                        'count' => $item->count
                    ];
                })
                ->toArray(),
            'current_month_details' => invoice::whereMonth('tgl_invoice', $currentMonth)
                ->whereYear('tgl_invoice', $currentYear)
                ->select('no_invoice', 'tgl_invoice', 'no_fp')
                ->orderBy('tgl_invoice', 'desc')
                ->limit(20)
                ->get()
                ->map(function($item) {
                    return [
                        'no_invoice' => $item->no_invoice,
                        'tgl_invoice' => $item->tgl_invoice,
                        'no_fp' => $item->no_fp
                    ];
                })
                ->toArray()
        ];

        // Cash flow summary with monthly breakdown
        $context['cashflow'] = [
            'incoming_this_month' => incoming_cash::whereMonth('tgl_incoming_cash', date('m'))
                ->whereYear('tgl_incoming_cash', date('Y'))
                ->sum('amount_incoming'),
            'outgoing_this_month' => out_cash::whereMonth('tgl_out_cash', date('m'))
                ->whereYear('tgl_out_cash', date('Y'))
                ->sum('amount_out'),
            'incoming_by_month' => incoming_cash::selectRaw('MONTH(tgl_incoming_cash) as month, YEAR(tgl_incoming_cash) as year, SUM(amount_incoming) as total')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->limit(12)
                ->get()
                ->map(function($item) {
                    return [
                        'month' => $item->month,
                        'year' => $item->year,
                        'total' => $item->total
                    ];
                })
                ->toArray(),
            'outgoing_by_month' => out_cash::selectRaw('MONTH(tgl_out_cash) as month, YEAR(tgl_out_cash) as year, SUM(amount_out) as total')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->limit(12)
                ->get()
                ->map(function($item) {
                    return [
                        'month' => $item->month,
                        'year' => $item->year,
                        'total' => $item->total
                    ];
                })
                ->toArray()
        ];

        // Low stock items (beginning_balance < 100)
        $lowStock = gudang_satu::where('beginning_balance', '<', 100)
            ->select('part_no', 'beginning_balance as qty')
            ->limit(10)
            ->get();
        $context['low_stock_items'] = $lowStock->toArray();

        // Top 5 products by stock
        $topProducts = gudang_satu::orderBy('beginning_balance', 'desc')
            ->select('part_no', 'beginning_balance as qty')
            ->limit(5)
            ->get();
        $context['top_products'] = $topProducts->toArray();

        return $context;
    }

    /**
     * Send message to AI and get response
     */
    public function chat($userMessage, $conversationHistory = [])
    {
        $businessContext = $this->getBusinessContext();

        $systemPrompt = "Kamu adalah AI Assistant untuk aplikasi SAP (Sistem Administrasi Perusahaan).
Kamu membantu user menganalisis data bisnis seperti inventory, purchase order, invoice, dan cashflow.

Berikut adalah data bisnis terkini:
" . json_encode($businessContext, JSON_PRETTY_PRINT) . "

Berikan jawaban yang helpful, ringkas, dan actionable. Gunakan bahasa Indonesia.
Jika user bertanya tentang data yang tidak tersedia, jelaskan data apa saja yang bisa kamu akses.";

        if ($this->provider === 'openai' || $this->provider === 'openai_compatible') {
            return $this->chatOpenAI($systemPrompt, $userMessage, $conversationHistory);
        } elseif ($this->provider === 'anthropic') {
            return $this->chatAnthropic($systemPrompt, $userMessage, $conversationHistory);
        }

        return ['error' => 'AI provider not configured'];
    }

    /**
     * Chat using OpenAI API
     */
    protected function chatOpenAI($systemPrompt, $userMessage, $conversationHistory)
    {
        $messages = [
            ['role' => 'system', 'content' => $systemPrompt]
        ];

        // Add conversation history
        foreach ($conversationHistory as $msg) {
            $messages[] = $msg;
        }

        // Add current user message
        $messages[] = ['role' => 'user', 'content' => $userMessage];

        $data = [
            'model' => $this->model,
            'messages' => $messages,
            'max_tokens' => 1000,
            'temperature' => 0.7
        ];

        $response = $this->makeRequest($this->apiUrl, $data, [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'
        ]);

        // Log response for debugging
        \Log::info('AI API Response: ' . json_encode($response));

        if (isset($response['error'])) {
            return ['error' => $response['error']['message'] ?? 'Unknown error'];
        }

        // Try different response formats
        $message = '';
        if (isset($response['choices'][0]['message']['content'])) {
            $message = $response['choices'][0]['message']['content'];
        } elseif (isset($response['choices'][0]['text'])) {
            $message = $response['choices'][0]['text'];
        } elseif (isset($response['response'])) {
            $message = $response['response'];
        } elseif (isset($response['content'])) {
            $message = is_array($response['content']) ? $response['content'][0]['text'] : $response['content'];
        } elseif (isset($response['message'])) {
            $message = is_array($response['message']) ? $response['message']['content'] : $response['message'];
        }

        return [
            'message' => $message,
            'usage' => $response['usage'] ?? null
        ];
    }

    /**
     * Chat using Anthropic API
     */
    protected function chatAnthropic($systemPrompt, $userMessage, $conversationHistory)
    {
        $messages = [];

        // Add conversation history
        foreach ($conversationHistory as $msg) {
            $messages[] = [
                'role' => $msg['role'],
                'content' => $msg['content']
            ];
        }

        // Add current user message
        $messages[] = ['role' => 'user', 'content' => $userMessage];

        $data = [
            'model' => $this->model,
            'max_tokens' => 1000,
            'system' => $systemPrompt,
            'messages' => $messages
        ];

        $response = $this->makeRequest($this->apiUrl, $data, [
            'x-api-key: ' . $this->apiKey,
            'anthropic-version: 2023-06-01',
            'Content-Type: application/json'
        ]);

        if (isset($response['error'])) {
            return ['error' => $response['error']['message'] ?? 'Unknown error'];
        }

        return [
            'message' => $response['content'][0]['text'] ?? '',
            'usage' => $response['usage'] ?? null
        ];
    }

    /**
     * Make HTTP request to AI API
     */
    protected function makeRequest($url, $data, $headers)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        \Log::info("AI API Request: URL=$url, HTTP Code=$httpCode, Error=$error");

        if ($error) {
            return ['error' => ['message' => $error]];
        }

        if ($httpCode !== 200) {
            return ['error' => ['message' => "HTTP $httpCode: " . substr($response, 0, 200)]];
        }

        // Remove streaming markers like "data: [DONE]" at the end
        $response = preg_replace('/data:\s*\[DONE\]\s*$/', '', $response);
        $response = trim($response);

        $decoded = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            \Log::warning("AI API JSON decode error: " . json_last_error_msg() . ", Response: " . substr($response, 0, 500));
            return ['error' => ['message' => 'Invalid JSON response']];
        }

        return $decoded;
    }
}
