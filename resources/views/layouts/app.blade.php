<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RocketContent</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{url('/js/turbolinks.js')}}"></script>
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
            @if(Auth::user())
                <v-toolbar fixed>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn href="/" flat>Visit Site</v-btn>
                        <v-btn href="/dashboard" flat>Dashboard</v-btn>
                        <v-btn href="/posts" flat>Posts</v-btn>
                        <v-btn href="/emails" flat>Emails</v-btn>
                        <v-btn @click="showPhotos" flat>Photos</v-btn>
                        <v-btn @click="showSubscribers" flat>Newsletter Subscribers</v-btn>
                        <form action="/logout" method="post">
                            @csrf
                            <v-btn style="height: 100%;" type="submit" flat>Logout</v-btn>                        
                        </form>
                    </v-toolbar-items>
                </v-toolbar>
            @else            
                <front-end-menu></front-end-menu>
            @endif
                <modal-container v-if="showingPhotos || showingSubscribers" class="modal-container">
                    <manage-photos v-if="showingPhotos"></manage-photos>
                    <subscribers v-if="showingSubscribers"></subscribers>
                </modal-container>
                <modal-container v-if="alert.showing">
                    <v-alert :type="alert.type" :value="true" dissmissable>@{{alert.message}}</v-alert>
                </modal-container>
            <div style="margin-top: 64px;">
                @yield('content')
            </div>
        </v-app>
    </div>

    <!-- Scripts -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>