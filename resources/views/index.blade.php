<?php use App\Contents; ?>
@extends('layouts.app')
@section("title",__('Title'))
@section('content')

<div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    <img src="assets/img/logo.svg" alt="" width="512" />
                </div>
            </div>
        </div>
	
	<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
            }
        </style>

@endsection
