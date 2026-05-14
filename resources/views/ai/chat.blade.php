@extends('layouts.app')

@section('content')
<div class="content-header">
  @include('components.alert')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><i class="fas fa-robot"></i> AI Assistant</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">AI Assistant</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-comments"></i> Chat with AI Assistant
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" id="clearChat">
                <i class="fas fa-trash"></i> Clear History
              </button>
            </div>
          </div>
          <div class="card-body" style="height: 500px; overflow-y: auto;" id="chatContainer">
            <div id="chatMessages">
              @if(count($history) > 0)
                @foreach($history as $msg)
                  @if($msg['role'] == 'user')
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">You</span>
                        <span class="direct-chat-timestamp float-left">{{ date('H:i') }}</span>
                      </div>
                      <img class="direct-chat-img" src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User">
                      <div class="direct-chat-text bg-primary">
                        {{ $msg['content'] }}
                      </div>
                    </div>
                  @else
                    <div class="direct-chat-msg">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">AI Assistant</span>
                        <span class="direct-chat-timestamp float-right">{{ date('H:i') }}</span>
                      </div>
                      <img class="direct-chat-img" src="{{ asset('dist/img/avatar5.png') }}" alt="AI">
                      <div class="direct-chat-text">
                        {!! nl2br(e($msg['content'])) !!}
                      </div>
                    </div>
                  @endif
                @endforeach
              @else
                <div class="text-center text-muted mt-5">
                  <i class="fas fa-robot fa-3x mb-3"></i>
                  <p>Halo! Saya AI Assistant untuk aplikasi SAP Anda.</p>
                  <p>Tanyakan apa saja tentang inventory, PO, invoice, atau cashflow Anda.</p>
                </div>
              @endif
            </div>
            <div id="typingIndicator" style="display: none;">
              <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-left">AI Assistant</span>
                </div>
                <img class="direct-chat-img" src="{{ asset('dist/img/avatar5.png') }}" alt="AI">
                <div class="direct-chat-text">
                  <i class="fas fa-circle-notch fa-spin"></i> Typing...
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-12 mb-2">
                <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn btn-outline-secondary suggestion-btn" data-text="Berapa total stock saat ini?">
                    <i class="fas fa-lightbulb"></i> Total Stock
                  </button>
                  <button type="button" class="btn btn-outline-secondary suggestion-btn" data-text="Bagaimana performa cashflow bulan ini?">
                    <i class="fas fa-lightbulb"></i> Cashflow
                  </button>
                  <button type="button" class="btn btn-outline-secondary suggestion-btn" data-text="Item apa saja yang stocknya hampir habis?">
                    <i class="fas fa-lightbulb"></i> Low Stock
                  </button>
                  <button type="button" class="btn btn-outline-secondary suggestion-btn" data-text="Berapa total invoice bulan ini?">
                    <i class="fas fa-lightbulb"></i> Invoice
                  </button>
                </div>
              </div>
            </div>
            <form id="chatForm">
              <div class="input-group">
                <input type="text" id="messageInput" class="form-control" placeholder="Type your message..." autocomplete="off" required>
                <span class="input-group-append">
                  <button type="submit" class="btn btn-primary" id="sendBtn">
                    <i class="fas fa-paper-plane"></i> Send
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    const chatContainer = $('#chatContainer');
    const chatMessages = $('#chatMessages');
    const messageInput = $('#messageInput');
    const chatForm = $('#chatForm');
    const typingIndicator = $('#typingIndicator');
    const sendBtn = $('#sendBtn');

    // Auto scroll to bottom
    function scrollToBottom() {
        chatContainer.scrollTop(chatContainer[0].scrollHeight);
    }

    scrollToBottom();

    // Send message
    chatForm.on('submit', function(e) {
        e.preventDefault();
        const message = messageInput.val().trim();

        if (!message) return;

        // Disable input
        messageInput.prop('disabled', true);
        sendBtn.prop('disabled', true);

        // Add user message to chat
        const userMsg = `
            <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">You</span>
                    <span class="direct-chat-timestamp float-left">${new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'})}</span>
                </div>
                <img class="direct-chat-img" src="{{ asset('dist/img/user2-160x160.jpg') }}" alt="User">
                <div class="direct-chat-text bg-primary">
                    ${escapeHtml(message)}
                </div>
            </div>
        `;
        chatMessages.append(userMsg);
        messageInput.val('');
        scrollToBottom();

        // Show typing indicator
        typingIndicator.show();
        scrollToBottom();

        // Send to server
        $.ajax({
            url: '{{ url("/ai/send") }}',
            method: 'POST',
            data: {
                message: message,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                typingIndicator.hide();

                if (response.success) {
                    const aiMsg = `
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">AI Assistant</span>
                                <span class="direct-chat-timestamp float-right">${new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'})}</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('dist/img/avatar5.png') }}" alt="AI">
                            <div class="direct-chat-text">
                                ${escapeHtml(response.message).replace(/\n/g, '<br>')}
                            </div>
                        </div>
                    `;
                    chatMessages.append(aiMsg);
                    scrollToBottom();
                } else {
                    alert('Error: ' + (response.error || 'Unknown error'));
                }
            },
            error: function(xhr) {
                typingIndicator.hide();
                const error = xhr.responseJSON?.error || 'Failed to send message. Please check your API key configuration.';
                alert('Error: ' + error);
            },
            complete: function() {
                messageInput.prop('disabled', false);
                sendBtn.prop('disabled', false);
                messageInput.focus();
            }
        });
    });

    // Suggestion buttons
    $('.suggestion-btn').on('click', function() {
        const text = $(this).data('text');
        messageInput.val(text);
        messageInput.focus();
    });

    // Clear chat
    $('#clearChat').on('click', function() {
        if (confirm('Are you sure you want to clear chat history?')) {
            $.ajax({
                url: '{{ url("/ai/clear") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });

    // Escape HTML
    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }

    // Focus on input
    messageInput.focus();
});
</script>
@endsection
