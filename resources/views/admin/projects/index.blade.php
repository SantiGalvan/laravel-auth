@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <section id="table-projects">
        <h1 class="text-center my-4">Projects</h1>

        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Linguaggio</th>
                <th scope="col">Framework</th>
                <th scope="col">Creato il</th>
                <th scope="col">Ultima modifica</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td>{{$project->title}}</td>
                    <td>{{$project->language}}</td>
                    <td>{{$project->framework}}</td>
                    <td>{{$project->created_at}}</td>
                    <td>{{$project->updated_at}}</td>
                    <td>
                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil"></i></a>
                            <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-can"></i></button>
                            </form>
                        </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <th colspan="7">
                        <h3>Al momento non ci sono progetti</h3>
                    </th>
                </tr>  
                @endforelse
            </tbody>
          </table>
    </section>
@endsection

@section('scripts')
  @vite('resources/js/delete_confirmation.js')
@endsection