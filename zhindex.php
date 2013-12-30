<?php
//define("TOKEN", "zhfkelitina888");//自己定义的token 就是个通信的私钥
include_once('pub.class.php');//引用刚定义的微信消息处理类<br>define("TOKEN", "mmhelper");<br>define('DEBUG', true);
$weixin = new Weixin("TOKEN", "zhfkelitina888");//实例化
$weixin->getMsg();
$type = $weixin->msgtype;//消息类型
$username = $weixin->msg['FromUserName'];//哪个用户给你发的消息,这个$username是微信加密之后的，但是每个用户都是一一对应的
if ($type==='text') {
    if ($weixin->msg['Content']=='Hello2BizUser') {//微信用户第一次关注你的账号的时候，你的公众账号就会受到一条内容为'Hello2BizUser'的消息
        $reply = $weixin->makeText('欢迎北京中汇福美丽管理会所');
    }else{//这里就是用户输入了文本信息
        $keyword = $weixin->msg['Content'];   //用户的文本消息内容
		//include_once("chaxun.php");//文本消息 调用查询程序  
		//$chaxun= new chaxun(DEBUG,$keyword,$username);
		//$results['items'] =$chaxun->search();//查询的代码
	 	
		//$reply = $weixin->makeNews($results);
		
		 if($keyword == "?" || $keyword == "？")
            {
                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s",time());
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        }elseif($keyword==1){
			include_once("chaxun.php");//文本消息 调用查询程序  
			$nrecord= new chaxun();
			$results['items']=$nrecord->getArr();
			$reply = $weixin->makeNews($results);
		getArr
		}
		
		else{
            echo "";
            exit;
        }
		
    }
}elseif ($type==='location') {
      //用户发送的是位置信息  稍后的文章中会处理                  
}elseif ($type==='image') {
      //用户发送的是图片 稍后的文章中会处理
}elseif ($type==='voice') {     
      //用户发送的是声音 稍后的文章中会处理
}
$weixin->reply($reply);

?>
