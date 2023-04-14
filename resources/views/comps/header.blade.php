<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header logo">
                    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <div id="nav-icon1">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <a href="index.html"><img class="logo" src="/images/logo1.png" alt="" width="119" height="58"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav flex-child-menu menu-left">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default lv1" href="/">
                                Home 
                            </a>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default lv1" href="/shows">
                                TV SHOWS
                            </a>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default lv1" href="/movies">
                                MOVIES
                            </a>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default lv1" href="/subscription">
                                SUBSCRIPTION 
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav flex-child-menu menu-right">
                        @auth
                            <li><a href="/profile">Profie</a></li>
                            <li class="btn"><a href="/logout/client">Logout</a></li>
                        @endauth
                        
                        @guest
                            <li class="loginLink"><a href="#">LOG In</a></li>
                            <li class="btn signupLink"><a href="#">sign up</a></li>
                        @endguest
                        
                    </ul>
                </div>
            <!-- /.navbar-collapse -->
        </nav>
        
        <!-- top search form -->
        <div class="top-search">
            <select>
                <option value="united">TV show</option>
                <option value="saab">Others</option>
            </select>
            <input type="text" placeholder="Search for a movie, TV Show or celebrity that you are looking for">
        </div>
    </div>
</header>