@section('side-bar-content')
    <section class="side-bar-content">
        <ul>
           <li class="side-bar-list">
                <a class="side-bar-link" href="{{ route('committee_head') }}">
                    <svg class="side-icon"  viewBox="0 0 1316 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M657.723077 0C294.071795 0 0 294.071795 0 657.723077 0 792.94359 40.697436 918.974359 111.589744 1024h1093.579487c69.579487-105.025641 111.589744-231.05641 111.589743-366.276923C1316.758974 294.071795 1021.374359 0 657.723077 0z m-64.328205 105.025641c43.323077-35.446154 106.338462-30.194872 143.097436 13.128205 35.446154 43.323077 30.194872 106.338462-13.128205 143.097436-43.323077 35.446154-106.338462 30.194872-143.097436-13.128205-35.446154-43.323077-30.194872-106.338462 13.128205-143.097436zM196.923077 758.810256c-56.451282 0-101.087179-45.948718-101.08718-101.087179s45.948718-101.087179 101.08718-101.08718 101.087179 45.948718 101.087179 101.08718-45.948718 101.087179-101.087179 101.087179z m195.610256-362.338461c-43.323077 35.446154-106.338462 30.194872-143.097436-13.128205-35.446154-43.323077-30.194872-106.338462 13.128206-143.097436 43.323077-35.446154 106.338462-30.194872 143.097435 13.128205 35.446154 43.323077 30.194872 107.651282-13.128205 143.097436z m420.102564 7.876923l-66.953846 279.630769c31.507692 26.25641 51.2 65.641026 51.2 110.276923 0 78.769231-64.328205 143.097436-143.097436 143.097436s-143.097436-64.328205-143.097436-143.097436c0-69.579487 49.887179-128.65641 116.841026-140.471795l65.641026-277.005128c6.564103-30.194872 38.071795-48.574359 68.266666-42.010256l9.189744 2.625641c30.194872 6.564103 48.574359 36.758974 42.010256 66.953846z m99.774359-19.692308c-35.446154-43.323077-30.194872-106.338462 13.128206-143.097436 43.323077-35.446154 106.338462-30.194872 143.097435 13.128205 35.446154 43.323077 30.194872 106.338462-13.128205 143.097436-43.323077 35.446154-107.651282 30.194872-143.097436-13.128205z m207.425641 374.153846c-56.451282 0-101.087179-45.948718-101.087179-101.087179s45.948718-101.087179 101.087179-101.08718 101.087179 45.948718 101.08718 101.08718-44.635897 101.087179-101.08718 101.087179z"  /></svg>
                    <span class="col">Dashboard</span>
                </a>  
           </li>     
           <li class="side-bar-list">
                <a class="side-bar-link" href="#">
                    <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    <span class="col">Manage User's</span>
                    <svg class="side-icon left-angle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>  
                </a>
                <ul class="inner-list">
                    <li class="inner-lists"><a class="side-bar-link" href="{{-- {{ route('manage_advisor.index') }} --}}">Manage Advisor's</a></li>
                    <li class="inner-lists"><a class="side-bar-link" href="{{-- {{ route('manage_student.index') }} --}}">Manage Student's</a></li>
                </ul>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{-- {{ route('committee_head_dashboard') }} --}}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                <span class="col">View Group</span>
            </a>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{-- {{ route('committee_head_dashboard') }} --}}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                <span class="col">Make Policy</span>
            </a>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{-- {{ route('committee_head_dashboard') }} --}}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
                <span class="col">Send Notice</span>
            </a>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{-- {{ route('committee_head_dashboard') }} --}}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                <span class="col">View Report</span>
            </a>  
           </li> 
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{-- {{ route('committee_head_dashboard') }} --}}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/></svg>
                <span class="col">Upload Result</span>
            </a>  
           </li>        
        </ul>
    </section>

@endsection