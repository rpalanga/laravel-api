@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class=" display-2 ">Sei entrato nella create</h1>

    <div class="container p-3">

<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nome Progetto</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
    @error('name')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Immagine Progetto</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
    @error('image')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Descrizione</label>
    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
    @error('description')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror
  </div>

 

  <div class="mb-3">
    <label for="link_repo" class="form-label">Link Della Repository</label>
    <input type="text" class="form-control @error('link_repo') is-invalid @enderror" id="link_repo" name="link_repo" value="{{old('link_repo')}}">
    @error('link_repo')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror

  </div>
  <div class="mb-3 ">
     <label for="tech" class="form-label my-3">Linguaggi o Tecnologie Utilizzate</label>
    <!-- <input type="text" class="form-control @error('tech') is-invalid @enderror" id="tech" name="tech" value="{{old('tech')}}">
    @error('tech')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror -->
    <!-- @dump($technologies) -->
    <div class="tech-container d-flex align-items-center gap-4">

      @foreach($technologies as $technology)
        <div class="form-check ">
          <input type="checkbox" 
          class="me-1 form-check-input " 
          name="technologies[]" 
          value="{{$technology->id}}" 
          id="technology-{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} ><label for="technology-{{$technology->id}}" class=" form-check-label">{{$technology->title}}</label>
        </div>
      @endforeach
    </div>
    
  </div>

  <div class="mb-3">
    <label for="date_release" class="form-label">Data di Rilascio</label>
    <input type="text" class="form-control @error('date_release') is-invalid @enderror" id="date_release" name="date_release" value="{{old('date_release')}}">
    @error('date_release')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror
    
  </div>

  <div class="mb-3">

    <label for="type_id">Tipologia</label>

    <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
      <option value=""></option>

      @foreach ($types as $type)
         <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->title }}</option>
      @endforeach

    </select>
    @error('type_id')
      <div class="invalid-feedback">
          {{$message}}
      </div>
    @enderror

</div>


  
  
  <button type="submit" class="btn btn-primary">Inserisci</button>
</form>

</div>

</div>
@endsection