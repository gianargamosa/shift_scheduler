@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set Sched</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/employee/create_shift">
                        {{ csrf_field() }}
                        <!-- {{ method_field('PUT') }} -->
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Position</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position" value="" required autofocus>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" value="" required autofocus>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shift_schedule') ? ' has-error' : '' }}">
                            <label for="shift_schedule" class="col-md-4 control-label">Shift Schedule</label>

                            <div class="col-md-6">
                                <input id="shift_schedule" type="text" class="form-control" name="shift_schedule" value="" required autofocus>

                                @if ($errors->has('shift_schedule'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shift_schedule') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Information
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
