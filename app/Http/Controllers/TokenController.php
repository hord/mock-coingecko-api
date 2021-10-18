<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function list() {

        $tokens = Token::all();

        $data = [];

        foreach ($tokens as $token) {
            $data[] = [
                'id' => $token->identifier,
                'symbol' => $token->symbol,
                'name' => $token->name,
                'platforms' => [
                    'ethereum' => $token->contract_address,
                    'binance-smart-chain' => $token->contract_address
                ]
            ];
        }

        return response()->json($data);
    }

    public function info(Request $request) {

        $id = $request->route('coin_id', '');

        $token = Token::where('identifier', $id)->first();

        if ($token === null) {
            return response()->json([
                'error' => 'Could not find coin with the given id'
            ], 404);
        }

        return response()->json([
            'id' => $token->identifier,
            'symbol' => $token->symbol,
            'name' => $token->name,
            'market_data' => [
                'current_price' => [
                    'usd' => $token->price
                ]
            ],
            'platforms' => [
                'ethereum' => $token->contract_address,
                'binance-smart-chain' => $token->contract_address
            ],
            'image' => [
                'thumb' => "https://assets.coingecko.com/coins/images/14972/thumb/Avatar_white.png?1619513849",
                'small' => "https://assets.coingecko.com/coins/images/14972/small/Avatar_white.png?1619513849",
                'large' => "https://assets.coingecko.com/coins/images/14972/large/Avatar_white.png?1619513849"
            ],
        ]);
    }
}
