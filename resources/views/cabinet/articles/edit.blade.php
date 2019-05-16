@extends('layouts.cabinet')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-24">
                <div class="title-widget">
                    <h1>Добавление новой статьи</h1>
                </div>
            </div>
            <div class="col-xl-18">
                <div class="wrap-create-form none-style">
                    <div class="row">
                        <div class="col-xl-24">
                            <div class="wrap-form-create">
                                <div class="form-create">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{route('cabinet.articles.update', ['article' => $article->id])}}" method="post" class="needs-validation" novalidate id="form-article">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-xl-24">
                                                <input class="title form-control" type="text" name="title" value="{{ $article->title }}" placeholder="Введите тему статьи" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-24">
                                                <div>
                                                    <input class="date form-control" style="width: 170px !important; display: inline-block;"  type="text" name="date" id="filter-date" value="{{ $article->created_at }}" required/>
                                                    <label for="filter-date"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-24">
                                                <div class="input-group mb-3" style="width: 170px !important;">
                                                    <select class="custom-select" id="inputGroupSelect02" name="tag" required>

                                                        @if(isset($tags))
                                                            @foreach($tags as $tag)
                                                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                                                            @endforeach
                                                        @endif
                                                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-24">
                                                <textarea class="form-control" name="text" placeholder="Введите текст" required>{{$article->text}}</textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-24">
                                                <button class="btn-add" type="submit">Добавить статью</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="link">
                                        <a href="{{route('main')}}"> <-- В статьи</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
            </div>
        </div>
    </div>
@endsection