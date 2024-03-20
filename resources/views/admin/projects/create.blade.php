@extends('layouts.app')

@section('title', 'Crea Post')

@section('content')
    <section id="create-project">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('admin.projects.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Torna alla lista</a>
            <h1 class="my-4">Crea nuovo Progetto</h1>
        </div>
        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="language" class="form-label">Linguaggio</label>
                        <input type="email" class="form-control" id="language" name="language">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="framework" class="form-label">Tecnologia Usata</label>
                        <input type="email" class="form-control" id="framework" name="framework">
                    </div>
                </div>
                <div class="col-10">
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="email" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="col-2">
                    <img src="" alt="" class="img-fluid" id="preview">
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione progetto</label>
                        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection