<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Xendit\Xendit;
use Carbon\Carbon;

class XenditController extends Controller
{
    private $token = 'xnd_development_k0WQwFBU21Jc7ojuxOvlcb8cIebo3kZzmig4FxqkbjYj3yEgEJAHGvZxcWW6u4o';

    public function index()
    {
        Xendit::setApiKey($this->token);
        $getVABanks = \Xendit\VirtualAccounts::getVABanks();

        $getPaymentChannels = \Xendit\PaymentChannels::list();

        return $getPaymentChannels;

        return view('main.index', [
            'title' => 'Main',
            'datas' => $getVABanks
        ]);
    }

    public function getBalance()
    {
        Xendit::setApiKey($this->token);
        $getBalance = \Xendit\Balance::getBalance('CASH');

        $id = '6177faa901b5ab04ecb552c5';
        $getVA = \Xendit\VirtualAccounts::retrieve($id);

        return $getBalance;
    }

    public function createCustomer()
    {
        Xendit::setApiKey($this->token);
        $customerParams = [
            'reference_id' => '' . time(),
            'given_names' => 'luthfi',
            'email' => 'luthfi@gmail.com',
            'mobile_number' => '+6281212345678',
            'description' => 'dummy customer',
            'middle_name' => 'luthfi',
            'surname' => 'alredia',
            'addresses' => [
                [
                    'country' => 'ID',
                    'street_line1' => 'Jl. 123',
                    'street_line2' => 'Jl. 456',
                    'city' => 'Jakarta Selatan',
                    'province' => 'DKI Jakarta',
                    'state' => '-',
                    'postal_code' => '12345'
                ]
            ],
            'metadata' => [
                'meta' => 'data'
            ]
        ];
        
        $createCustomer = \Xendit\Customers::createCustomer($customerParams);

        return $createCustomer;
    }

    public function createVa(Request $request)
    {
        Xendit::setApiKey($this->token);
        $params = [
            'external_id' => \uniqid(),
            "bank_code" => $request->bank,
            "name" => $request->name,
            // 'expiration_date' => Carbon::now()->addDays(1)->toISOString(),
            // 'is_single_use' => true
        ];
        
        $createVa = \Xendit\VirtualAccounts::create($params);
        return $createVa;
    }
    
    public function TopUpVA(Request $request)
    {
        Xendit::setApiKey($this->token);
        $id = '6177faa901b5ab04ecb552c5';
        $updateParams = ["suggested_amount" => 6000];

        $updateVA = \Xendit\VirtualAccounts::update($id, $updateParams);

        return $updateVA;
    }

    public function doPayment()
    {
        Xendit::setApiKey($this->token);
    }

    public function getPayment()
    {
        Xendit::setApiKey($this->token);
        $paymentID = 'payment-ID';
        $getFVAPayment = \Xendit\VirtualAccounts::getFVAPayment($paymentID);
        var_dump($getFVAPayment);
    }
    
    public function callback()
    {
        Xendit::setApiKey($this->token);
        $CBToken = 'hdBDu4alQR7ZezqrP7lj9BVUXYl5iKsNgWio5GW6D6mKPiHQ';
        
    }

    public function doPayout(Wallet $wallet)
    {
        return view('main.index', [
            'title' => 'main',
            // 'user_wallet' => Wallet::where('user_uuid', '6ef25aff-9c41-3fdf-b7c1-1c878702cf5d')->first(),
            'wallet' => Wallet::where('id', 1)->get(),
        ]);
    }
    
    public function makePayout(Request $request)
    {
        Xendit::setApiKey($this->token);

        $wallet = Wallet::where('user_uuid', '6ef25aff-9c41-3fdf-b7c1-1c878702cf5d')->first();

        if($request->amount > $wallet['balance_wallet']){
            return 'Saldo tidak cukup';
        }
        
        $result = $wallet['balance_wallet'] - $request->amount;
        $params = [
            "external_id" => $request->exid,
            "amount" => $request->amount,
            "email" => $request->email
        ];

        $createPayout = \Xendit\Payouts::create($params);

        // return view('main.getpayout', [
        //     'title' => 'main',
        //     'data' => $createPayout
        // ]);

        return $createPayout;
    }
    
    public function getPayout()
    {
        Xendit::setApiKey($this->token);
        
        $id = 'b115b784-076b-4e43-8a7c-2da36ebbc222';
        $getPayout = \Xendit\Payouts::retrieve($id);
        
        return $getPayout;
    }
    
    public function doInvoice()
    {
        return view('main.makeinvoice', [
            'title' => 'Make Invoice'
        ]);
    }

    public function makeInvoice()
    {
        Xendit::setApiKey($this->token);
        
        $params = [ 
            'external_id' => uniqid(),
            'amount' => 50000,
            'email' => 'akm@gmail.com'
        ];
    
        $createInvoice = \Xendit\Invoice::create($params);
        return $createInvoice;
    }
}