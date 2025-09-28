/**
 * Cookieの取得、書き込み、削除
 * @version 1.0 - 0:17 2009/03/28
 */

Kaas.cookie = {
	
	/**
	 * Cookieを取得
	 * @param name
	 */
	get: function (name) {
		var start = document.cookie.indexOf(name + '=');
		var len = start + name.length + 1;
		if (!start && name != document.cookie.substring(0, name.length)) {
			return null;
		}
		if (start == -1) return null;
		var end = document.cookie.indexOf(';', len);
		if (end == -1) end = document.cookie.length;
		
		return unescape(document.cookie.substring(len, end));
	},
	
	/**
	 * Cookieを書き込む
	 * @param name
	 * @param value
	 * @param expires
	 * @param path
	 * @param domain
	 * @param secure
	 */
	set: function (name, value, expires, path, domain, secure) {
		var today = new Date();
		today.setTime(today.getTime());
		if (expires) {
			expires = expires * 1000 * 60 * 60 * 24;
		}
		var expires_date = new Date(today.getTime() + (expires));
		document.cookie = name+'='+escape(value) +
			((expires) ? ';expires='+expires_date.toGMTString() : '') + //expires.toGMTString()
			((path) ? ';path=' + path : '') +
			((domain) ? ';domain=' + domain : '') +
			((secure) ? ';secure' : '');
	},
	
	/**
	 * Cookieを削除
	 * @param name
	 * @param path
	 * @param domain
	 */
	destory: function (name, path, domain) {
		if (this.get(name)) document.cookie = name + '=' + ((path) ? ';path=' + path : '') + ((domain) ? ';domain=' + domain : '') + ';expires=Thu, 01-Jan-1970 00:00:01 GMT';
	}

};
