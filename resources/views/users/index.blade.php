<x-app-layout>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Users List</h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="users/create" class="badge badge-success">Create User</a></li>
                                {{-- <li class="breadcrumb-item ">Home</li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    {{-- {{ dd(count($users[2]->roles) > 0 ? '1' : '0')}} --}}
                    @if (\Session::has('success'))
                        <div class="alert alert-primary alert-dismissible fade show col-md-12">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>                      
                        </div>
                        
                    @endif
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>
                                                    @if ( count($user->roles) > 0 )
                                                        @foreach ($user->roles as $role)
                                                            <span class="badge badge-primary">
                                                                {{$role->name }}
                                                            </span>
                                                        @endforeach    
                                                    @else
                                                    <span class="badge badge-danger">
                                                        N/A
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->status == 1)
                                                        <span class="badge badge-success">ACTIVE </span>
                                                        @else
                                                        <span class="badge badge-danger">IN-ACTIVE </span>
                                                    @endif
                                                </td>
                                                
                                                <td class="badge badge-primaryy" >
                                                    <span title="Edit"><a href="/users/edit/{{$user->id}}" class="ti-pencil-alt icon-syle-custom"></a></span> | 
                                                    <span title="Delete"><a href="/users/delete/{{$user->id}}" class="ti-trash icon-syle-custom "></a></span>
                                                </td> 
                                                {{-- <td></td> --}}
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        {{-- </div>
                    </div> --}}
                </div>
            </section>
        </div>
    </div>
</div>
</x-app-layout>
