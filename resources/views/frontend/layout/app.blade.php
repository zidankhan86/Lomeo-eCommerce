<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

            {{-- Style.CSS --}}
    @include('frontend.components.fixed.style')


    </head>

    <body class="font-display">



                    {{-- Header --}}
                    @include('frontend.components.fixed.header')


                        {{-- Content --}}
                        @yield('content')


                     {{-- Footer --}}
                     @include('frontend.components.fixed.footer')

                     {{-- Script --}}
                     @include('frontend.components.fixed.script')


    </body>

    </html>
