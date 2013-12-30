<?php
class shownews
{
public function search(){
       $record=array();  //定义返回结果的数组
       $list = $this->search($this->keyword);//普通的根据关键词查询数据库的操作  代码就不用分享了
　　　　if(is_array($list)&&!empty($list)){                 
               foreach($list as $msg){ 
　　　　　　　　　　　　　　　　$record[]=array(//以下代码，将数据库中查询返回的数组格式化为微信返回消息能接收的数组形式，即title、description、picurl、url 详见微信官方的文档描述
                    'title' =>$msg['title'],
                    'description' =>$msg['discription'],
                    'picurl' => $msg['pic_url'],
                    'url' =>$msg['url']
                );
				　　　　　　　　}
				}
				return $record;
				}
				
	public function getArr(){
		$Newrecord=array();  //定义返回结果的数组
		$record[]=array(
                    'title' =>'康施娜细胞膳食营养代餐包 ',
                    'description' =>'让肌肤自然净白透亮的秘密 以天然成分为本，经过科学萃取，让黯沉肌肤容光焕发。',
                    'picurl' => 'http://www.zhfswkj.com/files/news_pic/news_846_1386735045.jpg',
                    'url' =>'http://www.zhfswkj.com/php/cp_list.php?lxid=149'
                );
		return $record;
	}
}
?>
