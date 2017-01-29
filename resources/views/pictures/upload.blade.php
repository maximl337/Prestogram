@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            
            <div class="panel panel-default">

                <div class="panel-body">
                    <form id="upload-picture" enctype="multipart/form-data" method="post" action="{{ url('upload') }}" role="form">

                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Title *</label>
                            <input id="title" class="form-control " type="text" name="title" maxlength="255" value="{{ old('title') }}" placeholder="Enter a picture title" required />
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                            <label>
                                Picture <input type="file" name="picture">
                            </label>    

                            @if ($errors->has('picture'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('picture') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Upload" class="btn btn-primary form-control">
                        </div>
                        

                    </form>    
                </div>
                <!-- /.panel-body -->
                


            </div>
            <!-- /.panel panel-default -->
            


        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection