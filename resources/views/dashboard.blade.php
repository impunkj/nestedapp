<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>{{  __('Dashoard')  }}</title>
        @if(session('success'))
        <li>{{session('success')}}</li>
        @endif
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach    

    </head>
    <body >

        <h1> {{  __('Pages')  }}</h1>
            
        <a href="{{ route('pagecreate') }}"> {{  __('Create Pages') }} </a>    
        <table class="table-auto">
              <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Parent ID') }}</th>
                <th>{{ __('Slug') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Action') }}</th>
              </tr>

                @foreach ($allpages as $item)
                            <tr>
                                <td>{{ $item->id  }}</td>
                                <td>{{ $item->parentid }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->title }}</td>
                                <td> <a href="{{ url( 'pages/' . $item->getParentsSlug($item->id) )  }}"> View</a></td>
                            </tr>
                            @endforeach
            </table>


    </body>
</html>
