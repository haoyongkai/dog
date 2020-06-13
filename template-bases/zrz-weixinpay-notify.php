<?php
$type = zrz_wx_pay_type();

// 囤主题 www.tzhuti.com   如果启用了微信官方支付
if($type == 'weixin'){
    require ZRZ_THEME_DIR . '/inc/SDK/PayAll/init.php';
    // 囤主题 www.tzhuti.com    加载配置参数
    $config = require(ZRZ_THEME_DIR . '/inc/SDK/PayConfig.php');

    $pay = new Pay\Pay($config);
    $notifyInfo = $pay->driver('wechat')->gateway('scan')->verify(file_get_contents('php:// 囤主题 www.tzhuti.com   input'));
    // 囤主题 www.tzhuti.com    支付通知数据获取成功
    if ($notifyInfo['result_code'] == 'SUCCESS' && $notifyInfo['return_code'] == 'SUCCESS') {
        $order_no = $notifyInfo['out_trade_no'];
        zrz_notify_data_update($order_no,$notifyInfo['total_fee']/100);
    }
    echo 'success';
    exit;
}

// 囤主题 www.tzhuti.com   如果启用了 payjs 支付
if($type == 'payjs'){
    $return_code = isset($_POST['return_code']) ? $_POST['return_code'] : '';
    if($return_code == 1){

        $_POST = array_map('stripslashes_deep', $_POST);
        $sign = isset($_POST['sign']) ? $_POST['sign'] : '';
        $total_fee = isset($_POST['total_fee']) ? $_POST['total_fee'] : '';
        $out_trade_no = isset($_POST['out_trade_no']) ? $_POST['out_trade_no'] : '';

        // 囤主题 www.tzhuti.com   验证签名
        unset($_POST['sign']);
        ksort($_POST);
        $sign_d = strtoupper(md5(urldecode(http_build_query($_POST)).'&key='.zrz_get_pay_settings('weixinpay','key')));

        if($sign_d == $sign){
            // 囤主题 www.tzhuti.com   更新订单数据
            zrz_notify_data_update($out_trade_no,$total_fee/100);
            header("HTTP/1.1 200 OK");
            die();
        }
    }
    die();
}

// 囤主题 www.tzhuti.com   如果是有赞支付
if($type == 'youzan'){
   $client_id = zrz_get_pay_settings('youzan','client_id'); // 囤主题 www.tzhuti.com   应用的 client_id
   $client_secret = zrz_get_pay_settings('youzan','client_secret'); // 囤主题 www.tzhuti.com   应用的 client_secret
   $kdt_id = zrz_get_pay_settings('youzan','kdt_id'); // 囤主题 www.tzhuti.com    有赞微小店ID

   $json = file_get_contents('php:// 囤主题 www.tzhuti.com   input');
// 囤主题 www.tzhuti.com       update_user_meta(1,'youzan_json2',$json);
   if (!$json) {
       die();
   }

   $data = json_decode($json, true);
   // 囤主题 www.tzhuti.com   update_user_meta(1,'youzan_data2', $data);
   // 囤主题 www.tzhuti.com   判断消息是否合法
   $msg = $data['msg'];
   $sign_string = $client_id.''.$msg.''.$client_secret;
   $sign = md5($sign_string);

   if ($sign != $data['sign']) {
       die();
   }

   // 囤主题 www.tzhuti.com   解码
   $msg = json_decode(urldecode($msg), true);

   $order_info = $msg['full_order_info'];

   $order_info = $order_info['order_info'];

   $is_payed = $order_info['order_tags'];
   // 囤主题 www.tzhuti.com   update_user_meta(1,'youzan_msg2', $msg);
   // 囤主题 www.tzhuti.com   判断类型
   if ($is_payed['is_payed'] != true) {
       die();
   }

   $tid = $order_info['tid'];

   // 囤主题 www.tzhuti.com    获取订单详情
   require_once ZRZ_THEME_DIR.'/inc/SDK/Youzan/YZGetTokenClient.php';
   require_once ZRZ_THEME_DIR.'/inc/SDK/Youzan/YZTokenClient.php';
   $token_client = new YZGetTokenClient($client_id, $client_secret);

   $keys = array(
       'grant_type' => 'silent',
       'kdt_id' => intval($kdt_id),
   );
   $token = $token_client->get_token('self', $keys);

   $client = new YZTokenClient($token['access_token']);

   $params = array(
       'tid' => $tid,
   );

   $resp = $client->post('youzan.trade.get', '3.0.0', $params);
   // 囤主题 www.tzhuti.com   update_user_meta(1,'youzan_resp2', $resp);
   $trade = $resp['response']['trade'];
   $qr_id = $trade['qr_id'];
   $payment = $trade['payment'];
   $status = $order_info['status'];
   if($status == 'TRADE_PAID' || $status == 'TRADE_SUCCESS'){
       $resout = zrz_notify_data_update($qr_id,$payment);
       if($resout){
           echo '{"code":0,"msg":"success"}';
           exit;
       }
   }
}
