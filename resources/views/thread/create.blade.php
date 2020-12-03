@extends('layouts.front')

@section('heading')

@section('content')

        <div class="well container bg-light m-5 p-3">

                <h2 class='text-success m-2'>Create thread</h2>
                <form class='form-vertical' action="{{route('thread.store')}}" method='post' role='form' id='create-thread-form'>
                 {{csrf_field()}}

                 <div class="form-group">
                    
                 <input type="text" class="form-control" name='subject' id=''  placeholder='Enter Thread Subject' value="{{old('subject')}}">
                 </div>


                 <div class="form-group">
                        <label for="tag"> Tags</label>
                        <select class="form-control" name="tags[]" multiple id="tag">
         
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                         @endforeach
                 </select>

                 </div>
                
                
                 <div class="form-group">

                    <label for="thread"> Enter your thread here</label>
                    <textarea class="form-control" name="thread" id="" placeholder="Write your thread here"> {{old('thread')}}</textarea>
    
                     </div>
					 
					{{-- <div class="form-group">
					 {!! NoCaptcha::renderJs() !!}

                {!! NoCaptcha::display(); !!}

                 </div>--}}
                
                
                <div class="row justify-content-end">
                
                     <button type="submit" class="btn btn-success m-1">Submit</button>
                     <a  href="/" class="btn btn-danger m-1">Back</a>
                </div>
                </form>

        </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>

    <script>

        $(function () {
            $('#tag').selectize();
        })
    </script>
@endsection