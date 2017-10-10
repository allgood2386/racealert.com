@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Track Configuration
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($trackConfiguration, ['route' => ['trackConfigurations.update', $trackConfiguration->id], 'method' => 'patch']) !!}

                        @include('track_configurations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection