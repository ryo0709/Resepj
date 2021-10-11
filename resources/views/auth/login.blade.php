<style>
    .head {
        margin-bottom: 20px;
    }

    .input {
        margin: 0 20px 0 20px;
        height: 28px;
        width: 340px;
        border-bottom: 1px solid #cccccc;
        border-right: none;
        border-left: none;
        border-top: none;
        border-radius: 0px;
        display: block;
    }

    .input_wrap {
        margin: 10px 20px;
        width: 300px;
        background-color: white;
    }

    .section {
        width: 400px;
        margin: 200px auto;
        display: block;
        background-color: white;
        padding-bottom: 10px;
        border: solid 1px #BBBBBB;
        border-radius: 5px;
        box-shadow: 1px 1px 1px #BBB;
    }

    .head {
        background-color: blue;
        color: white;
        border-radius: 5px 5px 0 0;
        padding: 20px;
        font-size: 18px;
    }

    .mail-solid.icon {
        color: #000;
        position: absolute;
        margin-left: 12px;
        margin-top: 18px;
        width: 15px;
        height: 10px;
        border-radius: 1px;
        border: solid 1px currentColor;
        background-color: currentColor;
    }

    .mail-solid.icon:before {
        content: '';
        position: absolute;
        left: 7px;
        top: -4px;
        width: 1px;
        height: 10px;
        color: white;
        background-color: currentColor;
        -webkit-transform-origin: bottom;
        transform-origin: bottom;
        -webkit-transform: rotate(-54deg);
        transform: rotate(-54deg);
    }

    .mail-solid.icon:after {
        content: '';
        position: absolute;
        left: 7px;
        top: -4px;
        width: 1px;
        height: 10px;
        color: white;
        background-color: currentColor;
        -webkit-transform-origin: bottom;
        transform-origin: bottom;
        -webkit-transform: rotate(54deg);
        transform: rotate(54deg);
    }

    .lock-solid.icon {
        color: #000;
        position: absolute;
        margin-left: 13px;
        margin-top: 24px;
        width: 13px;
        height: 6px;
        border-radius: 1px;
        border: solid 1px currentColor;
        background-color: currentColor;
    }

    .lock-solid.icon:before {
        content: '';
        position: absolute;
        left: 3px;
        top: -8px;
        width: 5px;
        height: 6px;
        border-radius: 4px 4px 0 0;
        border-top: solid 1px currentColor;
        border-left: solid 1px currentColor;
        border-right: solid 1px currentColor;
    }

    .btn {
        background-color: blue;
        color: white;
        width: 80px;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 12px;
    }

    .btn_wrap {
        text-align: right;
        margin: 20px;
    }

    
</style>
@extends('layouts.default')
@section('content')

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="section">
        <div class="head" style=" color:white;">
            <p>login</p>
        </div>
        <!-- Email Address -->
        <div style="display:flex;">
            <div class="mail-solid icon">
            </div>
            <div class="input_wrap">
                <input id="email" class="input" type="email" name="email" value="{{old('email')}}" required autofocus placeholder="email" style="background-color:white;" />
            </div>
        </div>
        <!-- Password -->
        <div style="display:flex;">
            <div class="lock-solid icon"></div>
            <div class="input_wrap"><input id="password" class="input" type="password" name="password" required autocomplete="current-password" placeholder="password" :value="{{old('password')}}" /></div>
        </div>
        <div class="btn_wrap" style=" text-align: right;">
            <button type="submit" class="btn">ログイン</button>
        </div>
    </div>
</form>
@endsection