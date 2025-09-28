/**
 * common.js
 * @version		2.5.0 - 2018-03-27
 */

/*@cc_on
(function() {
	var elements = [
		'article', 'aside', 'footer', 'header', 'hgroup', 'nav', 'section', 'figure', 'source',
		'video', 'audio', 'canvas', 'output', 'details', 'menu', 'bb', 'command', 'datagrid', 'datalist', 'dialog', 'progress', 'meter', 'time', 'mark'
	], i = 0, l = elements.length;
	for (; i < l; i++) document.createElement(elements[i]);
})();
@*/

var _ua = (function (u) {
  return {
    Tablet:
      (u.indexOf("windows") != -1 && u.indexOf("touch") != -1) ||
      u.indexOf("ipad") != -1 ||
      (u.indexOf("android") != -1 && u.indexOf("mobile") == -1) ||
      (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1) ||
      u.indexOf("kindle") != -1 ||
      u.indexOf("silk") != -1 ||
      u.indexOf("playbook") != -1,
    Mobile:
      (u.indexOf("windows") != -1 && u.indexOf("phone") != -1) ||
      u.indexOf("iphone") != -1 ||
      u.indexOf("ipod") != -1 ||
      (u.indexOf("android") != -1 && u.indexOf("mobile") != -1) ||
      (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1) ||
      u.indexOf("blackberry") != -1,
  };
})(window.navigator.userAgent.toLowerCase());

var bs3breakpoints = (function () {
  return {
    xs: 480,
    sm: 768,
    md: 992,
    lg: 1200,
  };
})();

var Kaas = {
  ver: "2.5.0",
  srcRex: /common\.js(\?.*)?$/,
  d: document,
  smoothScrollEase: "easeInOutExpo",
  smoothScrollTime: 500,
  smoothScrollOffsetY: function () {
    // return 50;
    return $("#site-header").height();
  },
  pagetopClass: "link-page-top",

  init: function () {
    this.ready(function () {
      if (typeof jQuery != undefined) {
        var $ = jQuery,
          w = $(window),
          b = $("body"),
          hash = location.hash.match(/&gid=/) ? "" : location.hash,
          h =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.body.clientHeight;

        if (hash != 0) {
          var targetY = $(hash).offset().top - Kaas.smoothScrollOffsetY(),
            screenH = b.height() - h;
          $("html,body").scrollTop(targetY < screenH ? targetY : screenH);
        }

        b.append(
          '<div class="' +
            Kaas.pagetopClass +
            '"><a href="#top">Page Top</a></div>'
        );

        Kaas.scroll('a[href*="#"]', "[data-toggle], .ignore-scroll");

        $("#search .logo-google")
          .focus(function () {
            $(this).addClass("logo-off");
          })
          .blur(function () {
            if ($.trim($(this).val()) == "") {
              $(this).removeClass("logo-off");
            }
          });

        /**
         * for Mobiles & Tablets
         */
        if (_ua.Mobile || _ua.Tablet) {
          // link tel
          $(".link-tel").each(function () {
            var num = $(this).data("tel");
            if (num) {
              $(this).wrap('<a href="tel:' + num.replace(/-/g, "") + '" />');
            }
          });
        } else {

        /**
         * for PC
         */
          Kaas.imageRollover.init();
        }

        w.scroll(function () {
          if ($(this).scrollTop() > 150) {
            $("." + Kaas.pagetopClass).addClass(Kaas.pagetopClass + "-show");
          } else {
            $("." + Kaas.pagetopClass).removeClass(Kaas.pagetopClass + "-show");
          }
        });

        // header fixed
        var header = $(".site-header").eq(0),
          globalNav = $(".global-nav-pc"),
          headerY = 200,
          globalNavY = 200, // global-nav-pcが固定される位置を設定
          headerH = header.height(),
          b = $("body"),
          w = $(window),
          setFixed = function () {
            if (w.scrollTop() >= headerY) {
              header.addClass("header-fixed");
            }
            if (w.scrollTop() >= globalNavY) {
              globalNav.addClass("nav-fixed"); // スクロール位置が100のときにクラスを追加
            }
          },
          setStatic = function () {
            if (w.scrollTop() < headerY) {
              header.removeClass("header-fixed");
            }
            if (w.scrollTop() < globalNavY) {
              globalNav.removeClass("nav-fixed"); // スクロール位置が100より小さいときにクラスを削除
            }
          },
          headerInit = function () {
            setFixed();
            setStatic();
          };

        headerInit();
        w.scroll(function () {
          headerInit();
        });
        // フッターリンクをグローバルナビにコピー
        var gn = $(".footer-links").clone().appendTo("#global-nav-sp");
        // var bt = $('.footer-ex-banners').clone().appendTo('#global-nav-sp');
        // gn.removeClass('visible-xs visible-sm');
        // bt.removeClass('visible-xs visible-sm');

        // modal
        b.append(
          '<div class="modal modal-tel fade" id="modal-tel-container" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" data-show="true"><div class="modal-dialog"><div class="modal-content"></div></div></div>'
        );
        // b.append('<div class="modal modal-menu fade" id="modal-menu-container" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" data-show="true"><div class="modal-dialog"><div class="modal-content"></div></div></div>');

        /**
         * スライドメニュー
         */
        $(".menu-trigger").click(function (e) {
          if (e.preventDefault) e.preventDefault();
          else e.returnValue = false;
          $(".global-nav-container").toggleClass("show");
          $(this).toggleClass("active");
        });

        /**
         * 戻る
         */
        $(".btn-history-back").click(function (e) {
          if (e.preventDefault) e.preventDefault();
          else e.returnValue = false;
          window.history.back();
        });

        /**
         * temporary
         * ページがない場合、リンクを飛ばさない
         */
        var whitelist = [],
          hasPage = function (page, list) {
            var i = 0,
              l = list.length,
              p;
            for (; i < l; i++) {
              p = new RegExp(list[i]);
              if (p.test(page)) {
                return 0;
              }
            }
            return 1;
          };

        $("a").each(function (i, e) {
          var _self = $(this),
            href = _self.attr("href");
          if (!hasPage(href, whitelist)) {
            _self.addClass("underconstruction").click(function (e) {
              // console.log(href);
              if (e.preventDefault) e.preventDefault();
              else e.returnValue = false;
            });
          }
        });

        /**
         * 電話計測
         */
        // $('a[href^="tel:"]').each(function(i, e) {
        // 	$(e).click(function() {
        // 		if (e.preventDefault) e.preventDefault();
        // 		else e.returnValue = false;

        // 		ga('send', 'event', 'tap', 'call', loc);
        // 	});
        // });
      }

      // Kaas.externalLink();
    });
  },

  imageRollover: {
    opacity: 0.6,
    _rolloverRex: /_rollover\./,
    _alphaRex: /_alpha\./,

    init: function () {
      var d = Kaas.d;

      if (d.querySelectorAll) {
        var imgs = d.querySelectorAll("img"),
          inputs = d.querySelectorAll('input[type="image"]'),
          i = 0,
          l = imgs.length,
          j = 0,
          k = inputs.length;
        for (; i < l; i++) this.set(imgs[i]);
        for (; j < k; j++) this.set(inputs[j]);
      } else {
        var imgs = d.getElementsByTagName("img"),
          i = 0,
          l = imgs.length;
        for (; i < l; i++) this.set(imgs[i]);
      }
    },

    set: function (target) {
      var t = Kaas.$(target);
      var src = t.getAttribute("src");
      var rolloverRex = this._rolloverRex;
      var alphaRex = this._alphaRex;
      // src="xxx_rollover.png"
      if (src && src.match(rolloverRex)) this._hover(t, src, "rollover");
      // src="xxx_alpha.png"
      else if ((src && src.match(alphaRex)) || Kaas.hasClassName(t, "alpha"))
        Kaas.mouseEvent.opacity(t, Kaas.imageRollover.opacity);
      // class="imgover"
      else if (src && Kaas.hasClassName(t, "imgover")) this._hover(t, src);
    },

    /**
     * @private
     */
    _hover: function (target, src, type) {
      var t = target;
      t.offSrc = src;
      t.ext = t.offSrc.substring(t.offSrc.lastIndexOf("."), t.offSrc.length);
      t.onSrc =
        type == "rollover"
          ? t.offSrc.replace("_rollover" + t.ext, t.ext)
          : t.offSrc.replace(t.ext, "_o" + t.ext);
      var preload = new Image();
      preload.setAttribute("src", t.onSrc);

      t.onmouseover = function () {
        this.setAttribute("src", this.onSrc);
      };
      t.onmouseout = function () {
        this.setAttribute("src", this.offSrc);
      };
    },
  },

  mouseEvent: {
    opacity: function (target, op) {
      if (!target) return;
      var t = Kaas.$(target);
      t.onmouseover = function () {
        var _opacity = op;
        this.style.filter = "alpha(opacity=" + _opacity * 100 + ")";
        this.style.opacity = _opacity.toString();
        this.style.MozOpacity = _opacity.toString();
      };
      t.onmousedown = function () {
        var _opacity = op - 0.1;
        this.style.filter = "alpha(opacity=" + _opacity * 100 + ")";
        this.style.opacity = _opacity.toString();
        this.style.MozOpacity = _opacity.toString();
      };
      t.onmouseout = t.onmouseup = function () {
        this.setAttribute("style", "");
        this.removeAttribute("style");
      };
    },
  },

  externalLink: function (container) {
    var t = Kaas.$(container);
    var e = t.getElementsByTagName("a");
    for (var i = 0, l = e.length; i < l; i++) {
      var a = e[i];
      if (Kaas.hasRel(a, "external")) {
        if (a.title) a.title += " : 新しいウィンドウで開きます";
        a.onclick = function () {
          window.open(this.getAttribute("href"), "_blank");
          return false;
        };
      }
    }
  },

  /**
   * 指定要素の偶数行にclass="even"を追加する
   * @param	element:String - 要素名
   * @param	container:* - id名 || ELEMENT_NODE || undefined
   * @return	{Void}
   */
  even: function (element, container) {
    var t = Kaas.$(container);
    var e = t.getElementsByTagName(element);
    for (var i = 0, l = e.length; i < l; i++) {
      if (i % 2) this.addClass(e[i], "even");
    }
  },

  /**
   * tr の偶数行にclass="trEven"を追加する
   * thead, tfoot内のtrは無視する
   * @param	container:* - id名 || ELEMENT_NODE || undefined
   * @return	{Void}
   */
  trRows: function (container) {
    var tbody = Kaas.$(container).getElementsByTagName("tbody");
    for (var i = 0, l = tbody.length; i < l; i++) {
      var b = tbody[i];
      var t = b.getElementsByTagName("tr");
      for (var j = 0, k = t.length; j < k; j++) {
        if (j % 2) this.addClass(t[j], "trEven");
      }
    }
  },

  // ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: Utilities

  /**
   * @param	obj:* - id名 || ELEMENT_NODE || undefined
   * @return	{Object}
   */
  $: function (obj) {
    var doc = document;
    if (obj && typeof obj == "string") {
      if (doc.getElementById(obj)) {
        return doc.getElementById(obj);
      } else {
        throw new Error('There is no "' + obj + '" ');
      }
    } else if (obj && obj.nodeType == 1) {
      return obj;
    } else {
      return doc;
    }
  },

  /**
   * @param	target:Object - ELEMENT_NODE
   * @param	value:String
   * @return	{Boolean}
   */
  hasClassName: function (target, value) {
    var c = target.className.split(" ");
    var i = c.length;
    while (i--) {
      if (c[i] == value) {
        return true;
        break;
      }
    }
  },

  /**
   * @param	className:String - 複数設置可 || Array Kaas.bodyClass.apply(null, Array)
   * @return	{Boolean}
   */
  hasBodyClass: function () {
    var b = document.body;
    for (var i = 0, l = arguments.length; i < l; i++) {
      if (Kaas.hasClassName(b, arguments[i])) return true;
    }
    return false;
  },

  /**
   * @param	target:Object - ELEMENT_NODE
   * @param	value:String
   * @return	{Boolean}
   */
  hasRel: function (target, value) {
    if (!target.getAttribute("rel")) return false;
    var c = target.getAttribute("rel").split(" ");
    var i = c.length;
    while (i--) {
      if (c[i] == value) {
        return true;
        break;
      }
    }
  },

  /**
   * @param	target:Object - ELEMENT_NODE
   * @param	value:String - クラス名
   * @return	{Void}
   */
  addClass: function (target, value) {
    if (this.hasClassName(target, value)) return false;
    if (!target.className) target.className = value;
    else target.className += " " + value;
  },

  /**
   * @param	target:Object - ELEMENT_NODE
   * @param	value:String - クラス名
   * @return	{Void}
   */
  removeClass: function (target, value) {
    var c = target.className.split(" ");
    target.className = "";
    for (var i = 0, l = c.length; i < l; i++) {
      if (c[i] != value) target.className += i != l - 1 ? c[i] + " " : c[i];
    }
    if (target.className == "")
      target.getAttribute("className")
        ? target.removeAttribute("className")
        : target.removeAttribute("class");
  },

  /**
   * addElement
   * @param	element:String - 要素名
   * @param	attr:Object - 属性（オプション）
   * @param	parentObject:Object - ELEMENT_NODE（オプション）
   * @return	{Object}
   */
  addElement: function (element, attr, parentObject) {
    var newElement = document.createElement(element);
    for (var i in attr) newElement.setAttribute(i, attr[i]);
    var _parent = parentObject ? parentObject : document.body;
    return _parent.appendChild(newElement);
  },

  load: {
    /**
     * js 非推奨 => Kaas.write.js()
     * @return	{HTMLScriptElement}
     */
    js: function (filepath) {
      var attr = {
        type: "text/javascript",
        src: filepath,
      };
      return Kaas.addElement(
        "script",
        attr,
        document.getElementsByTagName("head")[0]
      );
    },

    /**
     * css
     * @return	{HTMLLinkElement}
     */
    css: function (filepath, media) {
      var attr = {
        rel: "stylesheet",
        type: "text/css",
        href: filepath,
        media: media ? media : "screen, print",
      };
      return Kaas.addElement(
        "link",
        attr,
        document.getElementsByTagName("head")[0]
      );
    },
  },

  /**
   * 後方互換
   * loadStyleSheet
   * @return	{HTMLLinkElement}
   */
  loadStyleSheet: function (filename, media) {
    var attr = {
      rel: "stylesheet",
      type: "text/css",
      href: this.currentPath() + "../css/" + filename + ".css",
      media: media ? media : "screen, print",
    };
    return this.addElement(
      "link",
      attr,
      document.getElementsByTagName("head")[0]
    );
  },

  write: {
    js: function (filepath, charset) {
      var c = !charset ? "" : " charset=" + charset + '"';
      document.write(
        '<script type="text/javascript" src="' +
          filepath +
          '"' +
          c +
          "></script>"
      );
    },
    css: function (filepath) {
      document.write(
        '<link rel="stylesheet" type="text/css" href="' + filepath + '" />'
      );
    },
  },

  /**
   * browser
   * Based on Prototype.js
   * @see	http://www.prototypejs.org/
   */
  browser: {
    IE: !!(window.attachEvent && navigator.userAgent.indexOf("Opera") === -1),
    Opera: navigator.userAgent.indexOf("Opera") > -1,
    WebKit: navigator.userAgent.indexOf("AppleWebKit/") > -1,
    Gecko:
      navigator.userAgent.indexOf("Gecko") > -1 &&
      navigator.userAgent.indexOf("KHTML") === -1,
    MobileSafari: !!navigator.userAgent.match(/Apple.*Mobile.*Safari/),
  },

  /**
   * isIEVer
   * @return	{Boolean}
   */
  isIEVer: function (v) {
    return this.browser.IE && navigator.appVersion.indexOf("MSIE " + v) > 0;
  },

  /**
   * isFF2
   * @return	{Boolean}
   */
  isFF2: function () {
    return (
      this.browser.Gecko &&
      navigator.userAgent.toLowerCase().indexOf("firefox/2") != -1
    );
  },

  /**
   * isAndroid
   * @return	{Boolean}
   */
  isAndroid: function () {
    return (
      this.browser.MobileSafari && navigator.appVersion.indexOf("Android") > -1
    );
  },

  /**
   * isiPhone
   * @return	{Boolean}
   */
  isiPhone: function () {
    return (
      this.browser.MobileSafari && navigator.appVersion.indexOf("iPhone") > -1
    );
  },

  /**
   * os (beta)
   * @return	{Array}
   */
  os: {
    WindowsME: navigator.userAgent.match(/Win(dows)? (9x 4\.90|ME)/),
    Windows2000: navigator.userAgent.match(/Win(dows)? (NT 5\.0|2000)/),
    WindowsXP: navigator.userAgent.match(/Win(dows)? (NT 5\.1|XP)/),
    WindowsVista: navigator.userAgent.match(/Win(dows)?  NT 6\.0/),
  },

  /**
   * currentPath
   * @return	{String}
   */
  currentPath: function () {
    var s = document.getElementsByTagName("script");
    var rex = this.srcRex;
    for (var i = 0, l = s.length; i < l; i++) {
      if (s[i].src && s[i].src.match(rex)) {
        return s[i].src.replace(rex, "");
        break;
      }
    }
  },

  /**
   * root
   * @return	{String}
   */
  root: function () {
    return this.currentPath().replace(/(js\/)/, "");
  },

  /**
   * addEvent
   * @return	{Void}
   */
  addEvent: function (elm, listener, fn) {
    try {
      elm.addEventListener(listener, fn, false);
    } catch (e) {
      elm.attachEvent("on" + listener, fn);
    }
  },

  /**
   * ready
   * equal to Kaas.addEvent(window, 'load', myfunc);
   * @return	{Void}
   */
  ready: function (fn) {
    this.addEvent(window, "load", fn);
  },

  /**
   * alerts
   * @return	{Function}
   */
  alerts: function () {
    var str = "";
    for (var i = 0, l = arguments.length; i < l; i++)
      str += i != 0 ? ", " + arguments[i] : arguments[i];
    return alert(str);
  },

  ie6BackgroundImageCache: function () {
    /*@cc_on   @if (@_win32) { document.execCommand("BackgroundImageCache", false, true) }   @end @*/
  },

  /**
   * ロードが始まってからbodyの読み込みが終わるまで一時的にスタイルを記述
   * @param	cssString:String - CSS
   * @example
   * Kaas.preloadStyle.init('#selector { display: none;}');
   * // スタイルを破棄
   * Kaas.preloadStyle.destroy();
   */
  preloadStyle: {
    element: null,
    init: function (cssString) {
      var wrap = document.createElement("div");
      var s = 'hackforIE<style type="text/css">';
      s += cssString;
      s += "</style>";
      wrap.innerHTML = s;
      Kaas.preloadStyle.element = document
        .getElementsByTagName("head")[0]
        .appendChild(wrap.lastChild);
    },
    destroy: function () {
      document
        .getElementsByTagName("head")[0]
        .removeChild(Kaas.preloadStyle.element);
    },
  },

  /**
   * pop up window
   */
  popup: {
    options: function (width, height) {
      return (
        "width=" +
        width +
        ", height=" +
        height +
        ", left=" +
        (screen.width - width) * 0.5 +
        ", top=" +
        ((screen.height - height) * 0.5 +
          ", status=no, scrollbars=no, directories=no, menubar=no, resizable=no, toolbar=no")
      );
    },
    open: function (target, name, width, height) {
      var t = Kaas.$(target);
      t.onclick = function (e) {
        window.open(
          this.getAttribute("href"),
          name,
          Kaas.popup.options(width, height)
        );
        return false;
      };
    },
  },

  /**
   * SWF埋め込み
   * @require swfobject.js
   * <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
   */
  embedSWF: {
    playerversion: "10.0",
    expressInstall: null,
    flashvars: {},
    params: {
      // allowScriptAccess: 'always',
      base: ".",
      bgcolor: "#FFFFFF",
      menu: "false",
      // wmode: 'transparent',
      // quality: 'best',
      scale: "noScale",
      salign: "TL",
    },
    attributes: {},
    init: function (swfurl, elementId, swfwidth, swfheight) {
      swfobject.embedSWF(
        swfurl,
        elementId,
        swfwidth,
        swfheight,
        this.playerversion,
        this.expressInstall,
        this.flashvars,
        this.params,
        this.attributes
      );
    },
  },

  /**
   * addIndexHTML
   */
  addIndexHTML: {
    init: function () {
      var loc = location.href;
      if (loc.indexOf("http") == 0 || loc.indexOf("ftp") == 0) return false;

      var a = document.getElementsByTagName("a");
      var lastS = /\/$/;
      var i,
        l = a.length;
      if (window.addEventListener) {
        for (i = 0; i < l; i++) {
          a[i].addEventListener(
            "click",
            function (e) {
              Kaas.addIndexHTML.onClick(this, lastS);
            },
            false
          );
        }
      } else {
        for (i = 0; i < l; i++) {
          a[i].attachEvent("onclick", function (e) {
            var t =
              e.srcElement.tagName == "IMG"
                ? e.srcElement.parentNode
                : e.srcElement;
            Kaas.addIndexHTML.onClick(t, lastS);
          });
        }
      }
    },
    onClick: function (t, regex) {
      if (!t.getAttribute("href")) return false;
      var h = t.getAttribute("href");
      var ex = h.indexOf("http") != 0;
      var ref = h.split("#");
      var len = ref.length;
      if (ex && h.match(regex)) t.href += "index.html";
      else if (ex && len > 1 && ref[0].match(regex))
        t.href = ref[0] + "index.html#" + ref[1];
      // Kaas.alerts(ex, e, t, t.tagName, t.href);
    },
  },

  /**
   * isVersion
   * @return	{Boolean}
   */
  isVersion: function (v) {
    return v === parseInt(this.ver.substring(0, 1));
  },

  /**
   * toString
   * @return	{String}
   */
  toString: function () {
    return "[object Kaas]";
  },
};

/**
 * Event Obsever
 * @return {Void}
 */
Kaas.observe = function (target, type, listener) {
  if (target.addEventListener) target.addEventListener(type, listener, false);
  else if (target.attachEvent)
    target.attachEvent("on" + type, function () {
      listener.call(target, window.event);
    });
  else
    target["on" + type] = function (e) {
      listener.call(target, e || window.event);
    };
};

/**
 * CSSの値を取得
 * @param  {Object} target - ELEMENT_NODE
 * @param  {String} prop
 * @return {String}
 */
Kaas.getStyle = function (target, prop) {
  var d = Kaas.d;
  if (target.currentStyle) {
    //IE
    return target.currentStyle[prop];
  } else if (d.defaultView.getComputedStyle) {
    return d.defaultView.getComputedStyle(target, null).getPropertyValue(prop);
  }
};

/**
 * Smooth scroll
 */
Kaas.scroll = function (selector, expr) {
  $(selector)
    .not(expr)
    .click(function (e) {
      var ease = Kaas.smoothScrollEase,
        time = Kaas.smoothScrollTime,
        hash = $(this.hash),
        h =
          window.innerHeight ||
          document.documentElement.clientHeight ||
          document.body.clientHeight;

      if (
        hash.length > 0 &&
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        if (e.preventDefault) e.preventDefault();
        else e.returnValue = false;

        var targetY = hash.offset().top - Kaas.smoothScrollOffsetY(),
          screenH = $("body").height() - h;
        $("html,body")
          .stop()
          .animate(
            {
              scrollTop: targetY < screenH ? targetY : screenH,
            },
            time,
            ease
          );
      }
    });
};

/**
 * クエリ取得
 */
function getQueryString() {
  var result = {};
  if (1 < window.location.search.length) {
    // 最初の1文字 (?記号) を除いた文字列を取得する
    var query = window.location.search.substring(1),
      // クエリの区切り記号 (&) で文字列を配列に分割する
      parameters = query.split("&"),
      i = 0,
      l = parameters.length,
      element,
      paramName,
      paramValue;

    for (; i < l; i++) {
      // パラメータ名とパラメータ値に分割する
      element = parameters[i].split("=");

      paramName = decodeURIComponent(element[0]);
      paramValue = decodeURIComponent(element[1]);

      // パラメータ名をキーとして連想配列に追加する
      result[paramName] = paramValue;
    }
  }
  return result;
}

//Kaas.preloadStyle.init('a[href*="entry"] { display: none;}');

Kaas.init();
