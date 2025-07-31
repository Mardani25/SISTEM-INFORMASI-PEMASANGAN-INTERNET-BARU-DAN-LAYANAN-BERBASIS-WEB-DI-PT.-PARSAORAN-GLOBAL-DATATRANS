<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Notifications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- penting untuk mobile -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahan kecil agar teks tidak meluber */
        .notification-message {
            word-break: break-word;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="fs-4 text-center mb-4">All Notifications</h1>

        @if($notifications->count() > 0)
            <ul class="list-group">
                @foreach($notifications as $notif)
                    <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div class="notification-message">
                            <strong>{{ ucfirst($notif->type ?? 'Info') }}</strong> - {{ $notif->message }}<br>
                            <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                        </div>
                        @if($notif->status === 'belum dibaca')
                            <span class="badge bg-danger mt-2 mt-md-0 rounded-pill">Read</span>
                        @endif
                    </li>
                @endforeach
            </ul>

            <div class="mt-3">
                {{ $notifications->links() }}
            </div>
        @else
            <p class="text-center text-muted">No notifications found.</p>
        @endif
    </div>
</body>
</html>
