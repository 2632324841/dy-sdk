<?php
require 'vendor/autoload.php';
use Douyin\Douyin;
use Douyin\Factory;
use Douyin\Model\AccessToken;
use Douyin\Tools\DouyinDataCrypt;
use Douyin\Tools\Tools;

//PublicKey 
//appPublicKey
$obj = Douyin::Xcx(['appid'=>'asdsadas','secret'=>'safasfasfsf','isSandBox'=>false]);
var_dump($obj);

$data = $obj->login('sf72Bj0g4Xzh4dLfZ_TdtUJ_QiG7Bug3gCkkCeXWdLK-UNANLtG2OhSs5cXPxxmSfuN4dBhNLZyjnDCAh6Ri8kXupMPZ5PyBOiRjchPhniPeRHpjlSUEvmnqzAU');

// $data = $obj->generateLink('douyin',time() + 86400);
// $data = $obj->queryLinkQuota();
// $data = $obj->queryLinkQuota();

// $data = $obj->textCensor(['tasks'=>[['content'=>'草泥马'],['content'=>'坤坤'],['content'=>'及你太美'],['content'=>'鸡你太美']]]);

// $data = $obj->imageCensorV2(['image'=>'http://www.gzbhb.top/0079bcbac6ba0b223525cb3b201329251651452651.png']);
// $data = $obj->imageCensor(["targets"=> ["ad", "porn", "politics", "disgusting"], 'tasks'=>[['image_data'=>base64_encode(file_get_contents('C:\\Users\\Administrator\\Desktop\\tyg_thumb.jpg'))]]]);


// $obj = Douyin::Payment(['appid'=>'','secret'=>'','isSandBox'=>false, 'payment_salt'=>'', 'token'=>'']);
// $data = $obj->payment([
//     'out_order_no' => date('YmdHis'),
//     'total_amount' => 1,
//     'subject' => '测试支付',
//     'body' => '测试商品',
//     'valid_time' => 3600,
//     'notify_url' => 'https://www.baidu.cn'
// ]);


// $msg_signature = '52fff5f7a4bf4a921c2daf83c75cf0e716432c73';
// $msg = '{"timestamp":"1602507471","nonce":"797","msg":"{\"appid\":\"tt07e3715e98c9aac0\",\"cp_orderno\":\"out_order_no_1\",\"cp_extra\":\"\",\"way\":\"2\",\"payment_order_no\":\"2021070722001450071438803941\",\"total_amount\":9980,\"status\":\"SUCCESS\",\"seller_uid\":\"69631798443938962290\",\"extra\":\"null\",\"item_id\":\"\",\"order_id\":\"N71016888186626816\"}","msg_signature":"52fff5f7a4bf4a921c2daf83c75cf0e716432c73","type":"payment"}';
// $data = json_decode($msg, true);
// dump($data);
// $data = $obj->notifyUrl($data);
// dump($data);
// header("Content-type: image/jpg");
// echo $data;

//数据解码 一定要login后sessionKey 然后获取数据
// $encryptedData = '';
// $iv = '';
// $sessionKey = '';
// $DouyinDataCrypt = new DouyinDataCrypt('',$sessionKey);
// $signature = '';
// $data = $DouyinDataCrypt->decryptData($encryptedData, $iv, $signature);
// var_dump($data);