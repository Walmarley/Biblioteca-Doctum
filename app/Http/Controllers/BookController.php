<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        $mensagemSucesso = session('mensagem.sucesso');

        // return view('book.index')->with('books', $books)
        //     ->with('mensagemSucesso', $mensagemSucesso);

        return response()->json([$books, 'Message' => $mensagemSucesso]);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'book_name',
            'author',
            'category',
            'summary',
        ]);

        $validador = Validator::make($request->all(), [
            'book_name' => 'required|max:50',
            'author' => 'required|max:50',
            'category' => 'required|max:40',
            'summary' => 'max:500',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
            // return view('book.store')->with('mensagem', $validador->messages());
        }

        Book::create($data);

        // Book::create([
        //     'book_name' => $request->book_name,
        //     'author' => $request->author,
        //     'category' => $request->category,
        //     'summary' => $request->summary
        // ]); //vi num site o cara fazendo assim e quis testar

        // return view('book.index');
        return response()->json(['message'=> 'O livro '. $request->book_name.' adicionado com sucesso']);
    }

    public function show($id)
    {
        $livro = Book::find($id);

        return response()->json(['data' => $livro]);
    }

    
    public function update(Request $request, $id)
    {
        $validador = Validator::make($request->all(), [
            'book_name' => 'required|max:50',
            'author' => 'required|max:50',
            'category' => 'required|max:40',
            'summary' => 'max:500',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
            // return view('book.store')->with('mensagem', $validador->messages());
        }

        Book::find($id)->update($request->all());
        return response()->json(['message'=> 'O livro '. $request->book_name.' Editado com sucesso']);
        // return view('book.index');
    }

    public function destroy($id)
    {
        $livro = Book::find($id);
        Book::find($id)->delete();
        return response()->json(['O livro ' . $livro->book_name . ' foi excluido com sucesso']);
    }
}
