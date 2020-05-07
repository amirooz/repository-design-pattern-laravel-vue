@extends('dashboard.master')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Management</h3>

                    <div class="card-tools">
                        @can('user-create')
                            <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> Create New User</a>
                        @endcan
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" style="width: 70px;">
                                                Serial
                                            </th>
                                            <th class="sorting" style="width: 200px;">
                                                Name
                                            </th>
                                            <th class="sorting" style="width: 200px;">
                                                Email
                                            </th>
                                            <th class="sorting" style="width: 100px;">
                                                Role
                                            </th>
                                            <th class="sorting" style="width: 100px;">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $user)
                                        <tr>
                                        <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                              @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                  <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                              @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye green"></i></a> |
                                                @can('user-edit')
                                                    <a href="{{ route('users.edit',$user->id) }}"><i class="fas fa-edit"></i></a>  |
                                                @endcan
                                                @can('user-delete')
                                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                        <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!} -->
                                                        <button type="submit" class="border-0"><i class="fas fa-trash-alt red"></i></button>
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    {!! $data->render() !!}

</div>

@endsection
