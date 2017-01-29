@extends('layouts.app')

@section('content')

<div class="container">

    @if(!empty($pictures))
        
        @foreach($pictures->chunk(3) as $picturesRow)
            
            <div class="row" style="padding: 5px 0px;">
                
                @foreach($picturesRow as $picture)
                    
                    <div class="col-md-4 col-xs-12">

                        <!-- <div class="row picture-card" style="padding: 10px"> -->
                            <!-- url({{ $picture->url }}) -->
                            <div class="panel panel-default" style="background-image: url('{{ asset($picture->url) }}');background-position: center center;background-size: cover;height: 480px; margin: auto auto;">
                                
                                <div style="height: 80%;"></div>

                                <div class="panel-body footer-info" style="height: 20%; background-color: rgba(0, 0, 0, 0.5);">
                                
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-xs-12">

                                            <p style="color: white;">{{ $picture->user()->first()->name }}</p>
                                            
                                        </div>
                                        <!-- /.col-md-6 col-md-12 -->
                                        <div class="col-md-6 col-xs-12">
                                            <p><a href="#" style="color: white;">{{ $picture->comments()->count() }} Comments</p></a>   
                                        </div>
                                        <!-- /.col-md-6 col-md-12 -->

                                    </div>
                                    <!-- /.row -->

                                </div>

                            </div>

                        <!-- </div> -->
                        <!-- /.picture-card -->
                        
                        <!-- <img src="{{ $picture->url }}" style="width: 100%" /> -->

                    </div>
                    <!-- /.col-md-3 -->

                @endforeach
    
            </div>
            <!-- /.row -->
    
        @endforeach
        
        <div class="row">
            <div class="col-md-6">
                {!! $pictures->render() !!}
            </div>
        </div>
        <!-- /.row -->

    @else

        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-warning text-center">
                    No Pictures found!
                </p>
            </div>
        </div>
        <!-- /.row -->

    @endif
</div>
<!-- /.container -->


@endsection