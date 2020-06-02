@php
    $categories = [
        [
        'id' => 1,
        'name' => 'Miscellanea'
        ],
        [
        'id' => 2,
        'name' => 'Lorem'
        ],
        [
        'id' => 3,
        'name' => 'ispum'
        ],
        [
        'id' => 4,
        'name' => 'Dolor'
        ],
        [
        'id' => 5,
        'name' => 'Sit'
        ]
    ];

    $tags = [
        [
            'id' => 1,
            'name' => 'Tag 1'
        ],
        [
            'id' => 2,
            'name' => 'Tag 2'
        ],
        [
            'id' => 3,
            'name' => 'Tag 3'
        ],
        [
            'id' => 4,
            'name' => 'Tag 4'
        ],
        [
            'id' => 5,
            'name' => 'Tag 5'
        ],
        [
            'id' => 6,
            'name' => 'Tag 6'
        ],
        [
            'id' => 7,
            'name' => 'Tag 7'
        ],
    ];

    $photos = [
        [
            'id' => 1,
            'title' => 'lorem ipsum',
            'path' => 'image/nomefoto.jpg'
        ],
        [
            'id' => 2,
            'title' => 'Due lorem ipsum',
            'path' => 'image/nomefoto.jpg'
        ],
        [
            'id' => 3,
            'title' => 'Tre lorem ipsum',
            'path' => 'image/nomefoto.jpg'
        ],
    ];

    $page = [
        'id' => 1,
        'title' => 'lorem ipsum',
        'summary' => 'lorem ipsum',
        'body' => 'Questo è un testo',
        'category_id' => 3,
        'tags' => [
            1,
            3,
            5
        ],
        'photos' => [
            3,
            2
        ]
    ];

    $oldtags = [
        1,
        2
    ];

    $oldtags = null;

    $message = '';

@endphp

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.pages.index')}}">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h2>Inserisci una nuova pagina</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Inserisci un titolo" value="{{$page['title']}}">
                                @error('title')
                                    <small class="form-text">Errore</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="summary">Summary</label>
                                <input type="text" class="form-control" id="summary" placeholder="Inserisci il sommario" value="{{$page['summary']}}">
                                @error('summary')
                                    <small class="form-text">Errore</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="custom-select">
                                    {{--
                                        $category_id = $page['category_id'];
                                        $message = '';

                                        foreach ($categories as $key => $category) {
                                            if($category['id'] == $category_id) {
                                                $message = 'selected';
                                            }
                                        }
                                    --}}
                                    @foreach ($categories as $category)
                                        @if($category['id'] == $page['category_id'])
                                            @php
                                            var_dump($category['id'],$category['id'] == $page['category_id']);
                                                $message = 'selected';
                                            @endphp
                                            <option value="{{$category['id']}}" {{$message}}>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category')
                                    <small class="form-text">Errore</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" id="body" rows="10">{{$page['body']}}</textarea>
                                @error('body')
                                    <small class="form-text">Errore</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <legend>Tags</legend>
                                    @foreach ($tags as $tag)
                                        <div class="form-check form-check-inline">
                                            {{-- $oldtags = [
                                                1,
                                                2
                                            ] --}}
                                            {{-- $tag['id'] è dentro al mio array di tags della pagina?
                                            $page['tags'] --}}
                                            @if(is_array($oldtags))
                                                <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}" {{(in_array($tag['id'], $oldtags)) ? 'checked' : ''}}>
                                            @else
                                                <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}" {{(in_array($tag['id'], $page['tags'])) ? 'checked' : ''}}>
                                            @endif
                                            {{-- <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}" {{((is_array($oldtags) && in_array($tag['id'], $oldtags)) || in_array($tag['id'], $page['tags'])) ? 'checked' : ''}}> --}}
                                            <label class="form-check-label" for="tag{{$tag['id']}}">{{$tag['name']}}</label>
                                        </div>
                                    @endforeach
                                    @error('tags')
                                        <small class="form-text">Errore</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <legend>Photos</legend>
                                    @foreach ($photos as $photo)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="photos[]" id="photo{{$photo['id']}}" value="{{$photo['id']}}" {{(in_array($photo['id'], $page['photos']) == true) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="photo{{$photo['id']}}">{{$photo['title']}}
                                                <img src="{{$photo['path']}}" alt="">
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('photos')
                                        <small class="form-text">Errore</small>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Salva">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
