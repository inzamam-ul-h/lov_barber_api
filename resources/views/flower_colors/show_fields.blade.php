
<div class="row form-group">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-4">
              {!! Form::label('title', 'Title [En]:') !!}
            </div>
            <div class="col-sm-8">
               <p>{{ $Model_Data->name }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
              {!! Form::label('value', 'Value:') !!}
            </div>
            <div class="col-sm-8">
               <p>{{ $Model_Data->value }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('created_at', 'Created At:') !!}
            </div>
            <div class="col-sm-8">
                <p>{{ $Model_Data->created_at }}</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-4">
              {!! Form::label('title', 'Title [Ar]:') !!}
            </div>
            <div class="col-sm-8">
               <p>{{ $Model_Data->ar_name }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
              {!! Form::label('value', 'Color:') !!}
            </div>
            <div class="col-sm-8">
               <p>
			   <?php
			   echo $str = '<span style="background:'.$Model_Data->value.'; width:100px; display:inline-block; border:1px solid black;">&nbsp;</span>';					
               ?>
               </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-4">
                {!! Form::label('updated_at', 'Updated At:') !!}
            </div>
            <div class="col-sm-8">
                <p>{{ $Model_Data->updated_at }}</p>
            </div>
        </div>
    
    
        @if(Auth::user()->can('flower-colors-edit') || Auth::user()->can('all'))
            <div class="form-group row">
                <div class="col-8 text-right">
                    <a href="{{ route('flower-colors.edit', $Model_Data->id) }}" class='btn btn-primary'>
                        Edit
                    </a>
                    <a href="{{ route('flower-colors.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        @endif
        
    </div>
</div>