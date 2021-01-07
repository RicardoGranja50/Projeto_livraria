@extends('layout')

    @if(Gate::allows('admin'))

        Utilizadores:
        @foreach($users as $user)
        <ul>
            <li>
            {{$user->name}}<br>
            </li>
        </ul>
        @endforeach
    @endif