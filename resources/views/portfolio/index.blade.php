@extends('layouts.app')

@section('title', config('portfolio.name') . ' — BSIT Student & Web Developer')
@section('description', 'The online portfolio of ' . config('portfolio.name') . ', a fourth-year BS Information Technology student at ' . config('portfolio.school') . '. Explore his background, projects, and GitHub repositories.')

@section('content')
    @include('partials.hero')
    @include('partials.about')
    @include('partials.education')
    @include('partials.projects')
    @include('partials.github')
    @include('partials.contact')
@endsection
