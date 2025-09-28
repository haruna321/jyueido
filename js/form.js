jQuery(function($) {
	var d = document,
		q = getQueryString(),
		form = $('#form');

	/**
	 * Datetime picker
	 */
	if (d.querySelectorAll('.datetimepicker').length > 0) {
		var today = moment();
		$('.datetimepicker').datetimepicker({
			locale: 'ja',
			daysOfWeekDisabled: [ 2 ],
			disabledDates: [
				'2018-12-29',
				'2018-12-30',
				'2018-12-31',
				'2019-01-01',
				'2019-01-02',
				'2019-01-03'
			],
			defaultDate: null,
			minDate: moment().add(2, 'days'),
			showClear: true,
			showClose: true,
			// debug: true,
			format: 'YYYY/MM/DD'
		});
	}

	/**
	 * 個人情報保護方針に同意します
	 */
	var s = $('#btn-submit'),
		t = $('#trigger-submit').find('input[type="checkbox"]');

	t.prop('checked', false);
	
	t.change(function(e) {
		s.prop( 'disabled', !( $(this).is(':checked') ) );
	});


	/**
	 * 生年月日をまとめる
	 */
	var b = $('#c-birthday'),
		y = $('#c-birthday-y'),
		m = $('#c-birthday-m'),
		d = $('#c-birthday-d'),
		c = $('#c-birthday-container'),

		setDate = function(input) {
			input.on('change', function() {
				setBirthday();
			});
		},

		setBirthday = function() {
			b.val(y.val() + '年' + m.val() + '月' + d.val() + '日');
		};

	setBirthday();
	setDate(y);
	setDate(m);
	setDate(d);

	/**
	 * Check file sizes
	 */
	var sizes = 0,
		sizeText = $('#display-size-container'),
		files = $('#files-container .file'),
		maxsize = 5000000,
		messages = 'ファイルサイズがオーバーしています（合計5MB以内）',
		getFileSize = function() {
			sizes = 0;
			files.each(function(i, e) {
				var f = e.files[0];
				if (f) {
					sizes += f.size;
				}
			});

			return sizes;
		},
		displayFileSize = function() {
			sizeText.text('合計サイズ : ' + (getFileSize() * .000001).toFixed(2) + 'MB');
		},
		checkFileSize = function() {
			sizes = getFileSize();
			displayFileSize();
			// console.log(sizes);
			return sizes < maxsize;
		};

	$('.file').on('change', displayFileSize);

	// $('.btn-cancel').on('click', function(e) {
	// 	$(this).prev().val('');
	// })

	/**
	 * Validation
	 */
	// 数字とハイフンのみの場合OK
	$.validator.addMethod('phone', function(value, element) {
		return this.optional(element) || /^[\d,-]+$/.test(value);
	}, '数字を入力して下さい');
	
	$.validator.addMethod("katakana", function(value, element) {
		return this.optional(element) || /^([ァ-ヶー]+)$/.test(value);
		}, "<br/>全角カタカナを入力してください"
	);

	$.validator.addMethod("filesize", function(value, element) {
		return this.optional(element) || checkFileSize();
		}, messages
	);


	form.validate({
		errorClass: 'validate-error',
		rules: {
			_email2: {
				equalTo: "#c-email-1"
			}
		},
		groups: {
			birthday: '生年月日:年 生年月日:月 生年月日:日',
			files: 'clip-1 clip-2 clip-3'
		},
		ignore: '#trigger-submit input',
		errorPlacement: function(error, element) {
			var e = $(element);
			if (e.data('error-parent')) {
				e.closest('.' + e.data('error-parent')).append(error);
			} else {
				e.parent().addClass('validate-error-container').append(error);
			}
		}
	});
});
