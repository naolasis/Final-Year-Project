@extends ('layouts.master')
@section('content')
    @if(session('error'))
        <div class="invalid-credential mt-1">
            {{ session('error') }}
        </div>
    @endif
    <div class="notice-container">
        <div class="notice-icon">
        <svg xmlns="http://www.w3.org/2000/svg"  width="85" height="85" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"/></svg>
        </div>
        <div class="notice-content">
            <h5>NOTICES</h5>
            <h5>{{$noticeCount}}</h5>
            <div class="notice-button">
                <a class="notice-link" href="{{ route('student.view_notice') }}">
                    <h6>View</h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" viewBox="0 0 36 28" fill="none">
                        <path d="M10.5 4.625V12.75H22.482L18.3664 8.63359C18.1419 8.39727 18.0186 8.08258 18.0227 7.75663C18.0269 7.43068 18.1582 7.11925 18.3887 6.88875C18.6192 6.65824 18.9307 6.52691 19.2566 6.52273C19.5826 6.51856 19.8973 6.64188 20.1336 6.86641L26.3836 13.1164C26.6178 13.3508 26.7494 13.6686 26.7494 14C26.7494 14.3314 26.6178 14.6492 26.3836 14.8836L20.1336 21.1336C19.8973 21.3581 19.5826 21.4814 19.2566 21.4773C18.9307 21.4731 18.6192 21.3418 18.3887 21.1113C18.1582 20.8808 18.0269 20.5693 18.0227 20.2434C18.0186 19.9174 18.1419 19.6027 18.3664 19.3664L22.482 15.25H10.5V23.375C10.5012 24.5349 10.9626 25.647 11.7828 26.4672C12.603 27.2874 13.7151 27.7488 14.875 27.75H31.125C32.2849 27.7488 33.397 27.2874 34.2172 26.4672C35.0374 25.647 35.4988 24.5349 35.5 23.375V4.625C35.4988 3.46506 35.0374 2.35298 34.2172 1.53278C33.397 0.712576 32.2849 0.251241 31.125 0.25H14.875C13.7151 0.251241 12.603 0.712576 11.7828 1.53278C10.9626 2.35298 10.5012 3.46506 10.5 4.625ZM1.75 12.75C1.41848 12.75 1.10054 12.8817 0.866116 13.1161C0.631696 13.3505 0.5 13.6685 0.5 14C0.5 14.3315 0.631696 14.6495 0.866116 14.8839C1.10054 15.1183 1.41848 15.25 1.75 15.25H10.5V12.75H1.75Z" fill="black"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
@include('side-bars.student_side_bar')