<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importante para usar SQL puro ou Query Builder
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        // Aqui usamos um comando SQL para buscar todos os produtos
        $produtos = DB::table('produtos')->get();

        // Enviamos os dados para a view 'home'
        return view('home', ['produtos' => $produtos]);
    }

    public function admin()
    {
        // Busca todos os produtos para exibir no painel admin
        $produtos = DB::table('produtos')->get();

        // Retorna a view com os produtos
        return view('admin.cadastro', ['produtos' => $produtos]);
    }

    public function show($id)
    {
        // Busca o produto específico pelo ID
        $produto = Produto::findOrFail($id);

        // Retorna a view com o produto
        return view('visualizarProduto', ['produto' => $produto]);
    }

    public function store(Request $request)
    {
        // 1. Validação: garante que os dados estão corretos
        $request->validate([
            'nome'    => 'required|string|max:255',
            'preco'   => 'required|numeric',
            'estoque' => 'required|integer',
            'foto'    => 'image|mimes:jpeg,png,jpg,webp|max:2048' // Máximo 2MB
        ]);

        // 2. Coleta os dados do formulário
        $dados = $request->all();

        // 3. Lógica do Upload da Imagem
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            // Salva o arquivo na pasta storage/app/public/produtos
            // O Laravel gera um nome único automaticamente para não sobrescrever
            $caminho = $request->foto->store('produtos', 'public');

            // Substitui o valor da imagem pelo caminho gerado
            $dados['imagem'] = $caminho;
        }

        // 4. Salva no Banco de Dados
        Produto::create($dados);

        // 5. Redireciona com uma mensagem de sucesso
        return redirect()->route('admin.cadastro')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        // 1. Encontra o produto ou retorna erro 404
        $produto = Produto::findOrFail($id);

        // 2. Deleta a imagem da pasta storage se ela existir
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }

        // 3. Deleta do banco de dados
        $produto->delete();

        // 4. Volta para a página com mensagem de sucesso
        return redirect()->back()->with('success', 'Produto removido com sucesso!');
    }
}
