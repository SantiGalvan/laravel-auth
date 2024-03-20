@extends('layouts.app')

@section('title', 'Modifica Progetto')

@section('content')
    <section id="create-project">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('admin.projects.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Torna alla lista</a>
            <h1 class="my-4">Modifica Progetto</h1>
        </div>
        <form action="{{route('admin.projects.update', $project->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input value="{{old('title', $project->title)}}" type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="language" class="form-label">Linguaggio</label>
                        <input value="{{old('language', $project->language)}}" type="text" class="form-control" id="language" name="language">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="framework" class="form-label">Tecnologia Usata</label>
                        <input value="{{old('framework', $project->framework)}}" type="text" class="form-control" id="framework" name="framework">
                    </div>
                </div>
                <div class="col-11">
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input value="{{old('image', $project->image)}}" type="url" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="col-1">
                    <div class="mb-3">
                        <img src="{{old('image', $project->image ?? 'https://marcolanci.it/boolean/assets/placeholder.png')}}" alt="immagine del progetto" class="img-fluid" id="preview">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione progetto</label>
                        <textarea class="form-control" id="description" name="description" rows="10">{{old('description', $project->description)}}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center gap-3">
                <button type="reset" class="btn btn-lg btn-warning"><i class="fas fa-arrows-rotate me-2"></i>Reset</button>
                <button type="submit" class="btn btn-lg btn-success"><i class="fas fa-floppy-disk me-2"></i>Salva</button>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
        const input = document.getElementById('image');
        const preview = document.getElementById('preview');

        input.addEventListener('input', () => {
            preview.src = input.value || placeholder;
        })
    </script>
@endsection