@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Time Record</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Total Hours/Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($time_record as $record)
                            <tr>
                                <th scope="row">
                                    {{ Carbon\Carbon::parse($record->created_at)->toDayDateTimeString() }}
                                </th>
                                <td>
                                    {{ Carbon\Carbon::parse($record->time_in)->format('g:i A') }}
                                </td>
                                <td>
                                    @if($record->time_out == 0)
                                        N/A
                                    @else
                                        {{ Carbon\Carbon::parse($record->time_out)->format('g:i A') }}
                                    @endif
                                </td>
                                @if(empty($record->time_in))
                                    <td>
                                        <form action="/home/time_in" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-success" type="submit">Time In</button>
                                        </form>
                                    </td>
                                @elseif($record->time_in && $record->time_out)
                                    <td>
                                        <b>{{ round(round(abs(strtotime($record->time_in) - strtotime($record->time_out)) / 60 ) / 60, 2) }} Hr/s</b>
                                    </td>
                                @else
                                    <td>
                                        <form action="/home/time_out" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="time_record_id" value="{{ $record->id }}">
                                            <button class="btn btn-sm btn-danger" type="submit">Time Out</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                            @endforeach

                            @if(!empty($last_time_record->time_out))
                                <tr>
                                    <td>{{ Carbon\Carbon::now()->toDayDateTimeString() }}</td>
                                    <td>{{ Carbon\Carbon::now()->format('g:i A') }}</td>
                                    <td>N/A</td>
                                    <td>
                                        <form action="/home/time_in" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-sm btn-success" type="submit">Time In</button>
                                        </form>
                                    </td>
                                </tr>

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
