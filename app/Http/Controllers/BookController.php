<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function layout()
    {
        return view('book.layout');
    }

    public function index()
    {
        $books = Book::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('book.index')->with('books', $books);

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
        }

        Book::create($data);
        

        // Book::create([
        //     'book_name' => $request->book_name,
        //     'author' => $request->author,
        //     'category' => $request->category,
        //     'summary' => $request->summary
        // ]); //vi num site o cara fazendo assim e quis testar

        return redirect(route('book.index'));
        
        return response()->json(['message'=> 'O livro '. $request->book_name.' adicionado com sucesso']);
    }

    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show')->with('book', $book);

        return response()->json(['data' => $book]);
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
        $book = Book::find($id);
        Book::find($id)->delete();

        return redirect(route('book.index')); //se quiser so apagar

        return view('book.destroy')->with('book', $book); //se quiser uma pagina personalizada para ver apagando
        
        return response()->json(['O livro ' . $book->book_name . ' foi excluido com sucesso']); // acessar via API
    }
}
