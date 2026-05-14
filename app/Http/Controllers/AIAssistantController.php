<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AIService;
use Illuminate\Support\Facades\Session;

class AIAssistantController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->middleware('auth');
        $this->aiService = $aiService;
    }

    /**
     * Display chat interface
     */
    public function index()
    {
        $history = Session::get('ai_chat_history', []);
        return view('ai.chat', compact('history'));
    }

    /**
     * Send message to AI
     */
    public function send(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|string|max:2000'
        ]);

        $userMessage = $request->input('message');
        $history = Session::get('ai_chat_history', []);

        // Limit history to last 10 messages to save tokens
        $recentHistory = array_slice($history, -10);

        $response = $this->aiService->chat($userMessage, $recentHistory);

        if (isset($response['error'])) {
            return response()->json([
                'success' => false,
                'error' => $response['error']
            ], 500);
        }

        // Save to session history
        $history[] = ['role' => 'user', 'content' => $userMessage];
        $history[] = ['role' => 'assistant', 'content' => $response['message']];
        Session::put('ai_chat_history', $history);

        return response()->json([
            'success' => true,
            'message' => $response['message']
        ]);
    }

    /**
     * Clear chat history
     */
    public function clear()
    {
        Session::forget('ai_chat_history');
        return response()->json(['success' => true]);
    }

    /**
     * Get suggested questions
     */
    public function suggestions()
    {
        $suggestions = [
            'Berapa total stock saat ini?',
            'Bagaimana performa cashflow bulan ini?',
            'Item apa saja yang stocknya hampir habis?',
            'Berapa total invoice bulan ini?',
            'Analisis kondisi PO supplier dan customer',
            'Apa rekomendasi untuk meningkatkan penjualan?'
        ];

        return response()->json($suggestions);
    }
}
