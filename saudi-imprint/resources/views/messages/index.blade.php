<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .back-btn {
            color: #00a86b;
            display: flex;
            align-items: center;
            margin-bottom: 3%;
            gap: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('home') }}" class="back-btn">&larr; Go Back</a>
                <h2>My Messages</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if($conversations->count() > 0)
                    <div class="list-group">
                        @foreach($conversations as $conversation)
                            <a href="{{ route('messages.show', $conversation['user']) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $conversation['user']->name }}</h5>
                                    <p class="mb-1 text-muted">
                                        {{ Str::limit($conversation['last_message']->content, 50) }}
                                        @if($conversation['last_message']->tour_id)
                                            <small class="text-info">
                                                [Tour: {{ $conversation['last_message']->tour->title ?? 'Unknown' }}]
                                            </small>
                                        @endif
                                    </p>
                                    <small>{{ $conversation['last_message']->created_at->diffForHumans() }}</small>
                                </div>

                                @if($conversation['unread_count'] > 0)
                                    <span class="badge bg-primary rounded-pill">
                                        {{ $conversation['unread_count'] }}
                                    </span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        You don't have any messages yet.
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
