<x-app-layout>
    <div class="content-wrap">
       <div class="main">
          <div class="container-fluid">
             <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                   <div class="page-header">
                      <div class="page-title">
                         <h1>User update</h1>
                      </div>
                   </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                   <div class="page-header">
                      <div class="page-title">
                         <ol class="breadcrumb">
                            {{-- 
                            <li class="breadcrumb-item active"><a href="/users/create" class="badge badge-success">Create User</a></li>
                            --}}
                            {{-- 
                            <li class="breadcrumb-item ">Home</li>
                            --}}
                         </ol>
                      </div>
                   </div>
                </div>
                <!-- /# column -->
             </div>
             <!-- /# row -->
             <section id="main-content">
                <div class="row">
                    
                   <div class="col-lg-12">
                      <div class="card">
                         <div class="card-title">
                            @if (\Session::has('success'))
                                <div class="alert alert-primary alert-dismissible fade show col-md-12">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>                      
                                </div>
                                
                            @endif
                         </div>
                         <div class="card-body">
                            <div class="basic-elements">
                                <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                                    @csrf                                  
                                    <div class="row col-lg-12">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                           <label>Name</label>
                                           <input type="text" class="form-control" placeholder="User Name" 
                                           id="name" name="name" value="{{ ($user->name) ? $user->name : ''}}" required autofocus autocomplete="name" />
                                           @error('name')
                                               <span class="text-danger">{{ $message }}</span>
                                           @enderror                                        </div>
                                     </div>
                                     <div class="col-lg-6">                                     
                                        <div class="form-group">
                                           <label>Email</label>
                                           <input type="email" readonly class="form-control" placeholder="Email" 
                                           id="email" name="email" value="{{ ($user->email) ? $user->email : ''}}" required autocomplete="username" />
                                           @error('email')
                                               <span class="text-danger">{{ $message }}</span>
                                           @enderror                                        
                                        </div>
                                     </div>
                                    </div>

                                    <div class="row col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" 
                                            id="password" name="password" required autocomplete="new-password" />
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror                                        </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password_confirmation" >Confirm Password</label>
                                                <input type="password" class="form-control" placeholder="Password" 
                                                id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="number" class="form-control" value="{{ ($user->phone_number) ? $user->phone_number : ''}}" name="phone_number" id="phone_number">
                                                @error('phone_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror   
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label></label>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" {{ ($user->status == 1)  ? 'checked' : ''}} checked />
                                                        <label class="form-check-label" for="status">Status</label>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="form-control" name="role" id="role">
                                                    <option value="0">N/A</option>
                                                    @foreach ($roles as $role)
                                                    <option {{ ($user->role) ? 'selected' : ''}} value="{{  $role->id }} ">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('role')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror 
                                                {{-- <input type="number" class="form-control" name="phone_number" id="phone_number"> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group" style="text-align: end;">
                                                <button type="submit" class="btn btn-success btn-flat m-b-10 m-l-5 " style="text-align: right;">Update</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                  </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </section>
          </div>
       </div>
    </div>
 </x-app-layout>