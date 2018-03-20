<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$setting->title}}</title>   

    <link rel="icon"
        type="image/png" 
        href="{{$setting->icon}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
      UPLOADCARE_LOCALE = "en";
      UPLOADCARE_TABS = "file url facebook gdrive gphotos dropbox instagram evernote flickr skydrive";
      UPLOADCARE_PUBLIC_KEY = "d40a44beaab270cc4a69";
    </script>
    <script charset="utf-8" src="//ucarecdn.com/libs/widget/3.2.2/uploadcare.full.min.js"></script>
</head>
<body>
    <div id="app">
        <v-app v-cloak>
                <front-end-menu @if($setting->icon_in_top_left) icon="{{$setting->icon}}" @endif top-left="{{$setting->menu_text}}" background-color="{{$setting->header_color}}"></front-end-menu>
                <modal-container v-if="showingPhotos || showingSubscribers" class="modal-container">
                    <manage-photos v-if="showingPhotos"></manage-photos>
                    <subscribers v-if="showingSubscribers"></subscribers>
                </modal-container>
                <modal-container v-if="alert.showing">
                    <v-alert :type="alert.type" :value="true" dissmissable>@{{alert.message}}</v-alert>
                </modal-container>
            <div style="margin-top: 48px;">
                @yield('content')
            </div>
            {!!$setting->footer!!}
            @if(Auth::user())
                <div style="z-index: 999;" class="pos-fixed bottom right">
                    <v-btn color="primary" href="/dashboard">Go to dasboard</v-btn>
                </div>
            @endif
        </v-app>
    </div>

    <!-- Scripts -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>