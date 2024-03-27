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


        /* CSS for responsiveness */
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                @livewire('menu.menu-index')
            </div>
            <div class="col-sm-6">
                @livewire('menu.checkout')
            </div>
        </div>
    </div>
@endsection
