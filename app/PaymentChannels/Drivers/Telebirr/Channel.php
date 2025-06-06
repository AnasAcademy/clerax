<?php

namespace App\PaymentChannels\Drivers\Telebirr;

use App\Models\Order;
use App\Models\PaymentChannel;
use App\PaymentChannels\BasePaymentChannel;
use App\PaymentChannels\IChannel;
use Illuminate\Http\Request;

class Channel extends BasePaymentChannel implements IChannel
{
    use TelebirrIntegrationTrait;

    protected $currency;
    protected $test_mode;

    protected $base_url;
    protected $fabric_app_id;
    protected $app_secret;
    protected $merchant_app_id;
    protected $merchant_code;
    protected $private_key;
    protected $order;


    protected array $credentialItems = [
        'base_url',
        'fabric_app_id',
        'app_secret',
        'merchant_app_id',
        'merchant_code',
        'private_key',
    ];

    // Documentation => https://developer.ethiotelecom.et/docs/category/h5-integration-with-superapp

    /**
     * Channel constructor.
     * @param PaymentChannel $paymentChannel
     */
    public function __construct(PaymentChannel $paymentChannel)
    {
        $this->currency = 'ETB'; // currency(); //

        $this->setCredentialItems($paymentChannel);
    }

    public function paymentRequest(Order $order)
    {
        $this->order = $order;
        //$user = $order->user;
        $generalSettings = getGeneralSettings();
        $title = $generalSettings['site_name'] . ' payment';

        $price = $this->makeAmountByCurrency($order->total_amount, $this->currency);
        $returnUrl = $this->makeCallbackUrl();

        try {
            $redirectUrl = $this->createOrder($title, $price, $returnUrl);

            return $redirectUrl;
        } catch (\Exception $exception) {
            dd($exception);
        }


        $toastData = [
            'title' => trans('cart.fail_purchase'),
            'msg' => '',
            'status' => 'error'
        ];
        return redirect()->back()->with(['toast' => $toastData])->withInput();
    }

    private function makeCallbackUrl()
    {
        $callbackUrl = route('payment_verify', [
            'gateway' => 'Telebirr'
        ]);

        return $callbackUrl;
    }

    public function verify(Request $request)
    {
        $this->handleConfigs();
        $user = auth()->user();

        $verification = \Paytr::paymentVerification($request);
        dd($verification);

        if (!$verification->verifyRequest()) {
            $orderId = $verification->getMerchantOid(); // Payment id generated by you
            $isSuccess = $verification->isSuccess(); // Is the payment status successful

            $order = Order::where('id', $orderId)
                ->where('user_id', $user->id)
                ->first();

            if (!empty($order)) {
                if ($isSuccess) {
                    $order->update(['status' => Order::$paying]);
                } else {
                    $order->update(['status' => Order::$fail]);
                }
            }

            return $order;
        }

        return null;
    }
}
