@extends ('layouts.master')
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
.login-input{
    height: 14%;
}

.forum-send-icon{
    align-self: center;
    padding: .3rem;
}
.forum-container{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 70%;
}  
.forum{
    margin: 0 auto;
    max-height: 70%;
    overflow-y: scroll;
    scrollbar-color: #DBD8E3 #fff;
    scrollbar-width: thin;
    box-shadow: 4px 4px 4px rgba(54, 52, 52, 0.185);
    background-color: #fff;
} 
.forum-top-bottom{
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

.form-post {
    border: 2px solid blue;
    font-size: .9rem;
    margin: .5rem;
    padding: .3rem;
    display: flex;
    flex-direction: row;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.24);
}

.forum-post-profile {
    border: 2px solid brown;
    width: 3rem; 
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
    border: 2px solid green;
    display: flex;
    flex-direction: column;
    font-size: .8rem;
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

.forum-post-text{

}
</style>
 <div class="forum-container">
     <div class="manage-status forum-top-bottom">Forum</div>
      <div class="form-container forum">
     
        <form action="#" class="add-committee-form" style="display: block;">
     
            <div class="forum-section">
                <div class="form-post">
                    <div class="forum-post-profile">
                        <img src="" alt="pic">
                    </div>
                    <div class="forum-post-data">
                        <div class="forum-post-info">
                            <div class="forum-sender-name">forum-sender-name</div>
                            <div class="forum-post-date">forum-post-date</div>
                        </div>
                        <div class="forum-post-text">The form post message!
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora quisquam, nam ratione deserunt nulla vel. Quibusdam, voluptatum numquam molestias minima porro autem aliquam libero recusandae accusantium veritatis odit. Reprehenderit, id.
                        </div>
                    </div>
                </div>
                <div class="form-post">
                    <div class="forum-post-profile">
                        <img src="" alt="pic">
                    </div>
                    <div class="forum-post-data">
                        <div class="forum-post-info">
                            <div class="forum-sender-name">forum-sender-name</div>
                            <div class="forum-post-date">forum-post-date</div>
                        </div>
                        <div class="forum-post-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nobis ipsum minus distinctio modi culpa aliquam velit dolore a quis? The form post message!</div>
                    </div>
                </div>
                <div class="form-post">
                    <div class="forum-post-profile">
                        <img src="" alt="pic">
                    </div>
                    <div class="forum-post-data">
                        <div class="forum-post-info">
                            <div class="forum-sender-name">forum-sender-name</div>
                            <div class="forum-post-date">forum-post-date</div>
                        </div>
                        <div class="forum-post-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur eligendi distinctio nam natus. Corporis a consequuntur temporibus inventore nesciunt ad voluptas quam dicta fuga explicabo? The form post message!</div>
                    </div>
                </div>
                <div class="form-post">
                    <div class="forum-post-profile">
                        <img src="" alt="pic">
                    </div>
                    <div class="forum-post-data">
                        <div class="forum-post-info">
                            <div class="forum-sender-name">forum-sender-name</div>
                            <div class="forum-post-date">forum-post-date</div>
                        </div>
                        <div class="forum-post-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur eligendi distinctio nam natus. Corporis a consequuntur temporibus inventore nesciunt ad voluptas quam dicta fuga explicabo? The form post message!</div>
                    </div>
                </div>
                <div class="form-post">
                    <div class="forum-post-profile">
                        <img src="" alt="pic">
                    </div>
                    <div class="forum-post-data">
                        <div class="forum-post-info">
                            <div class="forum-sender-name">forum-sender-name</div>
                            <div class="forum-post-date">forum-post-date</div>
                        </div>
                        <div class="forum-post-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur eligendi distinctio nam natus. Corporis a consequuntur temporibus inventore nesciunt ad voluptas quam dicta fuga explicabo? The form post message!</div>
                    </div>
                </div>
            </div>
        </form>
     </div>
     
     <div class="forum-top-bottom username login-input">
        <textarea class="login-input-field" placeholder="Type your message..." name="post_content" rows="2" cols="50"></textarea>
        <a class="forum-send-icon" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
        </a>
     </div>
 </div>
@endsection
@include('side-bars.advisor_side_bar')