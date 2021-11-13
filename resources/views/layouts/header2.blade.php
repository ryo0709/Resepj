<header>
  <style>
    a {
      text-decoration: none;
      color: #333333;
    }

    /*ナビのスタイル*/
    nav.NavMenu {
      position: fixed;

      top: 0;
      left: 0;
      background-color: white;
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
    .header {
      position: fixed;
      z-index: 1;
      background-color: #E6E6E6;
      height: 80px;
      width: 74.4%;
      display: flex;
      align-items: center;
      margin-left: 12%;
      padding-right: 8px;
    }

    .Toggle {
      position: fixed;
      width: 45px;
      height: 45px;
      cursor: pointer;
      z-index: 1300;
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
      text-align: left;
      background-color: white;
      border-radius: 5px;
      box-shadow: 1px 1px 1px #BBB;
      height: 40px;
      align-items: center;
      margin-right: 20px;
    }

    @media screen and (max-width: 785px) {
      .search {
        margin-top: 80px;
        margin-bottom: 20px;
        height: 20px;
        width: 100%;
      }

      .header {
        width: 75%;
      }
    }

    @media screen and (min-width: 786px) {
      .search {
        margin-left: auto;
      }
    }

    input {
      width: 150px;
      background-color: white;
      border: white;
      cursor: pointer;
    }

    select {
      border: white;
      border-right: solid 1px #BBBBBB;
      cursor: pointer;
    }

    .search_icon {
      color: #BBBBBB;
    }

    .white {
      background-color: white;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    //ハンバーガーメニュー
    $(function() {
      $('.Toggle').click(function() { //画面左上のRese左のアイコンをクリックで以下の処理がされる
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
    $(function() {
      $('.Toggle').click(function() {
        $('.search').toggle();
        $('.content').css('background-color', '');
        $('.content').toggleClass('white');
        $('.header').css('background-color', '');
        $('.header').toggleClass('white');
      });
    });
  </script>
  <!-- ナビメニュー -->
  <nav class="NavMenu">
    @if (Auth::check())
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
  <div class="flex header">
    <div class="Toggle">
      <span class="toggle-span span span1"></span>
      <span class="span span2"></span>
      <span class="span span3"></span>
      <div class="header_title">
        <h2>Rese</h2>
      </div>
      <!--header_title -->
    </div>
    <!--Toggle -->
    <div class="search">
      <form action="area_search" method="GET">
        @csrf
        <select name="area_id" id="area">
          <option value="" style="display:none;">All area</option>
          <option value=0>All area</option>
          <option value=1 @if($select_area_id==1) selected @endif>東京都</option>
          <option value=2 @if($select_area_id==2) selected @endif>大阪府</option>
          <option value=3 @if($select_area_id==3) selected @endif>福岡県</option>
        </select>
      </form>
      <select name="genre_id" id="genre">
        <option value=0>All genre</option>
        <option value=1>寿司</option>
        <option value=2>焼肉</option>
        <option value=3>居酒屋</option>
        <option value=4>イタリアン</option>
        <option value=5>ラーメン</option>
      </select>
      <i class="fas fa-search search_icon"></i>
      <input type="text" name="name" placeholder="Search" id="name" onsubmit="return false;" value="{{$name}}">
    </div>
    <!--search -->
  </div>
  <!--flex -->

  <script src=" https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    //検索機能
    $('#area').change(function() { //エリア検索　データベースから該当shopをもってくる　inputをid”area”で紐づけ　変更されたら以下の処理
      var area_id = $('#area').val(); //val()で変更されたidを取得
      $.ajax({ //ajax通信
          url: '/area_search',
          method: 'get',
          async: true,
          data: {
            'area_id': area_id,
          },
        })
        .done(function(json) { //エリア検索が成功したときの処理
          $('body').empty(); //bodyのshop空にする
          $('body').append(json) //該当shopを呼び出しbodyに付加し表示させる
        }).fail(function(json) { //処理が失敗されるとALERTされる
          alert('ajax失敗');
        });
    });
    $('#genre').change(function() { //ジャンル検索
      var genre_id = $('#genre').val();
      if (genre_id == 0) { //0(Allgenreが選択された場合)
        $('.genre_id1, .genre_id2, .genre_id3, .genre_id4, .genre_id5').show();
        //該当shopのクラスに”genre_id”+idとしshopの持つジャンルを紐づけされている
        //すべてのジャンルが表示される
      } else if (genre_id !== 0) { //選択したgenreがAllgenre以外の場合
        for (var i = 0; i <= 5; i++) { //　for文　id1～5まで以下の処理がされる、
          var hide_genre = '.' + 'genre_id' + i; //iは表示させたくないgenreのid、hide_genreに代入
          var show_genre = '.' + 'genre_id' + genre_id; //表示させたいgenre、変数genre_idで紐づけられている、show_genreに代入
          $(hide_genre).hide(); //genre_id+iを持つクラスは表示されない
          if (i == genre_id) { //iと選択したgenreのiが同じ場合、iに選択したgenreのidは除外される
            continue;
          }
        }
        $(show_genre).show(); //以上の処理により選択したgenreのみ表示される
      }
    });
    //名前検索　エリア検索と同様の為省略
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
          $('body').empty();
          $('body').append(json)
        }).fail(function(json) {
          alert('ajax失敗');
        });
    });
  </script>
</header>