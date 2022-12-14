<x-layout title="Livro">

    
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
        <h4 id="scrollspyHeading1"></h4>
        <p>{{ $book->book_name }}</p>
        <h4 id="scrollspyHeading2">Autor</h4>
        <p>{{ $book->author }}</p>
        <h4 id="scrollspyHeading3">Categoria</h4>
        <p>{{ $book->category }}</p>
        @auth
        <h4 id="scrollspyHeading4">Resumo</h4>
        <p>{{ $book->summary }}</p>
        @endauth

        <a href="{{ route('book.index') }}" class="btn btn-primary btn-sm">
            <button class="btn btn-primary btn-sm">
                Voltar
            </button>
            </a>
      </div>

</x-layout> 

