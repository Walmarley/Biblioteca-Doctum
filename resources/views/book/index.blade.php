<x-layout title="Livros" :mensagem-sucesso="$mensagemSucesso">
    @foreach ($books as $book)
    <li class="list-group-item d-flex justify-content-between align-items-center">

            {{ $book->book_name }}
        
            <span class="d-flex">
                {{-- <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm"> --}}
                <button class="btn btn-primary btn-sm">
                    Resumo
                </button>
                </a>

                {{-- <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2"> --}}
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </span>
        
    </li>
    @endforeach
</ul>
</x-layout> 

