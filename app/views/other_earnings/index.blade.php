<?php

function asMoney($value) {
  return number_format($value, 2);
}

?>

@extends('layouts.payroll')
@section('content')

<div class="row">
	<div class="col-lg-12">
  <h3>Earnings</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-12">

 @if (Session::has('flash_message'))

      <div class="alert alert-success">
      {{ Session::get('flash_message') }}
     </div>
    @endif

     @if (Session::has('delete_message'))

      <div class="alert alert-danger">
      {{ Session::get('delete_message') }}
     </div>
    @endif

    <div class="panel panel-default">
      <div class="panel-heading">
          <a class="btn btn-info btn-sm" href="{{ URL::to('other_earnings/create')}}">new employee earning</a>
        </div>
        <div class="panel-body">


    <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Employee</th>
        <th>Earning Type</th>
        <th>Amount</th>
        <th>Action</th>

      </thead>

      

      <tbody>

        <?php $i = 1; ?>
        @foreach($earnings as $earning)

        <tr>

          <td> {{ $i }}</td>
          @if($earning->middle_name == null || $earning->middle_name == '')
          <td>{{ $earning->first_name.' '.$earning->last_name }}</td>
          @else
          <td>{{ $earning->first_name.' '.$earning->middle_name.' '.$earning->last_name }}</td>
          @endif
          <td>{{ $earning->earning_name }}</td>
          <td align="right">{{ asMoney((double)$earning->earnings_amount) }}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('other_earnings/view/'.$earning->id)}}">View</a></li>

                    <li><a href="{{URL::to('other_earnings/edit/'.$earning->id)}}">Update</a></li>
                   
                    <li><a href="{{URL::to('other_earnings/delete/'.$earning->id)}}" onclick="return (confirm('Are you sure you want to delete this employee`s earning?'))">Delete</a></li>
                    
                  </ul>
              </div>

                    </td>



        </tr>

        <?php $i++; ?>
        @endforeach


      </tbody>


    </table>
  </div>


  </div>

</div>

@stop