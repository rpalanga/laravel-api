@extends('layouts.admin')

@section('content')
<div class="container">
   <div class="row my-5">
      <div class="col d-flex flex-column  justify-content-center align-items-center">
         <h1>
            Bentornato  Amministratore.
         </h1>

         <div class="col justify-content-center">
         <a href="{{route('admin.projects.index')}}" class="btn btn-secondary "> Visualizza Progetti</a>

      </div>

      </div>
   </div>
   


 
</div>
@endsection