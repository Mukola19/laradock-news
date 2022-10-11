@extends('layouts.admin')




@isset($article)
    @section('title', 'Редегування')
@else
@section('title', 'Створення')
@endisset


@section('content')
<div class="container-fluid pt-3">

    <div class="row mb-3 pt-3">
        <div class="col-sm-6">
            <h1 class="m-0">
                @isset($article)
                    Редегування статті
                @else
                    Створення статті
                @endisset
            </h1>
        </div>

    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning">
            {{ session()->get('warning') }}
        </div>
    @endif



    <div class="card card-primary">
        <form method="POST" enctype="multipart/form-data"
            @isset($article)
               action="{{ route('admin.articles.update', $article) }}"
            @else
               action="{{ route('admin.articles.store') }}"
            @endisset>

            @isset($article)
                @method('PUT')
            @endisset
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="article">Назва статті</label>
                    <input name="title" class="form-control" id="article" placeholder="Ведіть назву статті"
                        value="{{ $article->title ?? old('title') }}">

                        {{ old('img')}}

                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif

                </div>

                <div class="form-group">
                    <label for="text">Текст статті </label>
                    <textarea name="text" class="form-control overflow-hidden" id="text" placeholder="Ведіть текст статті">{{ $article->text ?? old('text') }}</textarea>

                    @if ($errors->has('text'))
                        <span class="text-danger">{{ $errors->first('text') }}</span>
                    @endif

                </div>

                <div class="form-group">

                    <label for="uploadImg" class="form-label">Загрузка зображення</label>
                    <input class="form-control form-control" id="uploadImg" type="file" name="img">

                    @if ($errors->has('img'))
                        <span class="text-danger">{{ $errors->first('img') }}</span>
                    @endif
                </div>

                <div class="col-md-12 mb-3 " id="preview-image">
                    @isset($article)
                        <img alt="preview image" src="{{ asset('storage/' . $article->img) }}" style="max-height: 250px;">
                    @endisset
                </div>

                <div class="form-group">
                    <label for="tags">Тегі статті</label>
                    <input class="form-control" type="text" data-role="tagsinput" name="tags" id="tags"
                        placeholder="Добавте тег" value="{{ $article->tags ?? old('tags') }}">

                </div>

                <div class="form-group form-check">
                    <input type="checkbox" name="active" class="form-check-input" id="active" checked
                        value="{{ $article->active ?? old('active') }}">
                    <label class="form-check-label" for="active">Показувати статтю</label>

                    @if ($errors->has('active'))
                        <span class="text-danger">{{ $errors->first('active') }}</span>
                    @endif
                </div>


            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>
    </div>





</div>
@endsection
