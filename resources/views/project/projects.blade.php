@extends('layout.main')

@section('content')
<!--<p class="text-right">
   <a class="btn btn-primary" href="/post/create" role="button">
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Criar Post
   </a>
</p>-->

<div class="panel panel-primary">
   <div class="panel-heading">
      Lista de Projetos
   </div>
   
   <table class="table table-hover">
      <thead>
         <tr>
            <td>Projeto</td>
            <td>Cliente</td>
            <td>Nome do projeto</td>
            <td>Progresso</td>
            <td>Status</td>
            <td>Editar</td>
            <td>Excluir</td>
         </tr>
      </thead>
      <tbody>
         @foreach ($projetos as $projeto)
         <tr>
             <td>{{ $projeto['project_id'] }}</td>
             <td>{{ $projeto['client_id'] }}</td>
             <td>{{ $projeto['name'] }}</td>
             <td>{{ $projeto['progress'] }}</td>
             <td>{{ $projeto['status'] }}</td>
            <td width="1%" align="center"></td>
            <td width="1%" align="center"></td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection