# NetEaseIM 网易云信Laravel API

Laravel5.5>网易云IM接口

完成了以下接口

- 用户ID
- 用户名名片
- 用户设置
- 用户关系托管
- 消息功能
- 群组功能
- 聊天室
- 历史记录
- 短信

这是我写给自己用的，没有测试全部接口。

文档API [https://shankesgk2.github.io/netease-im/](https://shankesgk2.github.io/netease-im/)

### Installation

###### Composer

`composer require shankesgk2/netease-im`

##### Laravel

&gt;=laravel5.5

ServiceProvider will be attached automatically


##### Other
I don't know

###### Publish Configuration
`php artisan vendor:publish --provider "shankesgk2\NetEaseIM\NetEaseIMServiceProvider"`

在`.env`文字中配置`NETEASEIM_APPKEY`和`NETEASEIM_APPSECRET`

或者在`config/neteaseim.php`中配置`appKey`和`appSecret`

##### Usage

`use shankesgk2\NetEaseIM\NetEaseIM;`

`$im = new NetEaseIM();`

`$send = $im->messageSendTxtMsgToUser('from accid', 'to accid', '消息内容', '推送内容');`



###### 使用Facades

`use shankesgk2\NetEaseIM\Facade\NetEaseIM;`

`NetEaseIM::messageSendTxtMsgToUser('from accid', 'to accid', '消息内容', '推送内容');`