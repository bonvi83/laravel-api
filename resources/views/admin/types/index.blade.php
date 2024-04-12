@extends('layouts.app')

@section('title', 'Lista categorie')

@section('content')
	<section>
    	<div class="container">
            <h1>Lista categorie</h1>
			
			<table class="table mb-4">
				<thead>
					<tr>
						<th>ID</th>
						<th>Etichetta</th>
						<th>Colore</th>
						<th>Badge</th>
						<th class="text-center">Mosta categoria</th>
						<th colspan="100%"></th>
					</tr>
				</thead>
				<tbody>
					@forelse($types as $type)
						<tr>
							<td>{{ $type->id }}</td>
							<td>{{ $type->label }}</td>
							<td>{{ $type->color }}</td>
							<td>{!! $type->getBadge() !!}</td>
							<td class="text-center">
								<a href="{{ route('admin.types.show', $type) }}"><i class="fa-solid fa-eye" style="color: Dodgerblue;"></i></a>
							</td>
						</tr>

					@empty
						<tr>
							<td>
								Nessun risultato trovato
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>

		</div>
@endsection



@section('modal')
    <!-- Modal -->
    @foreach ($types as $type)
        <div class="modal fade " id="delete-type-{{ $type->id }}-modal" data-bs-backdrop="static"
            data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">!!!ATTENZIONE!!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sei arrivato ad un punto dove devi scegliere: o tieni {{ $type->label }} o lo cancelli!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bottone</button>

                        <form action="{{ route('admin.types.destroy', $type) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">E se poi te ne penti?</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


{{-- Link cdn font awesome --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection