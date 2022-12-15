<x-layout title="Livros">

    <button type="button" class="btn btn-outline-primary">
        <a href="{{ route('book.layout') }}" class="btn btn-primary btn-sm">
            Adicionar Novo Livro
        </a>
    </button>
        

    @foreach ($books as $book)
    <li class="list-group-item d-flex justify-content-between align-items-center">

            {{ $book->book_name }}
        
            <span class="d-flex">
                <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary btn-sm">
                <button class="btn btn-primary btn-sm">
                    Resumo
                </button>
                </a>

                @auth
                <form action="{{ route('book.destroy', $book->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
                @endauth
            </span>
        
    </li>
    @endforeach
</ul>
</x-layout> 

