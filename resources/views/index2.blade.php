<body>
  <div class="wrapper">
    <div class="search-area">
      <form>
        <input type="text" id="search-text" placeholder="検索ワードを入力">
      </form>
      <div class="search-result">
        <div class="search-result__hit-num"></div>
        <div id="search-result__list"></div>
      </div>
    </div>

    <ul class="target-area">
      <li>りんご120円</li>
      <li>ばなな100円</li>
      <li>みかん150円</li>
      <li>いちご220円</li>
      <li>すいか500円</li>
    </ul>
  </div><!-- /.wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script>
    $(function() {
      searchWord = function() {
        var searchResult,
          searchText = $(this).val(), // 検索ボックスに入力された値
          targetText,
          hitNum;

        // 検索結果を格納するための配列を用意
        searchResult = [];

        // 検索結果エリアの表示を空にする
        $('#search-result__list').empty();
        $('.search-result__hit-num').empty();

        // 検索ボックスに値が入ってる場合
        if (searchText != '') {
          $('.target-area li').each(function() {
            targetText = $(this).text();

            // 検索対象となるリストに入力された文字列が存在するかどうかを判断
            if (targetText.indexOf(searchText) != -1) {
              // 存在する場合はそのリストのテキストを用意した配列に格納
              searchResult.push(targetText);
            }
          });

          // 検索結果をページに出力
          for (var i = 0; i < searchResult.length; i++) {
            $('<span>').text(searchResult[i]).appendTo('#search-result__list');
          }

          // ヒットの件数をページに出力
          hitNum = '<span>検索結果</span>：' + searchResult.length + '件見つかりました。';
          $('.search-result__hit-num').append(hitNum);
        }
      };

      // searchWordの実行
      $('#search-text').on('input', searchWord);
    });
  </script>
</body>


</html>