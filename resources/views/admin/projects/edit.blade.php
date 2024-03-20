@extends('layouts.app')

@section('title', 'Modifica Progetto')

@section('content')
    <section id="create-project">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('admin.projects.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Torna alla lista</a>
            <h1 class="my-4">Modifica Progetto</h1>
        </div>

       @include('includes.projects.form')
       
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