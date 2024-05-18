@php
    $postClass = $post->user->role == 'advisor' ? 'advisor-post' : 'student-post';
@endphp
<div class="forum-section">
    <div class="forum-post {{ $postClass }}">
        <div class="forum-post-profile">
            <img src="{{ asset('storage/' . $post->user->image) }}" alt="Profile Picture">
        </div>
        <div class="forum-post-data">
            <div class="forum-post-info">
                <div class="forum-sender-name">{{ $post->user->fullname }}</div>
                <div class="forum-post-date">{{ $post->created_at->format('M d, Y H:i') }}</div>
            </div>
            <div class="forum-post-text">{{ $post->content }}</div>
        </div>
    </div>
</div>
