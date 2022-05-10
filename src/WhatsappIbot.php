<?php
namespace Maree\WhatsappIbot;

use Illuminate\Support\Facades\Http;

class WhatsappIbot {
    //Create a new Instance ID
    // Params
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function CreateInstance(){
        $url = 'https://ibot.social/api/createinstance.php?access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }

    // Display QR code to login to Whatsapp web. You can get the results returned via Webhook
    // Params
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function GetQRCode(){
        $url = 'https://ibot.social/api/getqrcode.php?instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }    

    // Get all return values from Whatsapp. Like connection status, Incoming message, Outgoing message, Disconnected, Change Battery,...
    // Params
    // webhook_url https://webhook.site/1b25464d6833784f96eef4xxxxxxxxxx
    // enable  true
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function RecevingWebhook($webhook_url = 'https://webhook.site/1b25464d6833784f96eef4xxxxxxxxxx'){
        $url = 'https://ibot.social/api/setwebhook.php?webhook_url='.$webhook_url.'&enable=true&instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }    

    // Logout Whatsapp web and do a fresh scan
    // Params
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function RebootInstance() 
    {
        $url = 'https://ibot.social/api/reboot.php?instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }

    // This will logout Whatsapp web, Change Instance ID, Delete all old instance data
    // Params
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function ResetInstance() 
    {
        $url = 'https://ibot.social/api/resetinstance.php?instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }

    // Re-initiate connection from app to Whatsapp web when lost connection
    // Params
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function Reconnect() 
    {
        $url = 'https://ibot.social/api/reconnect.php?instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }


    // Send a text message to a phone number through the app
    // Params
    // number  84933313xxx
    // type  text
    // message test message
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function SendTextMessage($number = '',$message = '') 
    {
        $url = 'https://ibot.social/api/send.php?number='.$number.'&type=text&message='.$message.'&instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }

    // Send a media or file with message to a phone number through the app
    // Params
    // number  84933313xxx
    // type  media
    // message test message
    // media_url https://i.pravatar.cc
    // filename (Just use for send document) file_test.pdf
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function SendMediaMessage($number = '',$message = '',$media_url = '',$filename = '') 
    {
        $url = 'https://ibot.social/api/send.php?number='.$number.'&type=media&message='.$message.'&media_url='.$media_url.'&filename='.$filename.'&instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }


    // Send a text message to a group through the app
    // Params
    // group_id  84987694574-1618740914@g.us
    // type  text
    // message test message
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function SendTextMessageGroup($group_id = '',$message = '') 
    {
        $url = 'https://ibot.social/api/sendgroupmsg.php?group_id='.$group_id.'&type=text&message='.$message.'&instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }

    // Send a media or file with message to a group through the app
    // Params
    // group_id  84987694574-1618740914@g.us
    // type  media
    // message test message
    // media_url https://i.pravatar.cc
    // filename (Just use for send document) file_test.pdf
    // instance_id 609ACF283XXXX
    // access_token  a27e1f9ca2347bb766f332b8863ebe9f
    public static function SendMediaMessageGroup($group_id = '',$message = '',$media_url = '',$filename = '') 
    {
        $url = 'https://ibot.social/api/sendgroupmsg.php?group_id='.$group_id.'&type=media&message='.$message.'&media_url='.$media_url.'&filename='.$filename.'&instance_id='.config('whatsapp.instance_id').'&access_token='.config('whatsapp.access_token');
        $response =  Http::post($url ,[]);
        return $response->json();
    }

}