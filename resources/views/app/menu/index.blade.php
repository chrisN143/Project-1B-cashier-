@extends('layouts.app')

@section('after_css')
    <style>
        .btn1 {
            border: 1px solid;

            border-radius: 0px;

            font-size: 2px;
        }

        .btn1:hover {
            background-color: #2874f0;

            color: #fff;
        }

        .input-quantity {
            border: 1px solid #000;

            /* margin-right: 3px; */

            font-size: 10px;

            width: 10%;

            outline: none;
            text-align: center;
        }

        .wrapper {
            height: 35px;
            min-width: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        .wrapper span {
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
        }

        .wrapper span.num {
            font-size: 13px;
            border-right: 2px solid rgba(0, 0, 0, 0.2);
            border-left: 2px solid rgba(0, 0, 0, 0.2);
            pointer-events: none;
        }

        .wrapper span.minus:hover {
            background-color: #2874f0;

            color: #fff;
        }

        .wrapper span.plus:hover {
            background-color: #2874f0;

            color: #fff;
        }

        .checkout-button {
            background-color: #c0bfbf;
            color: rgb(0, 0, 0);
            font-weight: 500;
            border: none;
            padding: 15px 15px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 50px;
            text-decoration: none;

        }

        .checkout-button:hover {
            background-color: #3adc63;
        }

        .shopping-cart.cart-header {
            padding: 10px;
        }

        .shopping-cart>.cart-header>.row>.col-cart-header h4 {

            font-size: 5px;
            margin-bottom: 0px;
        }

        .shopping-cart.cart-item a {
            text-decoration: none;
        }

        .shopping-cart.cart-item {
            background-color: #fff;

            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0/ 8%);

            padding: 10px 10px;

            margin-top: 10px;
        }

        .shopping-cart .cart-item .product-name {
            font-size: 14px;

            font-weight: 600;
            text-transform: capitalize;

            width: 100%;

            white-space: nowrap;

            text-overflow: ellipsis;

            overflow: hidden;

            cursor: pointer;
        }

        .shopping-cart .cart-item .price {
            font-size: 12px;

            font-weight: 600;

            padding: 4px 2px;
        }

        .btn1 {
            border: 1px solid;


            border-radius: 0px;

            font-size: 5px;
        }

        .btn1:hover {
            background-color: #2874f0;

            color: #fff;
        }

        .input-quantity {
            border: 1px solid #000;


            font-size: 10px;

            width: 10%;

            outline: none;

            text-align: center;
        }

        /* CSS for responsiveness */
        @media only screen and (max-width: 600px) {

            /* Change table layout to columns */
            table {
                display: block;
                overflow-x: auto;
                width: 100%;
            }

            /* Ensure table cells display as block elements */
            table td,
            table th {
                display: block;
                text-align: left;
            }

            /* Optional: Style table header cells */
            table th {
                background-color: #f2f2f2;
            }

            /* Optional: Add padding and border to table cells */
            table td,
            table th {
                border: 1px solid #dddddd;
                padding: 8px;
            }
        }
    </style>
@endsection

@section('content')
    <div>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="overflow-y: auto; max-height: 100vh;">
                @livewire('menu.menu-index')
            </div>
            <div class="col-md-6">
                @livewire('menu.checkout')
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @media (max-width: 800px) {
                .col-md-6 {
                    width: 100%;
                }
            }
        </style>
    @endpush
@endsection
