<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    //Solicita o JWT token para utilizar a API
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //Retorna os dados de todos os produtos
    public function index()
    {
        //Consulta todos os produtos
        $product = Product::all();

        //Retorna os dados de todos os produtos
        return response()->json([
            'status' => 'success',
            'message' => 'Product show all successfully',
            'result' => $product,
        ]);
    }

    //Insere um novo produto
    public function store(Request $request)
    {
        //Validação de colunas
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|double|max:255',
            'barcode' => 'required|string|unique:product|max:255'
        ]);

        //Insere o produto e retorna o ID do produto inserido
        $id = Product::insertGetId($request->all());

        //Salva os parâmetros e o ID do produto
        $product = $request->all();
        $product['id'] = $id;

        //Retorna os dados do produto inserido
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'result' => $product,
        ]);
    }

    //Retorna os dados de um produto de acordo com o ID
    public function show($id)
    {
        //Consulta o produto de acordo com o ID ou falha
        $product = Product::findOrFail($id);

        //Retorna os dados de um produto de acordo com o ID
        return response()->json([
            'status' => 'success',
            'message' => 'Product show successfully',
            'result' => $product,
        ]);
    }

    //Atualiza o produto de acordo com o ID
    public function update(Request $request, $id)
    {
        //Consulta o produto ou falha, se não falhar atualiza de acordo com os parâmetros passados
        $product = Product::findOrFail($id)->update($request->all());

        //Retorna se atualizou ou não o produto
        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'result' => $product,
        ]);
    }

    //Deleta o produto de acordo com o ID
    public function destroy($id)
    {
        //Consulta o produto ou falha, se não falhar deleta o produto
        $product = Product::findOrFail($id)->delete();

        //Retorna se excluiu ou não o produto
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'result' => $product
        ]);
    }

}
