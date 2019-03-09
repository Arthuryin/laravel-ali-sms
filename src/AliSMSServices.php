<?php

namespace Arthuryinzhen\AliSMS;

use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use AlibabaCloud\Client\AlibabaCloud;

class AliSMSServices
{
    private $accessKeyId, $accessKeySecret, $signName, $templateCode;

    /**
     * 初始化短信
     * AliSMSController constructor.
     */
    public function __construct()
    {
        $config = config('AliSMS');
        $this->accessKeyId = $config['accessKeyId'];
        $this->accessKeySecret = $config['accessKeySecret'];
        $this->signName = $config['signName'];
        $this->templateCode = $config['templateCode'];

        AlibabaCloud::accessKeyClient($this->accessKeyId, $this->accessKeySecret)
            ->regionId('cn-hangzhou')
            ->asDefaultClient();
    }

    /**
     * 发送短信
     * @param $phone
     * @param $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function send($phone, $code)
    {
        try {
            $result = AlibabaCloud::rpcRequest()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->options([
                    'query' => [
                        'PhoneNumbers' => $phone,
                        'SignName' => $this->signName,
                        'TemplateCode' => $this->templateCode,
                        'TemplateParam' => json_encode(['code' => $code])
                    ],
                ])
                ->request();

            return $result;
        } catch (ClientException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        }
    }

}
