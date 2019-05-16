@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-18">
                <div class="title-widget">
                    <h1>Блог</h1>
                </div>
                <div class="articles">
                    <div class="row">
                        <div class="col-xl-24">
                            <div class="wrap-article">
                                @foreach($articles as $article)
                                <div class="article">
                                    <div class="article__title">
                                        <h2>{{$article->title}}</h2>
                                    </div>
                                    <div class="article__date-tags">
                                        <span class="date">{{$article->created_at}}</span>
                                        <span class="line">/</span>
                                        <span class="tags">
                                            @foreach($article->tags as $tag)
                                                @if($article->tags->last()->id === $tag->id)
                                                    <span>{{$tag->title }} </span>
                                                @else
                                                    <span>{{$tag->title }}, </span>
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                    <div class="article__text">
                                        {!! mb_strimwidth($article->text, 0, 400, "...") !!}
                                    </div>
                                    <div class="article__more">
                                        <a href="{{route('article',['id' => $article->id])}}">Читать далее</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="to-add-article">
                    @guest
                        <a href="{{ route('login') }}">Добавить статью</a>
                    @else
                        @if($userAuth->role === 'admin')
                            <a href="{{ route('admin.articles.create') }}">Добавить статью</a>
                        @else
                            <a href="{{ route('cabinet.articles.create') }}">Добавить статью</a>
                        @endif
                    @endguest

                </div>
                <div class="right-bar">
                    <div class="title-bar">
                        <h3>Теги</h3>
                    </div>
                    <div class="tags">
                       @foreach($tags as $tag)
                           @if($tag->id % 2 === 0)
                            <a href="#" class="tag-big">{{$tag->title}}</a>
                               @else
                                <a href="#" class="tag-extra-small">{{$tag->title}}</a>
                            @endif
                               @if($tag->id % 4 === 0)
                                   <a href="#" class="tag-small">php</a>
                               @endif
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection