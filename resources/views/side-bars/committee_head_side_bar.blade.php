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
                    <li class="inner-lists"><a class="side-bar-link" href="{{ route('committee_head.manage_advisor') }}">Manage Advisor's</a></li>
                    <li class="inner-lists"><a class="side-bar-link" href="{{ route('committee_head.manage_student') }}">Manage Student's</a></li>
                </ul>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{ route('committee_head.view_group') }}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                <span class="col">View Group</span>
            </a>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{ route('committee_head.manage_policy') }}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                <span class="col">Manage Policy</span>
            </a>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{ route('committee_head.manage_notice') }}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg"  width="85" height="85" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"/></svg>
                <span class="col">Manage Notice</span>
            </a>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{ route('committee_head.view_report') }}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                <span class="col">View Report</span>
            </a>  
           </li> 
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{ route('committee_head.evaluation_result') }}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 96c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320zM256 160c0 17.7-14.3 32-32 32l-96 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l96 0c17.7 0 32 14.3 32 32zm64 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l192 0zM192 352c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l32 0c17.7 0 32 14.3 32 32z"/></svg>
                <span class="col">Results</span>
            </a>  
           </li>
           <li class="side-bar-list">
            <a class="side-bar-link" href="{{ route('committee_head.edit_profile') }}">
                <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                <span class="col">Edit Profile</span>
            </a>  
           </li>       
        </ul>
    </section>

@endsection