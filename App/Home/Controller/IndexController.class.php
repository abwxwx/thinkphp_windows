<?php
namespace Home\Controller;
use Think\Controller;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;


class IndexController extends Controller {
	
    public function index(){
		
		
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		
		$appId = 'wx8f39f3bea52b4a70';
		$token = "abwxwx";
		$encodingAESKey = "xvK813j7NbymjgiAYCxtUCgAOlYWhdZ0ak0dxyLB89Q";

		$server = new Server($appId, $token, $encodingAESKey);

		$server->on('event', 'subscribe', function($event) {
			error_log('收到关注事件，关注者openid: ' . $event['FromUserName']);
			
			return Message::make('text')->content('感谢您关注');
		});

		$server->on('event', 'unsubscribe', function($event) {
			error_log('取消关注事件，关注者openid: ' . $event['FromUserName']);
		});

		$server->on('message', function($message){
			return "您好！欢迎关注!";
		});

		// 您可以直接echo 或者返回给框架
		echo $server->serve();

        //$signin = U('index/signin', [], true, true);
        //$jspath = __DIR__."../View/Public/js/app.js";
        //$this->assign('signUrl', $signin)->assign('jsPath', $jspath);
        $this->display();
    }

    public function signin(){
        $this->display('signin');
    }
}