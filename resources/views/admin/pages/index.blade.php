@php
    $pages = [
        [
            'id' => 1,
            'title' => 'lorem ipsum dolor sit',
            'category' => 1,
            'tags' => [
                1,
                3,
                5
            ],
        ],
        [
            'id' => 2,
            'title' => 'Titolo lorem ipsum dolor sit',
            'category' => 1,
            'tags' => [
                4,
                6,
                8
            ],
        ],
        [
            'id' => 3,
            'title' => 'TRE lorem ipsum dolor sit',
            'category' => 2,
            'tags' => [
                1,
                3,
                5
            ],
        ],
    ];
@endphp

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pages</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h2>Pages</h2>
                    </div>
                    <div class="offset-3 col-3 text-right">
                        <a href="{{route('admin.pages.create')}}">Crea una pagina</a>
                    </div>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{$page['id']}}</td>
                                <td>{{$page['title']}}</td>
                                <td>{{$page['category']}}</td>
                                <td>
                                    @foreach ($page['tags'] as $tag)
                                        {{$tag}}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td><a class="btn btn-primary" href="#">Visualizza</a></td>
                                <td><a class="btn btn-info" href="#">Modifica</a></td>
                                <td>
                                    <form action="">
                                        <input class="btn btn-danger" type="submit" value="Elimina">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
