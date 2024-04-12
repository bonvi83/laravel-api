@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <a class="btn btn-primary my-4" href="{{ route('admin.types.index') }}">Torna alla lista</a>

            <h5>Dettaglio Categoria</h5>

            <h1>{{ $type->label }}</h1>
            <p>{{ $type->color }}</p>
            <p>{!! $type->getBadge() !!}</p>

            <h3 class="mt-5">Progetti correlati</h3>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>blabla bla</th>
                </thead>
                <tbody>
                    @foreach ($type->projects as $project)

                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.types.show', $project) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-project-{{ $project->id }}-modal"><i class="fa-solid fa-trash "></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $related_projects->links('pagination::bootstrap-5') }}

        </div>
    </section>
@endsection


@section('modal')
    <!-- Modal -->
    @foreach ($related_projects as $project)
        <div class="modal fade " id="delete-project-{{ $project->id }}-modal" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">!!!ATTENZIONE!!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sei arrivato ad un punto dove devi scegliere: o tieni {{ $project->title }} o lo cancelli!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bottone</button>

                        <form action="{{ route('admin.project.destroy', $project) }} " method="POST">
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