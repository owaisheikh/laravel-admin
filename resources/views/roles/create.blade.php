<x-app-layout>
    <div class="content-wrap">
       <div class="main">
          <div class="container-fluid">
             <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                   <div class="page-header">
                      <div class="page-title">
                         <h1>Role Create</h1>
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
                                <form method="POST" action="{{ route('roles.store') }}">
                                    @csrf                                  
                                    <div class="row col-lg-12">
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                           <label>Name</label>
                                           <input type="text" class="form-control" placeholder="User Name" 
                                           id="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                           @error('name')
                                               <span class="text-danger">{{ $message }}</span>
                                           @enderror                                        </div>
                                     </div>

                                     <div class="col-lg-6">
                                        <div class="form-group" style="text-align: end;">
                                            <button type="submit" class="btn btn-success btn-flat m-b-10 m-l-5 " style="text-align: right;">Save</button>
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