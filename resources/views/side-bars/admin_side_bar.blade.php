@section('side-bar-content')
    <section class="side-bar-content">
        <ul>
           <li class="side-bar-list">
                <a class="side-bar-link" href="{{ route('admin_dashboard') }}">
                    <svg class="side-icon"  viewBox="0 0 1316 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M657.723077 0C294.071795 0 0 294.071795 0 657.723077 0 792.94359 40.697436 918.974359 111.589744 1024h1093.579487c69.579487-105.025641 111.589744-231.05641 111.589743-366.276923C1316.758974 294.071795 1021.374359 0 657.723077 0z m-64.328205 105.025641c43.323077-35.446154 106.338462-30.194872 143.097436 13.128205 35.446154 43.323077 30.194872 106.338462-13.128205 143.097436-43.323077 35.446154-106.338462 30.194872-143.097436-13.128205-35.446154-43.323077-30.194872-106.338462 13.128205-143.097436zM196.923077 758.810256c-56.451282 0-101.087179-45.948718-101.08718-101.087179s45.948718-101.087179 101.08718-101.08718 101.087179 45.948718 101.087179 101.08718-45.948718 101.087179-101.087179 101.087179z m195.610256-362.338461c-43.323077 35.446154-106.338462 30.194872-143.097436-13.128205-35.446154-43.323077-30.194872-106.338462 13.128206-143.097436 43.323077-35.446154 106.338462-30.194872 143.097435 13.128205 35.446154 43.323077 30.194872 107.651282-13.128205 143.097436z m420.102564 7.876923l-66.953846 279.630769c31.507692 26.25641 51.2 65.641026 51.2 110.276923 0 78.769231-64.328205 143.097436-143.097436 143.097436s-143.097436-64.328205-143.097436-143.097436c0-69.579487 49.887179-128.65641 116.841026-140.471795l65.641026-277.005128c6.564103-30.194872 38.071795-48.574359 68.266666-42.010256l9.189744 2.625641c30.194872 6.564103 48.574359 36.758974 42.010256 66.953846z m99.774359-19.692308c-35.446154-43.323077-30.194872-106.338462 13.128206-143.097436 43.323077-35.446154 106.338462-30.194872 143.097435 13.128205 35.446154 43.323077 30.194872 106.338462-13.128205 143.097436-43.323077 35.446154-107.651282 30.194872-143.097436-13.128205z m207.425641 374.153846c-56.451282 0-101.087179-45.948718-101.087179-101.087179s45.948718-101.087179 101.087179-101.08718 101.087179 45.948718 101.08718 101.08718-44.635897 101.087179-101.08718 101.087179z"  /></svg>
                    <span class="col">Dashboard</span>
                </a>  
           </li>     
           <li class="side-bar-list">
                <a class="side-bar-link" href="#">
                    <svg class="side-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7H336c-8.8 0-16-7.2-16-16V118.6c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160c0 19.1 3.4 37.5 9.5 54.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c17 6.2 35.4 9.5 54.5 9.5zM80 408a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                    <span class="col">Manage System</span>
                    <svg class="side-icon left-angle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                </a>
                <ul class="inner-list">
                    <li class="inner-lists"><a class="side-bar-link" href="{{ route('manage_committee') }}">Manage Committee</a></li>
                </ul>   
           </li>    
        </ul>
    </section>

@endsection