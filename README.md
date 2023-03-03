## 抖音sdk

```php
//简单的一个实例
require 'vendor/autoload.php';
use Douyin\Douyin;
//创建支付对象
$obj = Douyin::Payment(['appid'=>'','secret'=>'','isSandBox'=>false, 'payment_salt'=>'', 'token'=>'']);
//填写内容
$data = $obj->payment([
    'out_order_no' => date('YmdHis'),
    'total_amount' => 1,
    'subject' => '测试支付',
    'body' => '测试商品',
    'valid_time' => 3600,
    'notify_url' => 'https://bhb.gze9.cn/app/api/test'
]);
// or 创建小程序对象
$obj = Douyin::Xcx(['appid'=>'','secret'=>'','isSandBox'=>false]);
//登录
//string $code = null, string $anonymous_code = null 二选一
$data = $obj->login('sf72Bj0g4Xzh4dLfZ_TdtUJ_QiG7Bug3gCkkCeXWdLK-UNANLtG2OhSs5cXPxxmSfuN4dBhNLZyjnDCAh6Ri8kXupMPZ5PyBOiRjchPhniPeRHpjlSUEvmnqzAU');
//文本检测
$data = $obj->textCensor(['tasks'=>[['content'=>'卧槽'],['content'=>'坤坤'],['content'=>'及你太美'],['content'=>'鸡你太美']]]);
//数据解码 一定要login后sessionKey 然后获取数据
$encryptedData = '';
$iv = '';
$sessionKey = '';
$DouyinDataCrypt = new DouyinDataCrypt('',$sessionKey);
$signature = '';
$data = $DouyinDataCrypt->decryptData($encryptedData, $iv, $signature);
var_dump($data);
```
