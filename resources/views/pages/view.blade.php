<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>{{  __('Create Pages')  }}</title>
    </head>
    <body >
      @if(session('success'))
      <li>{{session('success')}}</li>
      @endif
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach    
      
      <div class="row">
        <h1>{{  $current_page_data->title }}</h1>  

        <p>
        {{  $current_page_data->content }}  
        </p>
      </div>
    </body>


</html>
