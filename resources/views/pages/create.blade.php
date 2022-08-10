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
        <form  id="formsubmit" method="POST" action="{{ route('createpage') }}" >
          @csrf
          <div class="row">
            <label> Title </label>
            <input  type="text" name="title" id="title" onkeyup="assignSlugvalue()" required>

          </div>
          <div class="row"><label> {{ __('Slug')  }}  </label>
            <input  type="text" name="slug"  id="slug" required>

          </div>
          <div class="row"><label> {{ __('Parent ID') }}  </label>
            <select  name="parentid"> 
              <option  value=""> {{ __('Please select Parent ID') }} </option>
              @foreach ($allparent as $item)
                <option value="{{ $item->id }}"> {{ $item->title }}</option>
              @endforeach
            </select>
          </div>

          <div class="row"><label> {{ __('Content')}}  </label>
            <textarea  name="content"  required>


          </textarea>

          </div>          

          <button type="submit"> {{  __('Create a  Page') }}</button> 
        </form> 

<script>

function assignSlugvalue(){
  var regExp = /\s+/g;
  var getvalue = document.getElementById('title').value;
  var getfinalvalue  = getvalue.toLowerCase();
  getfinalvalue = getfinalvalue.replace(regExp,'-');

  document.getElementById('slug').value = getfinalvalue;

}  

  </script>
    </body>


</html>
