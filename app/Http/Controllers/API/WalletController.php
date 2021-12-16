<?php

namespace App\Http\Controllers\API;

use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Xendit\Xendit;

class WalletController extends Controller
{

    private $token = 'xnd_development_k0WQwFBU21Jc7ojuxOvlcb8cIebo3kZzmig4FxqkbjYj3yEgEJAHGvZxcWW6u4o';

    public function getListVa()
    {
        Xendit::setApiKey($this->token);
        $getVABanks = \Xendit\VirtualAccounts::getVABanks();

        return response()->json([
            'data' => $getVABanks
        ]);
    }

    public function createVa(Request $request)
    {
        Xendit::setApiKey($this->token);
        $params = ["external_id" => \uniqid(),
                "bank_code" => $request->bank,
                "name" => $request->name,
                "expected_amount" => $request->price,
                "is_closed" => true,
            ];

        $createVA = \Xendit\VirtualAccounts::create($params);

        // $params = [
        //     'reference_id' => uniqid(),
        //     'currency' => 'IDR',
        //     'amount' => 1000,
        //     'checkout_method' => 'ONE_TIME_PAYMENT',
        //     'channel_code' => 'ID_SHOPEEPAY',
        //     'channel_properties' => [
        //         'success_redirect_url' => 'https://dashboard.xendit.co/register/1',
        //     ],
        //     'metadata' => [
        //         'branch_code' => 'tree_branch'
        //     ]
        // ];

        // $createEWalletCharge = \Xendit\EWallets::createEWalletCharge($params);

        return response()->json([
            'data' => $createVA
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Wallet::all()
        ]);
        $userWallet = Auth::id();
        $wallet = Wallet::where('user_uuid', '$userWallet');
    }

    public function webview() {
        $data = Wallet::all();
        return view('wallets.webview', [
            'wallet' => $data,
            'header' => 'Wallet'
        ]);
    }

    public function walletGet(Wallet $wallet)
    {
        return view('wallets.index', [
            'title' => 'Wallet',
            'wallet' => $wallet
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function walletCreate(Wallet $wallet)
    {
        $success = $wallet->create([
            'uuid' => Str::uuid(),
            'pin' => bcrypt(request('pin')),
            'user_uuid' => request('user_uuid'),
        ]);

        if($success) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $success
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'data not found',
                'data' => $success
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
