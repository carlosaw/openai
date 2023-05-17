<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index(Request $r): View {
        return view('welcome');
    }

    public function ingredientesAction(Request $r): View {
        //dd($r->all());
    $response = Http::withHeaders([       
        'Authorization' => 'Bearer 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',
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/completions', [
        'model' => "text-davinci-003",
        'prompt' => 'Gere uma receita SOMENTE com os seguintes ingredientes: '.$r->ingredientes,
        'max_tokens' => 400,
    ]);

    if ($response->successful()) {
        $result = $response->json();
        // Faça algo com o resultado retornado pela API da OpenAI
        $viewResult['receita'] = $result['choices'][0]['text'];
        $viewResult['ingredientes'] = $r->ingredientes;

        return view('welcome', $viewResult);
    } else {
        // Lida com o erro na requisição
        dd($response->status(), $response->json());
    }

        // $client = New Client([
        //     'base_url' => 'https://api.openai.com/v1/completions',
        //     'headers' => [
        //         'Content-Type' => 'applications/json',
        //         'Authorization' => 'Bearer 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'
        //     ]
        // ]);
        
        // $response = $client->post('completions', [
        //     'json' => [
        //         'model' => "text-davinci-003",
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