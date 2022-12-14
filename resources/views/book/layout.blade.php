<x-layout title="Adicionar Livro">
    <form method="POST" class="mt-2">
        
        <div class="form-group">
            <label for="book_name">Nome Livro</label>
            <input type="text" class="form-control" id="book_name" name="book_name" value="" required >
        </div>

        <div class="form-group">
            <label for="author">Nome Autor</label>
            <input type="text" class="form-control" id="author" name="author" value="" required >
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <input type="text" class="form-control" id="category" name="category" value="" required >
        </div>

        <div class="form-group">
            <label for="summary">Sumario: </label>
            <textarea name="summary" id="summary" class="form-control" rows="8"  name="summary" required></textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-2"> Cadastrar </button>
        </div>

        <a href="{{  route('book.store') }}" class="btn btn-secondary mt-3">
            Cadastrar
        </a>
    </form>

</x-layout>