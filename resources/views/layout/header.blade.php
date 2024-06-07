<nav>
    <ul class="sidebar">
            <li onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="#">{{Auth::user()->name}}</a></li>
            <li><a href="#">เพิ่มแอดมิน</a></li>
            <li><a href="#">ดูบัญชีรายชื่อ</a></li>
            <li><a href="{{route('logout_post')}}">ออกจากระบบ</a></li>
            
    </ul>
    <ul>
            <li class="hideOnMobile"><a href="#">Coding2go</a></li>
            <li class="hideOnMobile"><a href="#">Blog</a></li>
            <li class="hideOnMobile"><a href="#">Product</a></li>
            <li class="hideOnMobile"><a href="#">About</a></li>
            <li class="hideOnMobile"><a href="#">Forum</a></li>
            @if(Auth::check())
            <li id="auth-box" class="hideOnMobile"><a href="#" class="auth-name">{{Auth::user()->name}}<span class="status-dot"></span></a></li>
            <li id="auth-box" class="hideOnMobile"><a href="{{route('logout_post')}}" class="log-out">ออกจากระบบ<i class="fas fa-sign-out-alt"></i></a></li>
            @else

            @endif

            
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 -960 960 960" width="26px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
    </ul>
</nav>

<script>
    function showSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'flex'
    }
    function hideSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'none'
    }
</script>