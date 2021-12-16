<?php

namespace App\Http\Controllers\API;

use Cekmutasi;
use App\Models\Bank;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Http\Controllers\Controller;
use Tridi\Cekmutasi\Cekmutasi as CekmutasiCekmutasi;

// use Symfony\Contracts\HttpClient\HttpClientInterface;

use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

// use App\Models\Bank;
use Ramsey\Uuid\Uuid;

class BankController extends Controller
{

    // private $client;

    // public function __construct(HttpClientInterface $client)
    // {
    //     $this->client = $client;
    // }

    public function GetCekmutasi()
    {
        //
    }

    public function bankGet(Bank $bank)
    {
        // return $bank->all();
        // $mutation = Cekmutasi::bank()->mutation([
        //         'date'		=> [
        //             'from'	=> date('Y-m-d') . ' 00:00:00',
        //             'to'	=> date('Y-m-d') . ' 23:59:59'
        //         ]
        //     ]);
        $id = 1;
        // $mutation = Cekmutasi::catchIPN(request());
        // $mutation = Cekmutasi::checkIP();
        $mutation = Cekmutasi::bank()->detail($id);

        // $mutation = Cekmutasi::bank()->mutation();

        return $mutation;
        // dd($mutation);

        // $response = $this->client->request(
        //     'GET',
        //     'https://api.github.com/repos/symfony/symfony-docs'
        // );

        // $content = $response->getContent();

        // return $content;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json ([
            'status' => true,
            'message' => 'success',
            'data' => []
        ]);
        // $banks = Bank::all()->get();
        $data =  Bank::all();
        return view('bank', ['banks'=>$data]);
        // return view('banks', [
        //     "name_bank" => "Bank::all()"
        // ]);
    }

    public function webview() {
        $data = Bank::all();
        return view('banks.webview', [
            'banks' => $data,
            'header' => 'Bank'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bankCreate(Bank $bank)
    {
        $success = $bank->create([
            'uuid' => Str::uuid(),
            'name_bank' => request('name_bank'),
            'code_bank' => request('code_bank'),
            'number_bank' => request('number_bank'),
            'method_bank' => request('method_bank'),
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bankIsDeleted(Bank $bank)
    {
        $success = $bank->trashed();
        if($success) {
            return response()->json([
                'status' => true,
                'message' => 'data has been deleted',
                'data' => $success
            ]);
        }
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
