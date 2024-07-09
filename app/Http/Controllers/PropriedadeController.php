<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propriedade;
use App\Models\Produtor;
use App\Models\Vinculo;

class PropriedadeController extends Controller
{
    // Método para exibir a lista de propriedades
    public function index(Request $request)
    {
        // Obtém o parâmetro de busca da requisição
        $search = $request->query('search');

        // Consulta as propriedades com o relacionamento de produtor, filtrando pelos critérios de busca
        $propriedades = Propriedade::with('produtor')->where(function ($query) use ($search) {
            if (!empty($search)) {
                $query->where('nomePropriedade', 'like', '%' . $search . '%')
                      ->orWhere('uf', 'like', '%' . $search . '%')
                      ->orWhere('municipio', 'like', '%' . $search . '%')
                      ->orWhere('pais', 'like', '%' . $search . '%');
            }
        })->paginate(10); // Pagina os resultados para exibir 10 por página

        // Retorna a view com as propriedades encontradas ou todas as propriedades
        return view('propriedades.index', compact('propriedades'));
    }

    // Método para exibir o formulário de criação de propriedade
    public function create()
    {
        // Obtém todos os produtores para preencher o dropdown no formulário
        $produtores = Produtor::all();
        return view('propriedades.create', compact('produtores'));
    }

    // Método para armazenar uma nova propriedade
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'idProdutor' => 'required|exists:produtores,idProdutor',
            'nomePropriedade' => 'required|string|max:255',
            'numeroCar' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
            'municipio' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'status' => 'required|boolean',
            'liberado' => 'required|boolean',
        ]);

        // Criação da propriedade com os dados validados
        $propriedade = Propriedade::create([
            'idProdutor' => $request->idProdutor,
            'nomePropriedade' => $request->nomePropriedade,
            'numeroCar' => $request->numeroCar,
            'uf' => $request->uf,
            'municipio' => $request->municipio,
            'pais' => $request->pais,
            'status' => $request->status,
            'liberado' => $request->liberado,
        ]);

        // Criação do vínculo entre a propriedade e o produtor
        Vinculo::create([
            'idPropriedade' => $propriedade->idPropriedade,
            'idProdutor' => $request->idProdutor,
        ]);

        // Redireciona de volta para a lista de propriedades com uma mensagem de sucesso
        return redirect()->route('propriedades.index')->with('success', 'Propriedade criada com sucesso.');
    }

    // Método para exibir os detalhes de uma propriedade específica
    public function show($id)
    {
        // Encontra a propriedade pelo ID e retorna a view de detalhes
        $propriedade = Propriedade::findOrFail($id);
        return view('propriedades.show', compact('propriedade'));
    }

    // Método para exibir o formulário de edição de uma propriedade específica
    public function edit($id)
    {
        // Encontra a propriedade pelo ID e obtém todos os produtores para preencher o dropdown no formulário
        $propriedade = Propriedade::findOrFail($id);
        $produtores = Produtor::all();

        return view('propriedades.edit', compact('propriedade', 'produtores'));
    }

    // Método para atualizar uma propriedade específica
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos do formulário
        $request->validate([
            'nomePropriedade' => 'required|string|max:255',
            'numeroCar' => 'required|string|max:255',
            'uf' => 'required|string|max:255',
            'municipio' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'status' => 'required|boolean',
            'liberado' => 'required|boolean',
            'idProdutor' => 'required|exists:produtores,idProdutor',
        ]);

        // Atualização da propriedade com os dados validados
        $propriedade = Propriedade::findOrFail($id);
        $propriedade->update([
            'nomePropriedade' => $request->nomePropriedade,
            'numeroCar' => $request->numeroCar,
            'uf' => $request->uf,
            'municipio' => $request->municipio,
            'pais' => $request->pais,
            'status' => $request->status,
            'liberado' => $request->liberado,
        ]);

        // Atualização do vínculo entre a propriedade e o produtor
        $vinculo = Vinculo::where('idPropriedade', $propriedade->idPropriedade)->first();
        if ($vinculo) {
            $vinculo->update(['idProdutor' => $request->idProdutor]);
        } else {
            Vinculo::create([
                'idPropriedade' => $propriedade->idPropriedade,
                'idProdutor' => $request->idProdutor,
            ]);
        }

        // Redireciona de volta para a lista de propriedades com uma mensagem de sucesso
        return redirect()->route('propriedades.index')->with('success', 'Propriedade atualizada com sucesso.');
    }

    // Método para excluir uma propriedade específica
    public function destroy($id)
    {
        // Encontra a propriedade pelo ID e a exclui do banco de dados
        $propriedade = Propriedade::findOrFail($id);
        $propriedade->delete();

        // Redireciona para a lista de propriedades com uma mensagem de sucesso
        return redirect()->route('propriedades.index')->with('success', 'Propriedade deletada com sucesso!');
    }
}

