@extends('admin.layouts.app')
@section('title', 'Listagem dos usuários')
@section('content')

<h1>Usuários</h1>

<a href="{{ route('users.create')}}">Novo</a>

{{--@include('admin.includes.errors')--}}
<x-alert/>

@if (session()->has('success'))
    {{session('success')}}
@endif
    

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td> {{$user->name}}</td>
                    <td> {{$user->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id)}}">Edit</a>
                         <a href="{{ route('users.show', $user->id)}}">Detalhes</a> 
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">>Nenhum usuário</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $users->links()}}

@endsection

