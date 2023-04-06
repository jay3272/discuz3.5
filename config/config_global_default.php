<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config_global_default.php 36362 2017-02-04 02:02:03Z nemohou $
 */

$_config = array();

// 提示：自當前版本起，本文件不支持調用系統內任何變量或函數，請依賴此行為的站點修正實現 //

// ----------------------------  CONFIG DB  ----------------------------- //
// ----------------------------  數據庫相關設置---------------------------- //

/**
 * 數據庫主服務器設置, 支持多組服務器設置, 當設置多組服務器時, 則會根據分佈式策略使用某個服務器
 * @example
 * $_config['db']['1']['dbhost'] = 'localhost'; // 服務器地址
 * $_config['db']['1']['dbuser'] = 'root'; // 用戶
 * $_config['db']['1']['dbpw'] = 'root';// 密碼
 * $_config['db']['1']['dbcharset'] = 'gbk';// 字符集
 * $_config['db']['1']['pconnect'] = '0';// 是否持續連接
 * $_config['db']['1']['dbname'] = 'x1';// 數據庫
 * $_config['db']['1']['tablepre'] = 'pre_';// 表名前綴
 *
 * $_config['db']['2']['dbhost'] = 'localhost';
 * ...
 *
 */
$_config['db'][1]['dbhost']  		= '127.0.0.1';
$_config['db'][1]['dbuser']  		= 'root';
$_config['db'][1]['dbpw'] 	 	= '';
$_config['db'][1]['dbcharset'] 		= 'utf8mb4';
$_config['db'][1]['pconnect'] 		= 0;
$_config['db'][1]['dbname']  		= 'ultrax';
$_config['db'][1]['tablepre'] 		= 'pre_';

/**
 * 數據庫從服務器設置( slave, 只讀 ), 支持多組服務器設置, 當設置多組服務器時, 系統根據每次隨機使用
 * @example
 * $_config['db']['1']['slave']['1']['dbhost'] = 'localhost';
 * $_config['db']['1']['slave']['1']['dbuser'] = 'root';
 * $_config['db']['1']['slave']['1']['dbpw'] = 'root';
 * $_config['db']['1']['slave']['1']['dbcharset'] = 'gbk';
 * $_config['db']['1']['slave']['1']['pconnect'] = '0';
 * $_config['db']['1']['slave']['1']['dbname'] = 'x1';
 * $_config['db']['1']['slave']['1']['tablepre'] = 'pre_';
 * $_config['db']['1']['slave']['1']['weight'] = '0'; //權重：數據越大權重越高
 *
 * $_config['db']['1']['slave']['2']['dbhost'] = 'localhost';
 * ...
 *
 */
$_config['db']['1']['slave'] = array();

//啟用從服務器的開關
$_config['db']['slave'] = false;
/**
 * 數據庫 分佈部署策略設置
 *
 * @example 將 common_member 部署到第二服務器, common_session 部署在第三服務器, 則設置為
 * $_config['db']['map']['common_member'] = 2;
 * $_config['db']['map']['common_session'] = 3;
 *
 * 對於沒有明確聲明服務器的表, 則一律默認部署在第一服務器上
 *
 */
$_config['db']['map'] = array();

/**
 * 數據庫 公共設置, 此類設置通常對針對每個部署的服務器
 */
$_config['db']['common'] = array();

/**
 *  禁用從數據庫的數據表, 表名字之間使用逗號分割
 *
 * @example common_session, common_member 這兩個表僅從主服務器讀寫, 不使用從服務器
 * $_config['db']['common']['slave_except_table'] = 'common_session, common_member';
 *
 */
$_config['db']['common']['slave_except_table'] = '';

/*
 * 數據庫引擎，根據自己的數據庫引擎進行設置，3.5之後默認為innodb，之前為myisam
 * 對於從3.4升級到3.5，並且沒有轉換數據庫引擎的用戶，在此設置為myisam
 */
$_config['db']['common']['engine'] = 'innodb';

/**
 * 內存服務器優化設置
 * 以下設置需要PHP擴展組件支持，其中 memcache 優先於其他設置，
 * 當 memcache 無法啟用時，會自動開啟另外的兩種優化模式
 */

//內存變量前綴, 可更改,避免同服務器中的程序引用錯亂
$_config['memory']['prefix'] = 'discuz_';

/* Redis設置, 需要PHP擴展組件支持, timeout參數的作用沒有查證 */
$_config['memory']['redis']['server'] = '';
$_config['memory']['redis']['port'] = 6379;
$_config['memory']['redis']['pconnect'] = 1;
$_config['memory']['redis']['timeout'] = 0;
$_config['memory']['redis']['requirepass'] = '';
$_config['memory']['redis']['db'] = 0;				//這裡可以填寫0到15的數字，每個站點使用不同的db
/**
 * 此配置現在已經取消，默認對array使用php serializer進行編碼保存，其它數據直接原樣保存 
 */
// $_config['memory']['redis']['serializer'] = 1;

$_config['memory']['memcache']['server'] = '';			// memcache 服務器地址
$_config['memory']['memcache']['port'] = 11211;			// memcache 服務器端口
$_config['memory']['memcache']['pconnect'] = 1;			// memcache 是否長久連接
$_config['memory']['memcache']['timeout'] = 1;			// memcache 服務器連接超時

$_config['memory']['memcached']['server'] = '';			// memcached 服務器地址
$_config['memory']['memcached']['port'] = 11211;		// memcached 服務器端口


$_config['memory']['apc'] = 0;							// 啟動對 APC 的支持
$_config['memory']['apcu'] = 0;							// 啟動對 APCu 的支持
$_config['memory']['xcache'] = 0;						// 啟動對 xcache 的支持
$_config['memory']['eaccelerator'] = 0;					// 啟動對 eaccelerator 的支持
$_config['memory']['wincache'] = 0;						// 啟動對 wincache 的支持
$_config['memory']['yac'] = 0;     						//啟動對 YAC 的支持
$_config['memory']['file']['server'] = '';				// File 緩存存放目錄，如設置為 data/cache/filecache ，設置後啟動 File 緩存
// 服務器相關設置
$_config['server']['id']		= 1;			// 服務器編號，多webserver的時候，用於標識當前服務器的ID

// 附件下載相關
//
// 本地文件讀取模式; 模式2為最節省內存方式，但不支持多線程下載
// 如需附件URL地址、媒體附件播放，需選擇支持Range參數的讀取模式1或4，其他模式會導致部分瀏覽器下視頻播放異常
// 1=fread 2=readfile 3=fpassthru 4=fpassthru+multiple
$_config['download']['readmod'] = 2;

// 是否啟用 X-Sendfile 功能（需要服務器支持）0=close 1=nginx 2=lighttpd 3=apache
$_config['download']['xsendfile']['type'] = 0;

// 啟用 nginx X-sendfile 時，論壇附件目錄的虛擬映射路徑，請使用 / 結尾
$_config['download']['xsendfile']['dir'] = '/down/';

// 頁面輸出設置
$_config['output']['charset'] 			= 'utf-8';	// 頁面字符集
$_config['output']['forceheader']		= 1;		// 強制輸出頁面字符集，用於避免某些環境亂碼
$_config['output']['gzip'] 			= 0;		// 是否採用 Gzip 壓縮輸出
$_config['output']['tplrefresh'] 		= 1;		// 模板自動刷新開關 0=關閉, 1=打開
$_config['output']['language'] 			= 'zh_tw';	// 頁面語言 zh_cn/zh_tw
$_config['output']['staticurl'] 		= 'static/';	// 站點靜態文件路徑，「/」結尾
$_config['output']['ajaxvalidate']		= 0;		// 是否嚴格驗證 Ajax 頁面的真實性 0=關閉，1=打開
$_config['output']['upgradeinsecure']		= 0;		// 在HTTPS環境下請求瀏覽器升級HTTP內鏈到HTTPS，此選項影響外域資源鏈接且與自定義CSP衝突 0=關閉(默認)，1=打開
$_config['output']['css4legacyie']		= 1;		// 是否加載兼容低版本IE的css文件 0=關閉，1=打開（默認），關閉可避免現代瀏覽器加載不必要的數據，但IE6-8的顯示效果會受較大影響，IE9受較小影響。

// COOKIE 設置
$_config['cookie']['cookiepre'] 		= 'discuz_'; 	// COOKIE前綴
$_config['cookie']['cookiedomain'] 		= ''; 		// COOKIE作用域
$_config['cookie']['cookiepath'] 		= '/'; 		// COOKIE作用路徑

// 站點安全設置
$_config['security']['authkey']			= 'asdfasfas';	// 站點加密密鑰
$_config['security']['urlxssdefend']		= true;		// 自身 URL XSS 防禦
$_config['security']['attackevasive']		= 0;		// CC 攻擊防禦 1|2|4|8
$_config['security']['onlyremoteaddr']		= 1;		// 用戶IP地址獲取方式 0=信任HTTP_CLIENT_IP、HTTP_X_FORWARDED_FOR(默認) 1=只信任 REMOTE_ADDR(推薦)
								// 考慮到防止IP撞庫攻擊、IP限制策略失效的風險，建議您設置為1。使用CDN的用戶可以配置ipgetter選項
								// 安全提示：由於UCenter、UC_Client獨立性原因，您需要單獨在兩個應用內定義常量，從而開啟功能

$_config['security']['useipban']			= 1;		// 是否開啟允許/禁止IP功能，高負載站點可以將此功能疏解至HTTP Server/CDN/SLB/WAF上，降低服務器壓力
$_config['security']['querysafe']['status']	= 1;		// 是否開啟SQL安全檢測，可自動預防SQL注入攻擊
$_config['security']['querysafe']['dfunction']	= array('load_file','hex','substring','if','ord','char');
$_config['security']['querysafe']['daction']	= array('@','intooutfile','intodumpfile','unionselect','(select', 'unionall', 'uniondistinct');
$_config['security']['querysafe']['dnote']	= array('/*','*/','#','--','"');
$_config['security']['querysafe']['dlikehex']	= 1;
$_config['security']['querysafe']['afullnote']	= 0;

$_config['security']['creditsafe']['second'] 	= 0;		// 開啟用戶積分信息安全，可防止並發刷分，滿足 times(次數)/second(秒) 的操作無法提交
$_config['security']['creditsafe']['times'] 	= 10;

$_config['security']['fsockopensafe']['port']	= array(80, 443);	//fsockopen 有效的端口
$_config['security']['fsockopensafe']['ipversion']	= array('ipv6', 'ipv4');	//fsockopen 有效的IP協議
$_config['security']['fsockopensafe']['verifypeer']	= false;	// fsockopen是否驗證證書有效性，開啟可提升安全性，但需自行解決證書配置問題

$_config['security']['error']['showerror'] = '1';	//是否在數據庫或系統嚴重異常時顯示錯誤詳細信息，0=不顯示(更安全)，1=顯示詳細信息(默認)，2=只顯示錯誤本身
$_config['security']['error']['guessplugin'] = '1';	//是否在數據庫或系統嚴重異常時猜測可能報錯的插件，0=不猜測，1=猜測(默認)

$_config['admincp']['founder']			= '1';		// 站點創始人：擁有站點管理後台的最高權限，每個站點可以設置 1名或多名創始人
								// 可以使用uid，也可以使用用戶名；多個創始人之間請使用逗號「,」分開;
$_config['admincp']['forcesecques']		= 0;		// 管理人員必須設置安全提問才能進入系統設置 0=否, 1=是[安全]
$_config['admincp']['checkip']			= 1;		// 後台管理操作是否驗證管理員的 IP, 1=是[安全], 0=否。僅在管理員無法登陸後台時設置 0。
$_config['admincp']['runquery']			= 0;		// 是否允許後台運行 SQL 語句 1=是 0=否[安全]
$_config['admincp']['dbimport']			= 1;		// 是否允許後台恢復論壇數據  1=是 0=否[安全]
$_config['admincp']['mustlogin']		= 1;		// 是否必須前台登錄後才允許後台登錄  1=是[安全] 0=否

/**
 * 系統遠程調用功能模塊
 */

// 遠程調用: 總開關 0=關  1=開
$_config['remote']['on'] = 0;

// 遠程調用: 程序目錄名. 出於安全考慮,您可以更改這個目錄名, 修改完畢, 請手工修改程序的實際目錄
$_config['remote']['dir'] = 'remote';

// 遠程調用: 通信密鑰. 用於客戶端和本服務端的通信加密. 長度不少於 32 位
//          默認值是 $_config['security']['authkey']	的 md5, 您也可以手工指定
$_config['remote']['appkey'] = md5($_config['security']['authkey']);

// 遠程調用: 開啟外部 cron 任務. 系統內部不再執行cron, cron任務由外部程序激活
$_config['remote']['cron'] = 0;

// $_GET|$_POST的兼容處理，0為關閉，1為開啟；開啟後即可使用$_G['gp_xx'](xx為變量名，$_GET和$_POST集合的所有變量名)，值為已經addslashes()處理過
// 考慮到安全風險，自X3.5版本起本開關恢復默認值為0的設定，後續版本可能取消此功能，請各位開發人員注意
$_config['input']['compatible'] = 0;

/**
 * IP數據庫擴展
 * $_config['ipdb']下除setting外均可用作自定義擴展IP庫設置選項，也歡迎大家PR自己的擴展IP庫。
 * 擴展IP庫的設置，請使用格式：
 * 		$_config['ipdb']['擴展ip庫名稱']['設置項名稱'] = '值';
 * 比如：
 * 		$_config['ipdb']['redis_ip']['server'] = '172.16.1.8';
 */
$_config['ipdb']['setting']['fullstack'] = '';	// 系統使用的全棧IP庫，優先級最高
$_config['ipdb']['setting']['default'] = '';	// 系統使用的默認IP庫，優先級最低
$_config['ipdb']['setting']['ipv4'] = 'tiny';	// 系統使用的默認IPv4庫，留空為使用默認庫
$_config['ipdb']['setting']['ipv6'] = 'v6wry'; // 系統使用的默認IPv6庫，留空為使用默認庫

/**
 * IP獲取擴展
 * 考慮到不同的CDN服務供應商提供的判斷CDN源IP的策略不同，您可以定義自己服務供應商的IP獲取擴展。
 * 為空為使用默認體系，非空情況下會自動調用source/class/ip/getter_值.php內的get方法獲取IP地址。
 * 系統提供dnslist(IP反解析域名白名單)、serverlist(IP地址白名單，支持CIDR)、header擴展，具體請參考擴展文件。
 * 性能提示：自帶的兩款工具由於依賴RDNS、CIDR判定等操作，對系統效率有較大影響，建議大流量站點使用HTTP Server
 * 或CDN/SLB/WAF上的IP黑白名單等邏輯實現CDN IP地址白名單，隨後使用header擴展指定服務商提供的IP頭的方式實現。
 * 安全提示：由於UCenter、UC_Client獨立性及擴展性原因，您需要單獨修改相關文件的相關業務邏輯，從而實現此類功能。
 * $_config['ipgetter']下除setting外均可用作自定義IP獲取模型設置選項，也歡迎大家PR自己的擴展IP獲取模型。
 * 擴展IP獲取模型的設置，請使用格式：
 * 		$_config['ipgetter']['IP獲取擴展名稱']['設置項名稱'] = '值';
 * 比如：
 * 		$_config['ipgetter']['onlinechk']['server'] = '100.64.10.24';
 */
$_config['ipgetter']['setting'] = 'header';
$_config['ipgetter']['header']['header'] = 'HTTP_X_FORWARDED_FOR';
$_config['ipgetter']['iplist']['header'] = 'HTTP_X_FORWARDED_FOR';
$_config['ipgetter']['iplist']['list']['0'] = '127.0.0.1';
$_config['ipgetter']['dnslist']['header'] = 'HTTP_X_FORWARDED_FOR';
$_config['ipgetter']['dnslist']['list']['0'] = 'comsenz.com';

// Addon Setting
//$_config['addonsource'] = 'xx1';
//$_config['addon'] = array(
//    'xx1' => array(
//	'website_url' => 'http://127.0.0.1/AppCenter',
//	'download_url' => 'http://127.0.0.1/AppCenter/index.php',
//	'download_ip' => '',
//	'check_url' => 'http://127.0.0.1/AppCenter/?ac=check&file=',
//	'check_ip' => ''
//    )
//);

?>