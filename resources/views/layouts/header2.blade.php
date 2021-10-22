<header>
  <style>
    a {
      text-decoration: none;
      color: #333333;
    }

    /*ナビのスタイル*/
    nav.NavMenu {
      position: fixed;
      z-index: 12;
      top: 0;
      left: 0;
      background: white;
      text-align: center;
      width: 100%;
      height: 100%;
      display: none;
    }

    nav.NavMenu ul {
      width: 100%;
      margin: 0 auto;
      padding: 0;
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translateY(-50%) translateX(-50%);
    }

    nav.NavMenu ul li {
      font-size: 24px;
      list-style-type: none;
      width: 100%;
      padding-bottom: 0px;

    }

    li {
      color: #0033FF;
    }

    nav.NavMenu ul li:last-child {
      padding-bottom: 0;
    }

    nav.NavMenu ul li a {
      display: block;
      color: #0033FF;
      padding: 15px 0;
      font-weight: bold;
      font-size: 18px;
    }

    /*ボタンのスタイル*/
    .Toggle {
      position: fixed;
      top: 5px;
      width: 45px;
      height: 45px;
      cursor: pointer;
      z-index: 13;
      display: block;
      background-color: #0033FF;
      border: solid 1px #BBBBBB;
      border-radius: 5px;
      box-shadow: 1px 1px 1px #BBB;
    }

    .Toggle span {
      display: block;
      position: absolute;
      border-bottom: solid 4px white;
      -webkit-transition: .35s ease-in-out;
      -moz-transition: .35s ease-in-out;
      transition: .35s ease-in-out;
      left: 6px;
    }

    .span1 {
      width: 18px;
    }

    .span2 {
      width: 35px;
    }

    .span3 {
      width: 10px;
    }


    .Toggle span:nth-child(1) {
      top: 9px;
    }

    .Toggle span:nth-child(2) {
      top: 20px;
    }

    .Toggle span:nth-child(3) {
      top: 31px;
    }

    .Toggle.active span:nth-child(1) {
      top: 18px;
      left: 6px;
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      transform: rotate(-45deg);
      border-bottom: solid 3px white;
      width: 35px;
    }

    .Toggle.active span:nth-child(2),
    .Toggle.active span:nth-child(3) {
      top: 18px;
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      transform: rotate(45deg);
      border-bottom: solid 3px white;
      width: 35px;
    }

    .flex {
      height: 80px;
      width: 73%;
      display: flex;
      align-items: center;
      padding: 0 12%;
    }

    .header_title {
      margin-left: 60px;
    }

    .header_title h2 {
      color: #0033FF;
      font-size: 36px;
      margin-top: 10px;
    }

    .search {
      display: flex;
      margin-left: auto;
      text-align: left;
      background-color: white;
      border-radius: 5px;
      box-shadow: 1px 1px 1px #BBB;
      height: 40px;
      align-items: center;
    }

    input {
      width: 150px;
      background-color: white;
      border: white;
    }

    select {
      border: white;
      border-right: solid 1px #BBBBBB;
    }

    .search_icon {
      color: #BBBBBB;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function() {
      $('.Toggle').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
          $('.NavMenu').addClass('active');
          $('.NavMenu').fadeIn(500);
        } else {
          $('.NavMenu').removeClass('active');
          $('.NavMenu').fadeOut(500);
        }
      });

      $('.navmenu-a').click(function() {
        $('.NavMenu').removeClass('active');
        $('.NavMenu').fadeOut(1000);
        $('.Toggle').removeClass('active');
      });
    });
  </script>
  <!-- ナビメニュー -->
  <nav class="NavMenu">
    @if (Auth::check())
    <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p>
    <div class="menu">
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/mypage">Mypage</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
              {{ __('logout') }}
            </x-dropdown-link>
          </form>
        </li>
      </ul>
    </div>
    @else
    <div class="menu">
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/register">Registration</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
      </ul>
      @endif
    </div>
  </nav>

  <!-- メニュー -->
  <div class="flex">
    <div class="Toggle">
      <span class="toggle-span span span1"></span>
      <span class="span span2"></span>
      <span class="span span3"></span>
      <div class="header_title">
        <h2>Rese</h2>
      </div>
    </div>

    <div class="search">
      <form action="search" method="GET">
        @csrf
        <select name="area_id" id="area">
          <option value="">All area</option>
          <option value="1">東京都</option>
          <option value="2">大阪府</option>
          <option value="3">福岡県</option>
        </select>
        <select name="genre_id" id="genre">
          <option value="">All genre</option>
          <option value="1">寿司</option>
          <option value="2">焼肉</option>
          <option value="3">居酒屋</option>
          <option value="4">ラーメン</option>
          <option value="5">イタリアン</option>
        </select>
        <i class="fas fa-search search_icon"></i>
        <input type="text" name="name" placeholder="Search" id="name">
        <input type="submit">
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
      $('#area').change(function() {
        var area_id = $('#area').val();
        $.ajax({
            url: '/area_search',
            method: 'get',
            async: true,
            data: {
              'area_id': area_id,
            },
          })
          .done(function(json) {
            alert('ajax成功');
          }).fail(function(json) {
            alert('ajax失敗');
          });
      });
      $('#genre').change(function() {
        var genre_id = $('#genre').val();
        $.ajax({
            url: '/genre_search',
            method: 'get',
            async: true,
            data: {
              'genre_id': genre_id,
            },
          })
          .done(function(json) {
            alert('ajax成功');
          }).fail(function(json) {
            alert('ajax失敗');
          });
      });
      $('#name').change(function() {
        var name = $('#name').val();
        $.ajax({
            url: '/name_search',
            method: 'get',
            async: true,
            data: {
              'name': name,
            },
          })
          .done(function(json) {
            alert('ajax成功');
          }).fail(function(json) {
            alert('ajax失敗');
          });
      });
    </script>

</header>