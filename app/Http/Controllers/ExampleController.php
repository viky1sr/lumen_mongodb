<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function detailBills() {
        $res = storage_path('app/billdetails.json');
        $decode = json_decode(file_get_contents($res), true);
        $res = $decode['data']['response']['billdetails'];
        $tampung = [];

        foreach ($res as $item){
            $find = [' ','DENOM',':'];
            $toString = implode($item['body']);
            $money = str_replace($find,"",$toString);
            $tampung[] = [
                'adminfee' => $item['adminfee'],
                'billid' => $item['billid'],
                'currency' => $item['currency'],
                'title' => $item['title'],
                'totalamount' => $item['totalamount'],
                'descriptions' => $item['descriptions'],
                'body' => $money
            ];
        }

        $newResult = [];
        foreach($tampung as $key => $value){
            if((int)$value['body'] >= 100000){
                array_push($newResult,(int)$value['body']);
            }
        }

        $result = [];
        foreach ($newResult as $ky => $i){
            $result[] = [
                $ky => $i
            ];

        }
        return $result;
    }
}
