@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Timesheet</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                      <tr>
                          <th>Employee Code</th>
                          <th>Employee Name</th>
                          <th>Shift Schedule</th>
                          <th>Date</th>
                          <th>Time In</th>
                          <th>Time Out</th>
                          <th>Total Hours</th>
                          <th>Basic Hours</th>
                          <th>Tardy</th>
                          <th>Undertime</th>
                          <th>Overtime</th>
                          <th>Mid Break</th>
                      </tr>
                      @foreach($user_data as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->last_name }} {{ $user->first_name }} {{ $user->middle_name }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($user->shift_schedule_in)->format('g:i A') }} -
                                {{ Carbon\Carbon::parse($user->shift_schedule_out)->format('g:i A') }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($user->created_at)->toDayDateTimeString() }}
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($user->time_in)->format('g:i A') }}
                            </td>
                            @if($user->time_out == 0)
                                <td>N/A</td>
                                <td>No Time Out yet</td>
                            @else
                                <td> {{ Carbon\Carbon::parse($user->time_out)->format('g:i A') }}</td>
                                <td>
                                    {{ round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) }} Hr/s
                                </td>
                            @endif
                            <td>
                                {{ round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2) }} Hr/s
                            </td>
                            <!-- Tradyness -->
                            <td></td>
                            <!-- @if($user->time_out == 0)
                                <td>No Time Out yet</td>
                            @else
                                @if(strtotime($user->time_in) < strtotime($user->shift_schedule_in))
                                    <td>
                                        {{ round(round(abs(strtotime($user->time_in) - strtotime($user->shift_schedule_in)) / 60 ) / 60, 2) }} Hr/s Approx. ({{round(round(abs(strtotime($user->time_in) - strtotime($user->shift_schedule_in)) / 60 ), 2) }}) mins
                                    </td>
                                @else
                                    <td>
                                        
                                    </td>
                                @endif

                                @if(round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) > round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2))
                                    <td>
                                        {{ round(round(abs(strtotime($user->time_in) - strtotime($user->shift_schedule_in)) / 60 ) / 60, 2) }} Hr/s Approx. ({{round(round(abs(strtotime($user->time_in) - strtotime($user->shift_schedule_in)) / 60 ), 2) }}) mins
                                    </td>
                                @else
                                    <td>
                                        {{ round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) - round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2) }} Hr/s
                                    </td>
                                @endif
                            @endif -->

                            @if($user->time_out == 0)
                                <td>No Time Out yet</td>
                            @else
                                @if(round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) > round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2))
                                    <td>N/A</td>
                                @else
                                    <td>
                                        {{ round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) - round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2) }} Hr/s
                                    </td>
                                @endif
                            @endif

                            <!-- @if($user->time_out == 0)
                                <td>No Time Out yet</td>
                            @else
                                @if(round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) < round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2))
                                    <td>N/A</td>
                                @else
                                    <td>
                                        {{ round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) - round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2) }} Hr/s
                                    </td>
                                @endif
                            @endif -->
                            
                            @if($user->time_out == 0)
                                <td>No Time Out yet</td>
                            @else
                                @if(round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) - round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2) < 1)
                                    <td>N/A</td>
                                @else
                                    <td>
                                        {{ round(round(abs(strtotime($user->time_in) - strtotime($user->time_out)) / 60 ) / 60, 2) - round(round(abs(strtotime($user->shift_schedule_in) - strtotime($user->shift_schedule_out)) / 60 ) / 60, 2) }} Hr/s
                                    </td>
                                @endif
                            @endif
                            <td></td>
                        </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
