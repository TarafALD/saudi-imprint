<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Conversation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .card {
      border: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .message-out {
      background-color: #d1e7dd;
      color: #0f5132;
    }

    .message-in {
      background-color: #ffffff;
      color: #212529;
    }

    .message-time {
      font-size: 0.8rem;
    }

    .back-btn {
      color: #198754;
      font-weight: 500;
      text-decoration: none;
    }

    .back-btn:hover {
      text-decoration: underline;
    }

    .btn-primary {
      background-color: #198754;
      border-color: #198754;
    }

    .btn-primary:hover {
      background-color: #157347;
      border-color: #157347;
    }

    .form-select, .form-control {
      border-radius: 0.375rem;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row mb-3">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <a href="{{ route('messages.index') }}" class="back-btn">&larr; Back to Messages</a>
        <h2 class="text-success">Conversation with {{ $otherUser->name }}</h2>
      </div>
      <hr>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body" id="messageContainer" style="height: 500px; overflow-y: auto;">
            @foreach($messages as $message)
              <div class="mb-3 d-flex {{ $message->sender_id == auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                <div class="card {{ $message->sender_id == auth()->id() ? 'message-out' : 'message-in' }}" style="max-width: 70%;">
                  <div class="card-body py-2 px-3">
                    <p class="mb-1">{{ $message->content }}</p>
                    <div class="d-flex justify-content-end">
                      <small class="message-time {{ $message->sender_id == auth()->id() ? 'text-success' : 'text-muted' }}">
                        {{ $message->created_at->format('M d, g:i a') }}
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="card-footer">
            <form action="{{ route('messages.store') }}" method="POST">
              @csrf
              <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">
                <div class="input-group">
                <textarea name="content" class="form-control" placeholder="Type your message here..." required></textarea>
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const messageContainer = document.getElementById('messageContainer');
      messageContainer.scrollTop = messageContainer.scrollHeight;
    });
  </script>
</body>
</html>
