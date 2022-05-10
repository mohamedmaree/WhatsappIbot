# WhatsappIbot
## Installation

You can install the package via [Composer](https://getcomposer.org).

```bash
composer require maree/whatsapp-ibot
```
- Publish your Whatsapp config file with

```bash
php artisan vendor:publish --provider="Maree\WhatsappIbot\WhatsappIbotServiceProvider" --tag="whatsapp"
```
- then change your WhatsappIbot config from config/whatsapp.php file

```php
    "access_token"   => "" ,
    "instance_id"    => "" ,
```
## Usage

- Create a new Instance ID

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::CreateInstance();

```

- Display QR code to login to Whatsapp web. You can get the results returned via Webhook

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::GetQRCode();

```

- Get all return values from Whatsapp. Like connection status, Incoming message, Outgoing message, Disconnected, Change Battery,...
	- Params:
	- webhook_url	https://webhook.site/1b25464d6833784f96eef4xxxxxxxxxx

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::RecevingWebhook('https://webhook.site/1b25464d6833784f96eef4xxxxxxxxxx');

```

- Logout Whatsapp web and do a fresh scan

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::RebootInstance();

```

- This will logout Whatsapp web, Change Instance ID, Delete all old instance data

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::ResetInstance();

```

- Re-initiate connection from app to Whatsapp web when lost connection

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::Reconnect();

```

- Send a text message to a phone number through the app
	- Params:
	- phone_number= 2010027*****
	- message	= test message

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::SendTextMessage($phone_number='2010027*****','maree test');

```

- Send a media or file with message to a phone number through the app
	- Params:
	- number	= 2010027*****
	- message	= maree test
	- media_url = https://imgd.aeplcdn.com/0x0/n/cw/ec/41406/bmw-8-series-right-front-three-quarter8.jpeg
	- filename (Just use for send document) =	bmw.png

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::SendMediaMessage($number = '2010027*****',$message = 'media',$media_url = 'https://imgd.aeplcdn.com/0x0/n/cw/ec/41406/bmw-8-series-right-front-three-quarter8.jpeg',$filename = 'bmw');

```


- Send a text message to a group through the app
	- Params:
	- group_id = 2010027*****@c.us
	- message  = group message

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::SendTextMessageGroup($group_id = '2010027*****@c.us',$message = 'group message');

```

- Send a media or file with message to a group through the app
	- Params:
	- group_id = 2010027*****@c.us
	- message	 = test message
	- media_url = https://imgd.aeplcdn.com/0x0/n/cw/ec/41406/bmw-8-series-right-front-three-quarter8.jpeg
	- filename (Just use for send document) =	bmw.png

```php
use Maree\WhatsappIbot\WhatsappIbot;
$response = WhatsappIbot::SendMediaMessageGroup($group_id = '2010027*****@c.us',$message = 'group message',$media_url = 'https://www.mercedes-benz-mena.com/ar/passengercars/mercedes-benz-cars/models/gle/coupe-c167/explore/highlights/_jcr_content/contentgallerycontainer/par/contentgallery/par/contentgallerytile_58586423/image.MQ6.8.20191119092227.jpeg',$filename = 'media group');

```
