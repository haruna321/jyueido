<div class="purchase" id="purchase">
    <?php if ( is_home() || is_front_page() ) : ?>
      <h2>買取強化エリア</h2>
      <p>現在買取を強化しているエリアです。</p>
    <?php else : ?>
      <h2>主要エリア</h2>
      <?php endif; ?>
    <div class="map">
      <img class="pc-only" src="<?php echo $site_url; ?>/img/home/area-pc.png" alt="買取強化エリア">
      <img class="sp-only" src="<?php echo $site_url; ?>/img/home/area-sp.png" alt="買取強化エリア">
      <h3 class="sp-only">中国地方</h3>
      <ul class="chugoku">
        <li class="modal-open" id="js-open1">鳥取県</li>
        <li class="modal-open" id="js-open2">岡山県</li>
        <li class="modal-open" id="js-open17">島根県</li>
        <li class="modal-open" id="js-open3">広島県</li>
      </ul>
      <h3 class="sp-only">中部地方</h3>
      <ul class="chubu">
        <li class="modal-open" id="js-open4">福井県</li>
        <li class="modal-open" id="js-open5">岐阜県</li>
        <li class="modal-open" id="js-open16">石川県</li>
        <li class="modal-open" id="js-open6">愛知県</li>
      </ul>
      <h3 class="sp-only">四国地方</h3>
      <ul class="shikoku">
        <li class="modal-open" id="js-open7">香川県</li>
        <li class="modal-open" id="js-open8">徳島県</li>
        <li class="modal-open" id="js-open18">愛媛県</li>
      </ul>
      <h3 class="sp-only">近畿地方</h3>
      <ul class="kinki">
        <li class="modal-open" id="js-open9">兵庫県</li>
        <li class="modal-open" id="js-open10">滋賀県</li>
        <li class="modal-open" id="js-open11">大阪府</li>
        <li class="modal-open" id="js-open12">京都府</li>
        <li class="modal-open" id="js-open13">和歌山県</li>
        <li class="modal-open" id="js-open14">奈良県</li>
        <li class="modal-open" id="js-open15">三重県</li>
      </ul>
    </div>
    <div class="overlay" id="js-overlay"></div>
    <!-- 追記ここまで -->
    <div class="modal" id="js-modal-1">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/tottori/">
          <h3>鳥取県</h3>
          <div class="img">
            <img src="<?php echo $site_url; ?>/img/home/tottori.png" alt="">
          </div>
        </a>
        <p>鳥取市 / 米子市 / 倉吉市 / 境港市 / 岩美町 / 若桜町 / 智頭町 / 八頭町 / 三朝町 / 湯梨浜町 / 琴浦町 / 北栄町 / 日吉津村 / 大山町 / 南部町 / 伯耆町 / 日南町 / 日野町 / 江府町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-2">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/okayama/">
          <h3>岡山県</h3>
          <div class="img">
            <img src="<?php echo $site_url; ?>/img/home/okayama.png" alt="">
          </div>
        </a>
        <p>岡山市 / 倉敷市 / 津山市 / 玉野市 / 笠岡市 / 井原市 / 総社市 / 高梁市 / 新見市 / 備前市 / 瀬戸内市 / 赤磐市 / 真庭市 / 美作市 / 浅口市 / 和気町 / 早島町 / 里庄町 / 矢掛町 / 新庄村 / 鏡野町 / 勝央町 / 奈義町 / 西粟倉村 / 久米南町 / 美咲町 / 吉備中央町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-3">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/hiroshima/">
        <h3>広島県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/hiroshima.png" alt="">
        </div>
        </a>
        <p>広島市 / 呉市 / 竹原市 / 三原市 / 尾道市 / 福山市 / 府中市 / 三次市 / 庄原市 / 大竹市 / 東広島市 / 廿日市市 / 安芸高田市 / 江田島市 / 府中町 / 海田町 / 熊野町 / 坂町 / 安芸太田町 / 北広島町 / 大崎上島町 / 世羅町 / 神石高原町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-4">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/fukui/">
        <h3>福井県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/fukui.png" alt="">
        </div>
        </a>
        <p>福井市 / 敦賀市 / 小浜市 / 大野市 / 勝山市 / 鯖江市 / あわら市 / 越前市 / 坂井市 / 永平寺町 / 池田町 / 南越前町 / 越前町 / 美浜町 / 高浜町 / おおい町 / 若狭町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-5">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/gifu/">
        <h3>岐阜県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/gifu.png" alt="">
        </div>
        </a>
        <p>岐阜市 / 大垣市 / 高山市 / 多治見市 / 関市 / 中津川市 / 美濃市 / 瑞浪市 / 羽島市 / 恵那市 / 美濃加茂市 / 土岐市 / 各務原市 / 可児市 / 山県市 / 瑞穂市 / 飛騨市 / 本巣市 / 郡上市 / 下呂市 / 海津市 / 岐南町 / 笠松町 / 養老町 / 垂井町 / 関ケ原町 / 神戸町 / 輪之内町 / 安八町 / 揖斐川町 / 大野町 / 池田町 / 北方町 / 坂祝町 / 富加町 / 川辺町 / 七宗町 / 八百津町 / 白川町 / 東白川村 / 御嵩町 / 白川村</p>
      </div>
    </div>
    <div class="modal" id="js-modal-6">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/aichi/">
        <h3>愛知県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/aichi.png" alt="">
        </div>
        </a>
        <p>名古屋市 / 豊橋市 / 岡崎市 / 一宮市 / 瀬戸市 / 半田市 / 春日井市 / 豊川市 / 津島市 / 碧南市 / 刈谷市 / 豊田市 / 安城市 / 西尾市 / 蒲郡市 / 犬山市 / 常滑市 / 江南市 / 小牧市 / 稲沢市 / 新城市 / 東海市 / 大府市 / 知多市 / 知立市 / 尾張旭市 / 高浜市 / 岩倉市 / 豊明市 / 日進市 / 田原市 / 愛西市 / 清須市 / 北名古屋市 / 弥富市 / みよし市 / あま市 / 長久手市 / 東郷町 / 豊山町 / 大口町 / 扶桑町 / 大治町 / 蟹江町 / 飛島村 / 阿久比町 / 東浦町 / 南知多町 / 美浜町 / 武豊町 / 幸田町 / 設楽町 / 東栄町 / 豊根村 / </p>
      </div>
    </div>
    <div class="modal" id="js-modal-7">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/kagawa/">
        <h3>香川県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/kagawa.png" alt="">
        </div>
        </a>
        <p>高松市 / 丸亀市 / 坂出市 / 善通寺市 / 観音寺市 / さぬき市 / 東かがわ市 / 三豊市 / 土庄町 / 小豆島町 / 三木町 / 直島町 / 宇多津町 / 綾川町 / 琴平町 / 多度津町 / まんのう町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-8">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/tokushima/">
        <h3>徳島県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/tokushima.png" alt="">
        </div>
        </a>
        <p>徳島市 / 鳴門市 / 小松島市 / 阿南市 / 吉野川市 / 阿波市 / 美馬市 / 三好市 / 勝浦町 / 上勝町 / 佐那河内村 / 石井町 / 神山町 / 那賀町 / 牟岐町 / 美波町 / 海陽町 / 松茂町 / 北島町 / 藍住町 / 板野町 / 上板町 / つるぎ町 / 東みよし町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-9">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/hyogo/">
        <h3>兵庫県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/hyougo.png" alt="">
        </div>
        </a>
        <p><a href="https://jyueidou.com/areas/area/hyogo/ashiya/">芦屋市</a> / <a href="https://jyueidou.com/areas/area/hyogo/nishinomiya/">西宮市</a> / <a href="https://jyueidou.com/areas/area/hyogo/kobe-higashinada/">神戸市東灘区</a> / <a href="https://jyueidou.com/areas/area/hyogo/kobe-nada/">神戸市灘区</a> / <a href="https://jyueidou.com/areas/area/hyogo/kobe-hyogo/">神戸市兵庫区</a> / <a href="https://jyueidou.com/areas/area/hyogo/nagata//">神戸市長田区</a> / <a href="https://jyueidou.com/areas/area/hyogo/suma/">神戸市須磨区</a> / <a href="https://jyueidou.com/areas/area/hyogo/kobe-tarumi/">神戸市垂水区</a> / <a href="https://jyueidou.com/areas/area/hyogo/kobe-kitaku/">神戸市北区</a> / <a href="https://jyueidou.com/areas/area/hyogo/kobe-chuo/">神戸市中央区</a> / <a href="https://jyueidou.com/areas/area/hyogo/kobe-nishiku/">神戸市西区</a> / <a href="https://jyueidou.com/areas/area/hyogo/amagasaki/">尼崎市</a> / <a href="https://jyueidou.com/areas/area/hyogo/takarazuka//">宝塚市</a> / <a href="https://jyueidou.com/areas/area/hyogo/itami/">伊丹市</a> / <a href="https://jyueidou.com/areas/area/hyogo/kawanishi/">川西市</a> / <a href="https://jyueidou.com/areas/area/hyogo/himeji/">姫路市</a> / <a href="https://jyueidou.com/areas/area/hyogo/akashi/">明石市</a> / 豊岡市/加古川市/三木市/洲本市/ 相生市/豊岡市/赤穂市/西脇市/高砂市/小野市/三田市/加西市/篠山市/養父市/丹波市/南あわじ市/朝来市/淡路市/宍粟市/加東市/たつの市/ 川辺郡猪名川町 / 多可郡多可町加古郡稲美町 / 播磨町 / 神崎郡市川町 / 福崎町 / 神河町 / 揖保郡太子町 / 赤穂郡上郡町 / 佐用郡佐用町 / 美方郡香美町 / 新温泉町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-10">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/shiga/">
        <h3>滋賀県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/shiga.png" alt="">
        </div>
        </a>
        <p><a href="https://jyueidou.com/areas/shiga/otsu/">大津市</a> / <a href="https://jyueidou.com/areas/shiga/hikone/">彦根市</a> / <a href="https://jyueidou.com/areas/shiga/nagahama/">長浜市</a> / <a href="https://jyueidou.com/areas/shiga/omihachiman/">近江八幡市</a> / <a href="https://jyueidou.com/areas/shiga/kusatsu/">草津市</a> / <a href="https://jyueidou.com/areas/shiga/moriyama/">守山市</a> / 栗東市 / <a href="https://jyueidou.com/areas/shiga/koka/">甲賀市</a> / 野洲市 / 湖南市 / 高島市 / <a href="https://jyueidou.com/areas/shiga/higashiomi/">東近江市</a> / 米原市 / 蒲生郡日野町 / 竜王町 / 愛知郡愛荘町 / 犬上郡豊郷町 / 甲良町 / 多賀町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-11">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/osaka/">
        <h3>大阪府</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/osaka.png" alt="">
        </div>
        </a>
        <p>大阪市都島区 / 福島区 / 此花区 / 港区 / 大正区 / 天王寺区 / 浪速区 / 西淀川区 / 東淀川区 / 東成区 / 生野区 / 旭区 / 城東区 / 阿倍野区 / 住吉区 / 東住吉区 / 西成区 / 淀川区 / 鶴見区 / 住之江区 / 平野区 / 北区 / 中央区 / <a href="https://jyueidou.com/areas/osaka/toyonaka/">豊中市</a> / <a href="https://jyueidou.com/areas/osaka/ikeda/">池田市</a> / <a href="https://jyueidou.com/areas/osaka/minoh/">箕面市</a> / <a href="https://jyueidou.com/areas/osaka/sakai/"> / 堺市堺区 / 中区 / 東区 / 西区 / 南区 / 北区 / 美原区 / </a><a href="https://jyueidou.com/areas/osaka/kishiwada/">岸和田市</a> / <a href="https://jyueidou.com/areas/osaka/suita/">吹田市</a> / 泉大津市<a href="https://jyueidou.com/areas/osaka/takatsuki/">高槻市</a> / 貝塚市 / 守口市 / <a href="https://jyueidou.com/areas/osaka/hirakata/">枚方市</a> / <a href="https://jyueidou.com/areas/osaka/ibaraki/">茨木市</a> / 八尾市 / 泉佐野市 / 富田林市 / 寝屋川市 / 河内長野市 / 松原市 / 大東市 / 和泉市 / 柏原市 / 羽曳野市 / 門真市 / 摂津市 / 高石市 / 藤井寺市 / 東大阪市 / 泉南市 / 四條畷市 / 交野市 / 大阪狭山市 / 阪南市 / 三島郡島本町 / 豊能郡豊能町 / 能勢町 / 泉北郡忠岡町 / 泉南郡熊取町 / 田尻町 / 岬町 / 南河内郡太子町 / 河南町千早赤阪村</p>
      </div>
    </div>
    <div class="modal" id="js-modal-12">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/kyoto/">
        <h3>京都府</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/kyoto.png" alt="">
        </div>
        </a>
        <p><a href="https://jyueidou.com/areas/kyoto/kyoto-kitaku/">京都市北区</a> / <a href="https://jyueidou.com/areas/kyoto/kyoto-kamigyoku/">上京区</a> / <a href="https://jyueidou.com/areas/area/kyoto/kyoto-sakyoku/">左京区</a> / <a href="https://jyueidou.com/areas/kyoto/kyoto-nakagyoku/">中京区</a> / <a href="https://jyueidou.com/areas/kyoto/kyoto-higashiyamaku/">東山区</a> / <a href="https://jyueidou.com/areas/kyoto/kyoto-shimogyoku/">下京区</a> / <a href="https://jyueidou.com/areas/kyoto/kyoto-minamiku/">南区</a> / <a href="https://jyueidou.com/areas/area/kyoto/ukyo/">右京区</a> / <a href="https://jyueidou.com/areas/area/kyoto/kyoto-hushimiku/">伏見区</a> / <a href="https://jyueidou.com/areas/area/kyoto/kyoto-yamashinaku/">山科区</a> / <a href="https://jyueidou.com/areas/area/kyoto/kyoto-nishikyoku/">西京区</a> / <a href="https://jyueidou.com/areas/area/kyoto/uji/">宇治市</a> / <a href="https://jyueidou.com/areas/area/kyoto/kameoka/">亀岡市</a> / <a href="https://jyueidou.com/areas/kyoto/joyo/">城陽市</a> / <a href="https://jyueidou.com/areas/kyoto/nagaokakyo/">長岡京市</a> / <a href="https://jyueidou.com/areas/kyoto/maizuru/">舞鶴市</a> / <a href="https://jyueidou.com/areas/kyoto/fukuchiyama/">福知山市</a> / <a href="https://jyueidou.com/areas/kyoto/ayabe/">綾部市</a> / <a href="https://jyueidou.com/areas/kyoto/miyazu/">宮津市</a> / <a href="https://jyueidou.com/areas/kyoto/muko/">向日市</a> / <a href="https://jyueidou.com/areas/kyoto/yawata/">八幡市</a> / <a href="https://jyueidou.com/areas/kyoto/kyotanabe/">京田辺市</a> / <a href="https://jyueidou.com/areas/kyoto/kyotango/">京丹後市</a> / <a href="https://jyueidou.com/areas/kyoto/nantan/">南丹市</a> / <a href="https://jyueidou.com/areas/kyoto/kizugawa/">木津川市</a> / <a href="https://jyueidou.com/areas/kyoto/oyamazaki/">大山崎町</a> / <a href="https://jyueidou.com/areas/kyoto/kumiyama/">久世郡久御山町</a> / <a href="https://jyueidou.com/areas/kyoto/ide/">綴喜郡井手町</a> / <a href="https://jyueidou.com/areas/kyoto/ujitawara/">宇治田原町</a> / <a href="https://jyueidou.com/areas/kyoto/kasagi/">相楽郡笠置町</a> / <a href="https://jyueidou.com/areas/kyoto/waduka/">和束町</a> / <a href="https://jyueidou.com/areas/kyoto/seika/">精華町</a> / <a href="https://jyueidou.com/areas/kyoto/minamiyamashiro/">南山城村</a> / <a href="https://jyueidou.com/areas/kyoto/kyotanba/">京丹波町</a> / <a href="https://jyueidou.com/areas/kyoto/ine/">伊根町</a> / <a href="https://jyueidou.com/areas/kyoto/yosano/">与謝野町</a></p>
      </div>
    </div>
    <div class="modal" id="js-modal-13">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/wakayama/">
        <h3>和歌山県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/wakayama.png" alt="">
        </div>
        </a>
        <p>和歌山市 / 海南市 / 市橋本市 / 有田市 / 御坊市 / 田辺市 / 新宮市 / 紀の川市 / 岩出市 / 海草郡紀美野町 / 伊都郡かつらぎ町 / 九度山町 / 高野町 / 有田郡湯浅町 / 広川町 / 有田川町 / 日高郡美浜町 / 日高町 / 由良町 / 印南町 / みなべ町 / 日高川町 / 西牟婁郡白浜町 / 上富田町 / すさみ町 / 東牟婁郡那智勝浦町 / 太地町 / 古座川町 / 北山村 / 串本町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-14">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/nara/">
        <h3>奈良県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/nara.png" alt="">
        </div>
        </a>
        <p>奈良市 / <a href="https://jyueidou.com/areas/nara/yamatotakada/">大和高田市</a> / <a href="https://jyueidou.com/areas/nara/yamatokoriyama/">大和郡山市</a> / <a href="https://jyueidou.com/areas/nara/tenri/">天理市</a> / <a href="https://jyueidou.com/areas/nara/kashihara/">橿原市</a> / <a href="https://jyueidou.com/areas/nara/sakurai/">桜井市</a> / 五條市 / 御所市 / <a href="https://jyueidou.com/areas/nara/ikoma/">生駒市</a> / <a href="https://jyueidou.com/areas/nara/kashiba/">香芝市</a> / 葛城市 / 宇陀市 / 山辺郡山添村 / 生駒郡平群町 / 三郷町 / 斑鳩町 / 安堵町 / 磯城郡川西町 / 三宅町 / 田原本町 / 宇陀郡曽爾村 / 御杖村 / 高市郡高取町 / 明日香村 / 北葛城郡上牧町 / 王寺町 / 広陵町 / 河合町 / 吉野郡吉野町 / 大淀町 / 下市町 / 黒滝村 / 天川村 / 野迫川村 / 十津川村 / 下北山村 / 上北山村 / 川上村 / 東吉野村</p>
      </div>
    </div>
    <div class="modal" id="js-modal-15">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/mie/">
        <h3>三重県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/mie.png" alt="">
        </div>
        </a>
        <p>津市 / 四日市市 / 伊勢市 / 松阪市 / 桑名市 / 鈴鹿市 / 名張市 / 尾鷲市 / 亀山市 / 鳥羽市 / 熊野市 / いなべ市 / 志摩市 / 伊賀市 / 木曽岬町 / 東員町 / 菰野町 / 朝日町 / 川越町 / 多気町 / 明和町 / 大台町 / 玉城町 / 度会町 / 大紀町 / 南伊勢町 / 紀北町 / 御浜町 / 紀宝町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-16">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/ishikawa/">
        <h3>石川県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/ishikawa.png" alt="">
        </div>
        </a>
        <p>金沢市 / 七尾市 / 小松市 / 輪島市 / 珠洲市 / 加賀市 / 羽咋市 / かほく市 / 白山市 / 能美市 / 野々市市 / 川北町 / 津幡町 / 内灘町 / 志賀町 / 宝達志水町 / 中能登町 / 穴水町 / 能登町 / </p>
      </div>
    </div>
    <div class="modal" id="js-modal-17">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/shimane/">
        <h3>島根県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/shimane.png" alt="">
        </div>
        </a>
        <p>松江市 / 浜田市 / 出雲市 / 益田市 / 大田市 / 安来市 / 江津市 / 雲南市 / 奥出雲町 / 飯南町 / 川本町 / 美郷町 / 邑南町 / 津和野町 / 吉賀町 / 海士町 / 西ノ島町 / 知夫村 / 隠岐の島町</p>
      </div>
    </div>
    <div class="modal" id="js-modal-18">
      <div class="modal-close__wrap">
        <button class="modal-close" id="js-close">
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="city">
        <a href="<?php echo $site_url; ?>/areas/ehime/">
        <h3>愛媛県</h3>
        <div class="img">
          <img src="<?php echo $site_url; ?>/img/home/ehime.png" alt="">
        </div>
        </a>
        <p>松山市 / 今治市 / 宇和島市 / 八幡浜市 / 新居浜市 / 西条市 / 大洲市 / 伊予市 / 四国中央市 / 西予市 / 東温市 / 上島町 / 久万高原町 / 松前町 / 砥部町 / 内子町 / 伊方町 / 松野町 / 鬼北町 / 愛南町</p>
      </div>
    </div>
  </div>