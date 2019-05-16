@extends('layouts.cabinet')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-18">
                <div class="title-widget">
                    <h1>Блог</h1>
                </div>
                @if(isset($articles))
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
                    @else
                    <h3> У вас еще нет созданных статей.</h3>
                @endif

            </div>
            <div class="col-xl-6">
                <div class="to-add-article">
                    <a href="{{route('cabinet.articles.create')}}">Добавить статью</a>
                </div>
                <div class="right-bar">
                </div>
            </div>
        </div>
    </div>
@endsection