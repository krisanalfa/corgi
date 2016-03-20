@extends('layouts.app')

@section('content')
<div class="corgi-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="corgi-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Home</span>

            <div class="mdl-layout-spacer"></div>

            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>

            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">About</li>
                <li class="mdl-menu__item">Contact</li>
                <li class="mdl-menu__item">Legal information</li>
            </ul>
        </div>
    </header>

    <div class="corgi-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="corgi-drawer-header">
            <img src="{{ asset('/img/user.jpg') }}" class="corgi-avatar">

            <div class="corgi-avatar-dropdown">
                <span>hello@example.com</span>

                <div class="mdl-layout-spacer"></div>

                <button id="menu-button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Menu</span>
                </button>

                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-button">
                    <li class="mdl-menu__item"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">power</i>Logout</li>
                    <li class="mdl-menu__item"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">settings</i>Change Password</li>
                </ul>
            </div>
        </header>

        <nav class="corgi-navigation mdl-navigation mdl-color--blue-grey-800">
            <span class="mdl-navigation__link"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</span>
        </nav>
    </div>

    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid corgi-content"></div>
    </main>
</div>
@endsection
