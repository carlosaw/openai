<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index(Request $r): View {
        return view('welcome');
    }

    public function ingredientesAction(Request $r): View {
        

        $response = Http::withHeaders([
            
            'Authorization' => 'Bearer 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',
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/completions', [
            'model' => "text-davinci-003",
            'prompt' => 'Gere uma receita com os seguintes ingredientes:'.$r->ingredientes,
            'max_tokens' => 100,
        ]);

        if ($response->successful()) {
            $result = $response->json();
            // Faça algo com o resultado retornado pela API da OpenAI
            dd($result);
        } else {
            // Lida com o erro na requisição
            dd($response->status(), $response->json());
    }

        // $client = New Client([
        //     'base_url' => 'https://api.openai.com/v1/',
        //     'headers' => [
        //         'Content-Type' => 'applications/json',
        //         'Authorization' => 'Bearer' . env('OPENAI_API_KEY')
        //     ]
        // ]);
        
        // $response = $client->post('completions', [
        //     'json' => [
        //         'prompt' => 'Hello, World!',
        //         'temperature' => 0.5,
        //         'max_tokens' => 50
        //     ]
        // ]);

        // if($response->getStatusCode() == 200) {
        //     $data = json_decode($response->getBody(), true);
        //     // Fazer algo com a resposta da API aqui 
        // }
        // dd($data);
    }
}