@extends('admin.layouts.app')
@section('title', 'Criar novo usuário')
@section('content')
    <h1>Novo usuário</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.store')}}" method="POST">
    @include('admin.users.partials.form')
</form>
 @endsection