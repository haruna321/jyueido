#!/usr/bin/perl

#┌─────────────────────────────────
#│ CLIP MAIL : check.cgi - 2015/01/29
#│ copyright (c) KentWeb, 1997-2015
#│ http://www.kent-web.com/
#└─────────────────────────────────

# モジュール宣言
use strict;
use CGI::Carp qw(fatalsToBrowser);
use lib './lib';

# 外部ファイル取り込み
require './init.cgi';
my %cf = set_init();

print <<EOM;
Content-type: text/html; charset=$cf{charset}

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=$cf{charset}">
<title>Check Mode</title>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K9VKVGR');</script>
<!-- End Google Tag Manager -->
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9VKVGR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<b>Check Mode: [ $cf{version} ]</b>
<ul>
<li>Perlバージョン : $]
EOM

# sendmailチェック
print "<li>sendmailパス : ";
if (-e $cf{sendmail}) {
	print "OK\n";
} else {
	print "NG → $cf{sendmail}\n";
}

# ディレクトリ
if (-d $cf{upldir}) {
	print "<li>一時ディレクトリパス : OK\n";

	if (-r $cf{upldir} && -w $cf{upldir} && -x $cf{upldir}) {
		print "<li>一時ディレクトリパーミッション : OK\n";
	} else {
		print "<li>一時ディレクトリパーミッション : NG\n";
	}
} else {
	print "<li>一時ディレクトリパス : NG\n";
}

# ログファイル
my %log = (logfile => 'ログファイル', sesfile => 'セッションファイル');
foreach ( keys %log ) {
	if (-f $cf{$_}) {
		print "<li>$log{$_}パス : OK\n";

		if ($_ ne 'base64') {
			if (-r $cf{$_} && -w $cf{$_}) {
				print "<li>$log{$_}パーミッション : OK\n";
			} else {
				print "<li>$log{$_}パーミッション : NG\n";
			}
		}
	} else {
		print "<li>$log{$_}パス : NG\n";
	}
}

# テンプレート
foreach (qw(conf.html error.html thanks.html mail.txt reply.txt)) {
	print "<li>テンプレートパス ( $_ ) : ";

	if (-f "$cf{tmpldir}/$_") {
		print "OK\n";
	} else {
		print "NG\n";
	}
}

print <<EOM;
</ul>
</body>
</html>
EOM
exit;


