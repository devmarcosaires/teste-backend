<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtor; // Importa o modelo Produtor para utilizar no controller

class ProdutorController extends Controller
{
    // Método para exibir a lista de produtores
    public function index(Request $request)
    {
        // Obtém o parâmetro de busca da requisição
        $search = $request->query('search');

        // Consulta os produtores filtrando pelo nome se houver parâmetro de busca
        $produtores = Produtor::when($search, function ($query) use ($search) {
            return $query->where('nomeProdutor', 'like', '%' . $search . '%');
        })->paginate(10); // Pagina os resultados para exibir 10 por página

        // Retorna a view com os produtores encontrados ou todos os produtores
        return view('produtores.index', compact('produtores'));
    }

    // Método para exibir o formulário de criação de produtor
    public function create()
    {
        return view('produtores.create');
    }

    // Método para armazenar um novo produtor
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'registroIndividual' => 'required|unique:produtores',
            'nomeProdutor' => 'required',
            'status' => 'required|boolean',
        ]);

        // Cria um novo registro de produtor com os dados validados
        $produtor = Produtor::create([
            'registroIndividual' => $request->registroIndividual,
            'nomeProdutor' => $request->nomeProdutor,
            'status' => $request->status,
        ]);

        // Redireciona de volta para a lista de produtores com uma mensagem de sucesso
        return redirect()->route('produtores.index')->with('success', 'Produtor criado com sucesso!');
    }

    // Método para exibir os detalhes de um produtor específico
    public function show($id)
    {
        // Encontra o produtor pelo ID e retorna a view de detalhes
        $produtor = Produtor::findOrFail($id);
        return view('produtores.show', compact('produtor'));
    }

    // Método para exibir o formulário de edição de um produtor específico
    public function edit($id)
    {
        // Encontra o produtor pelo ID e retorna a view de edição
        $produtor = Produtor::findOrFail($id);
        return view('produtores.edit', compact('produtor'));
    }

    // Método para atualizar um produtor específico
    public function update(Request $request, $id)
    {
        // Encontra o produtor pelo ID
        $produtor = Produtor::findOrFail($id);

        // Valida os dados recebidos do formulário
        $request->validate([
            'registroIndividual' => 'required|unique:produtores,registroIndividual,' . $id . ',idProdutor',
            'nomeProdutor' => 'required',
            'status' => 'required|boolean',
        ]);

        // Atualiza o registro do produtor com os dados validados
        $produtor->update([
            'registroIndividual' => $request->registroIndividual,
            'nomeProdutor' => $request->nomeProdutor,
            'status' => $request->status,
        ]);

        // Redireciona de volta para a lista de produtores com uma mensagem de sucesso
        return redirect()->route('produtores.index')->with('success', 'Produtor atualizado com sucesso!');
    }

    // Método para excluir um produtor específico
    public function destroy($id)
    {
        // Encontra o produtor pelo ID, lança uma exceção se não for encontrado
        $produtor = Produtor::findOrFail($id);

        // Exclui todas as propriedades associadas ao produtor
        $produtor->propriedades()->delete();

        // Agora é seguro excluir o produtor
        $produtor->delete();

        // Redireciona para a lista de produtores com uma mensagem de sucesso
        return redirect()->route('produtores.index')->with('success', 'Produtor excluído com sucesso.');
    }
}

