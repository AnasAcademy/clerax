<?php

namespace App\PaymentChannels\Drivers\YandexCheckout;

use App\Models\Order;
use App\Models\PaymentChannel;
use App\PaymentChannels\BasePaymentChannel;
use App\PaymentChannels\IChannel;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class Channel extends BasePaymentChannel implements IChannel
{
    protected $currency;
    protected $test_mode;
    protected $shop_id;
    protected $secret_key;

    protected array $credentialItems = [
        'shop_id',
        'secret_key',
    ];

    /**
     * Channel constructor.
     * @param PaymentChannel $paymentChannel
     */
    public function __construct(PaymentChannel $paymentChannel)
    {
        $this->currency = currency();
        $this->setCredentialItems($paymentChannel);
    }

    public function paymentRequest(Order $order)
    {

        $gateway = Omnipay::create('Yandex');
        $gateway->setShopId($this->shop_id);
        $gateway->setSecretKey($this->secret_key);

        $gateway->setReturnUrl($this->makeCallbackUrl($order));

        $gateway->setAmount($this->makeAmountByCurrency($order->total_amount, $this->currency)); // Amount to charge
        $gateway->setCurrency($this->currency); // Currency
        $purchase = $gateway->purchase()->send();

        if ($purchase->isSuccessful()) {
            session()->put('YandexCheckoutStatus', 'success');

            return $this->makeCallbackUrl($order);
        }

    }

    private function makeCallbackUrl($order)
    {
        $callbackUrl = route('payment_verify', [
            'gateway' => 'YandexCheckout',
            'order_id' => $order->id
        ]);

        return $callbackUrl;
    }

    public function verify(Request $request)
    {
        $user = auth()->user();
        $orderId = $request->get('order_id', null);
        $orderStatus = session()->get('YandexCheckoutStatus', null);

        session()->forget('YandexCheckoutStatus');

        $order = Order::where('id', $orderId)
            ->where('user_id', $user->id)
            ->first();

        if (!empty($order) and $orderStatus == 'success') {
            $order->update([
                'status' => Order::$paying
            ]);

            return $order;
        }

        if (!empty($order)) {
            $order->update([
                'status' => Order::$fail
            ]);
        }

        return $order;
    }
}
