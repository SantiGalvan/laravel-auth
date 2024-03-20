@extends('layouts.app')

@section('title', 'Home')

@section('title', 'Home')

@section('content')
<section id="projects-card">
    <div class="row mb-4">
        <h1 class="text-center my-4">Progetti</h1>
        <div class="col">
        @forelse ($projects as $project)
            <div class="card p-4 my-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{$project->image}}" alt="{{$project->title}}" class="img-fluid mb-3">
                        <div><strong>Linguaggio:</strong> {{$project->language}}</div>
                        <div><strong>Framework:</strong> {{$project->framework}}</div>
                        <div class="mt-2"><strong>Creato il:</strong> {{$project->created_at}}</div>
                        <div><strong>Ultima modifica:</strong> {{$project->updated_at}}</div>
                    </div>
                    <div class="col">
                        <h3>{{$project->title}}</h3>
                        <p class="lead">{{$project->description}}</p>
                    </div>
                </div>
            </div>
        @empty
        <div class="card p-4 my-4">
            <div class="row">
                <h4 class="text-center my-4">Al momento non ci sono progetti</h4>
            </div>
        </div>
        @endforelse
        </div>
    </div>

    <!-- Pagination -->
    @if($projects->hasPages())
    {{$projects->links()}}
  @endif
</section>
@endsection