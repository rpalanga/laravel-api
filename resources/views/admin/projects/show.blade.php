@extends('layouts.admin')

@section('content')
<div class="container d-flex flex-column align-items-center">
    <h1 class=" display-2 ">Visualizza il Progetto</h1>

    <div class="card col-12 my-4" style="width: 500px;">
      <img src="{{asset('storage/' . $project->image)}}" class="card-img-top w-100" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title text-warning ">{{$project->name}}</h5>
        <p class="card-text">{{$project->description}}</p>
        <p class="card-text">{{$project->link_repo}}</p>
        @foreach($project->technologies as $technology)
        <p class="card-text">{{$technology->title}}</p>
        @endforeach
        <p class="card-text">{{$project->date_release}}</p>
        <p class="card-text">{{$project->type?->title}}</p>

        
        
        
        
      </div>
    </div>

    <div class=" my-4">
      <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-warning">Modifica</a>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina definitivamente</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              Sei sicuro di voler eliminare il Progetto "{{$project->name}}"
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    
                   
                    <button class="btn btn-danger">Elimina</button>
                </form>

            </div>

          </div>
        </div>
    </div>

    <a href="{{route('admin.projects.index')}}" class="btn btn-primary ">Torna all'Home</a>
</div>
@endsection