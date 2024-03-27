@extends('layouts.app')

@section('after_css')
    <style>
        .btn1 {
            border: 1px solid;


            border-radius: 0px;

            font-size: 5px;
        }

        .btn1:hover {
            background-color: #2874f0;

            color: #fff;
        }


    </style>
@endsection

@section('content')
    <div>
        <div class="row">
            <div class="col-6">
                @livewire('menu.menu-index')
            </div>
            <div class="col-6">
                @livewire('menu.checkout')
            </div>
        </div>

    @push('styles')
        <style>
            @media (max-width: 800px) {
                .col-6 {
                    width: 100%;
                }
            }
        </style>
    @endpush
@endsection
