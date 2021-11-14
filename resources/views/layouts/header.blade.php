<header>
  <style>
    a {
      text-decoration: none;
      color: #333333;
    }

    .logout {
      color: #333333;
      background-color: white;
      border: 0px white;
      display: block;
      padding-top: 20px;
    }

    .logout_text {
      color: #0033FF;
      padding: 15px 0;
      font-weight: bold;
      font-size: 18px;
      cursor: pointer;
    }

    label {
      display: block;
    }

    /*ナビのスタイル*/
    nav.NavMenu {
      position: fixed;
      z-index: 12;
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

    .header {
      position: fixed;
      z-index: 100;
      background-color: #E6E6E6;
      height: 80px;
      width: 100%;
    }

    /*ボタンのスタイル*/
    .Toggle {
      position: fixed;
      top: 17px;
      width: 45px;
      height: 45px;
      cursor: pointer;
      z-index: 13;
      display: block;
      background-color: #0033FF;
      border: solid 1px #BBBBBB;
      border-radius: 5px;
      box-shadow: 1px 1px 1px #BBB;
      align-items: center;
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
      position: fixed;
      margin-left: 60px;
      margin-top: 15px;
    }

    .header_title h2 {
      color: #0033FF;
      font-size: 36px;
    }

    .white {
      background-color: white;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(function() {
      $('.Toggle').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
          $('.NavMenu').addClass('active');
          $('.NavMenu').fadeIn(1);
        } else {
          $('.NavMenu').removeClass('active');
          $('.NavMenu').fadeOut(1);
        }
      });

      $('.navmenu-a').click(function() {
        $('.NavMenu').removeClass('active');
        $('.NavMenu').fadeOut(1);
        $('.Toggle').removeClass('active');
      });
    });
    $(function() {
      $('.Toggle').click(function() {
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
            <label for="logout" class="logout_text">logout<input type="submit" value="" class="logout" id="logout"></label>


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
  <div class="header flex">
    <div class="Toggle">
      <span class="toggle-span span span1"></span>
      <span class="span span2"></span>
      <span class="span span3"></span>
      <div class="header_title">
        <h2>Rese</h2>
      </div>
    </div>
  </div>
</header>