<x-layout title="Veiculos">
<ul style="list-style-type:circle">
    
        <a href="{{ route('addvehicle') }}" class="btn btn-primary btn-sm">
            Adicionar Novo Veiculo
        </a>
   
        

    @foreach ($vehicles as $vehicle)
    <li class="list-group-item d-flex justify-content-between align-items-center">

            Placa {{ $vehicle->plate }} - Modelo {{ $vehicle->mark}}
        
            <span class="d-flex">
                <a href="{{ route('manutencao.index', $vehicle->id) }}" class="btn btn-primary btn-sm">
                    <button class="btn btn-primary btn-sm">
                        Ver Manutenções
                    </button>
                </a>

                <form action="{{ route('veiculo.destroy', $vehicle->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Excluir Veiculo
                        </button>
                </form>               
            </span>   
    </li>
    @endforeach

    {{-- <a href="{{  }}" class="btn btn-secondary mt-3"> --}}
        Suas Manutenções dessa Semana
    </a>

</ul>
</x-layout> 

