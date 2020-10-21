<div class="container">
    <nav class="navbar">
        <div class="navbar-menu">
            <div class="navbar-start">
                <div class="top-search smp">
                    <input class="text-search" type="text" placeholder="Nhập từ khóa tìm kiếm">
                    <button class="submit-btn btn_search"></button>
                    <div class="list-results">
                    </div>
                </div>
                <a href="{{route('homepage')}}" class="navbar-item">Trang Chủ</a>
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <div class="navbar-link">Thể loại</div>
                    <div class="navbar-dropdown ">
                        <div class="container">
                            <div class="level">
                                <div class="level-left mega-list-wrapper">
                                    <div class="columns">
                                        @foreach($categories->chunk(7) as $items)
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    @foreach($items as $item)
                                                        <li>
                                                            <a href="/home/category?id={{$item->id}}">
                                                                {{$item->label}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="level-right pc">
                                    <img src="http://static.truyenqq.com/template/frontend/images/menu-icon.jpg"
                                         class="mega-menu-cover" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <div class="navbar-link">Quốc gia</div>
                    <div class="navbar-dropdown ">
                        <div class="container">
                            <div class="level">
                                <div class="level-left mega-list-wrapper">
                                    <div class="columns">
                                        @foreach($countries->chunk(2) as $items)
                                            <div class="column">
                                                <ul class="mega-list">
                                                    @foreach($items as $item)
                                                        <li>
                                                            <a href="/home/country?id={{$item->id}}">
                                                                {{$item->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="navbar-item has-dropdown is-hoverable is-mega">
                    <div class="navbar-link">Sắp xếp</div>
                    <div class="navbar-dropdown ">
                        <div class="container">
                            <div class="level">
                                <div class="level-left mega-list-wrapper">
                                    <div class="columns">
                                        @foreach($top->chunk(2) as $items)
                                            <div class="column">
                                                <ul class="mega-list">
                                                    @foreach($items as $key => $item)
                                                        <li>
                                                            <a href="{{route('home.sort', ['mode'=>$key])}}">{{$item}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <a rel="nofollow" href="{{route('home.man', ['sexs' => 'con-trai'])}}" class="navbar-item">Truyện Con Trai</a>
                <a rel="nofollow" href="{{route('home.man', ['sexs' => 'con-gai'])}}" class="navbar-item">Truyện Con Gái</a>

                <a rel="nofollow" href="{{ route('user.history') }}" class="navbar-item">Lịch Sử</a>
                <a rel="nofollow" href="{{ route('user.follow') }}" class="navbar-item">Theo Dõi</a>
                <a rel="nofollow" href="#" class="navbar-item">Thảo Luận</a>
                <a rel="nofollow" href="#" class="navbar-item">Fanpage</a>

            </div>
        </div>
    </nav>
</div>
