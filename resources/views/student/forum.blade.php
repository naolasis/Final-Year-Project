@extends('layouts.master')
@section('forum')
    <style>
        .content-container {
            overflow-y: hidden;
        }

        .add-committee-form {
            margin: 0;
            padding: 1px;
            border-radius: 0;
        }

        .login-input {
            height: 14%;
        }

        .forum-send-icon {
            align-self: center;
            padding: .3rem;
        }

        .forum-container {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 68%;
        }

        .forum {
            margin: 0 auto;
            max-height: 70%;
            overflow-y: scroll;
            scrollbar-color: #DBD8E3 #fff;
            scrollbar-width: thin;
            box-shadow: 4px 4px 4px rgba(54, 52, 52, 0.185);
            background-color: #fff;
        }

        .forum-top-bottom {
            width: 90%;
            margin: .8rem auto 0 auto;
            max-width: 700px;
            /* min-height: 10%; */
        }

        /* for forum section */
        .forum-section {
            width: 90%;
            margin: 0 auto;
            padding-bottom: 0.05rem;
        }

        .forum-post {
            background: #ECECEC;
            border-radius: 10px;
            font-size: .9rem;
            margin: .4rem .5rem 1rem .5rem;
            padding: .3rem;
            display: flex;
            flex-direction: row;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.24);
        }

        .forum-post-profile {
            min-width: 3rem;
            height: 3rem;
            margin-right: .5rem;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .forum-post-profile img {
            width: 100%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5px;
        }

        .forum-post-data {
            display: flex;
            flex-direction: column;
            font-size: .8rem;
            overflow: hidden;
        }

        .forum-post-info {
            display: flex;
            flex-direction: row;
            margin-bottom: .5rem;
        }

        .forum-sender-name {
            margin-right: .75rem;
            font-weight: bold;
        }

        .forum-post-text {}

        /* Background color for advisor posts */
        .advisor-post {
            background-color: #e0f7fa;
            /* Light cyan */
            border: 1px solid #00796b;
            /* Dark teal */
        }

        /* Background color for student posts */
        .student-post {
            background-color: #fff3e0;
            /* Light orange */
            border: 1px solid #ff9800;
            /* Dark orange */
        }
    </style>

    <div class="forum-container">
        <div class="manage-status forum-top-bottom">Forum</div>
        <div class="form-container forum" id="forum-posts">
            <div class="forum-section">
                @foreach ($posts as $post)
                    @php
                        $postClass = $post->user->role == 'advisor' ? 'advisor-post' : 'student-post';
                    @endphp
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
                @endforeach
            </div>
        </div>

        <form id="forum-post-form" method="POST" action="{{ route('forum.post', $group->id) }}">
            @csrf
            <div class="forum-top-bottom username login-input">
                <input type="text" name="content" class="login-input-field" placeholder="Type your message..." required>
                <button type="submit" class="forum-send-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>


    <!-- Include jQuery or use vanilla JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#forum-post-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                var content = $('input[name="content"]').val();
                var token = $('input[name="_token"]').val();
                var groupId = "{{ $group->id }}"; // Get the group ID from the blade template

                $.ajax({
                    url: "/forum/" + groupId + "/post", // Use the correct route
                    method: 'POST',
                    data: {
                        _token: token,
                        content: content
                    },
                    success: function(response) {
                        // Clear the input field
                        $('input[name="content"]').val('');
                        // Prepend the new post to the forum
                        $('#forum-posts').prepend(response.html);
                    },
                    error: function(response) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
@endsection
@include('side-bars.student_side_bar')
