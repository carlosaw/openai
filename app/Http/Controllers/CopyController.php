<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewView;
use OpenAI\Laravel\Facades\OpenAI;

class CopyController extends Controller
{
    //    
    public function index(): View
    {
        return view('copy');
    }

    public function copyAction(Request $r): ViewView {
        // $yourApiKey = getenv('YOUR_API_KEY');
        // $client = OpenAI::client($yourApiKey);

        // $result = $client->completions()->create([
        //     'model' => 'text-davinci-003',
        //     'prompt' => 'PHP is',
        // ]);
        // dd($result);

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Responda como um profissional de Copywriter!'],
                ['role' => 'user', 'content' => 'Quero criar a copy para um produto. O nome do produto é: ' . $r->nome_produto],
                ['role' => 'user', 'content' => 'O produto será vendido por: R$ ' . $r->preco_produto],
                ['role' => 'user', 'content' => 'As principais características do produto são: ' . $r->caracteristicas_produto],
                ['role' => 'user', 'content' => 'A copy deve ser criada de forma que se comunique bem com o público alvo que é: ' . $r->publico_produto],
                ['role' => 'user', 'content' => 'O estilo de escrita da copy deve ser muito: ' . $r->estilo_copy]
            ],
        ]);
        $data['copyGerada'] = $result->choices[0]->message->content;

        return view('copy', $data);
    }
}
