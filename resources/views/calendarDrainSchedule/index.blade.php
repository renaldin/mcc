@extends('Layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div id="external-events"> 
      </div>
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar" data-calendar='{{ json_encode($dataCalendar) }}'></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection
