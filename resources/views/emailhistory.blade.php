@extends('layouts.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{ route('dashobard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Email List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    <div class="container-fluid mt-4">
    <div class="card">
            <div class="card-body">
                <table class="table-res table-stripped" id="emailTable">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>message</th>
                            <th>send date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($del_email as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{ $val['cust_name'] }}</td>
                                <td>{{ $val['email'] }}</td>
                                <td>{{ $val['message'] }}</td>
                                <td>
                                    {{ $val['date'] }}
                                </td>
                                <td> 
                                    @if($val['status'] == 1)
                                        <span class="badge bg-success">Delivered</span>
                                    @else 
                                        <span class="badge bg-danger">Failed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>
@endsection

@section('scripts')

<script>
     $(function() {
        $('#emailTable').DataTable({
        });
    }); 
</script>

@endsection