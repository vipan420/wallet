

@extends('layouts.main')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <section class="box-typical box-typical-max-280 scrollable">
             @if (session()->has('success'))
    <div class="alert alert-success" id="successMessage">
        @if(is_array(session()->get('success')))
        <ul>
            @foreach (session()->get('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @else
            {{ session()->get('success') }}
        @endif
    </div>
@endif
         <header class="box-typical-header">
            <div class="tbl-row">
     
               <div class="tbl-cell tbl-cell-title">
                  <h3>Doctor List</h3>
                  
               </div>
               <div class="tbl-cell tbl-cell-action-bordered">
		<a type="button" href="{{Route('addDoctor')}}" class="action-btn"><i class="font-icon font-icon-plus"></i></a>
	       </div>
            </div>
         </header>
       
            
                  <div class="table-responsive">
                     <table class="table table-hover">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>Fee</th>
                              <th>Image</th>
                              <!--th>Tag</th-->
                              <th>Actions</th>
                         </tr>
                         </thead>
                         
                         <tbody>
                         @foreach($users as $user)
                              <tr>
                              <td>{{$user->name}}</td>
                              <td>{{$user->phoneNumber}}</td>
                              <td>{{$user->address}}</td>
                            
                              <td>{{$user->fee}}</td>
                             
                              <td class="table-photo">
										<img src="http://tamaahs.com/salniazi-app/uploads/{{$user->photoURL}}" alt="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{$user->name}}">
									</td>
                               <!--td>
                               
                               <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
   <div class="btn-group btn-group-sm" style="float: none;"><a type="button" data-toggle="modal" data-target="#myModal" class="addTag tabledit-edit-button btn btn-sm btn-default" style="float: none;" href="javascript:void(0)" data-id="{{$user->id}}"><span class="glyphicon glyphicon-plus"></span></a></div>


</div>
                               
                               
                               </td-->
                              <td>

<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
   <div class="btn-group btn-group-sm" style="float: none;"><a type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;" href="{{route('editDoctor', ['id' => $user->id])}}">Approve</a></div>


</div>
</td>
                              </tr>
                         @endforeach
                         
                         </tbody>
                     </table>
               
               
          {{$users->links()}}
         </div>
         <!--.box-typical-body-->
      </section>
   </div>
   <!--.container-fluid-->
</div>
<script>


$(document).ready(function(){
   $(document).on("click",".addTags",function(){
   html='<div class="form-group row"><div class="col-sm-9"><p class="form-control-static"><input type="text" class="form-control" id="tagName" name="tagName[]" value="" placeholder="Tag Name" style=""  required ></div><div class="col-sm-3"><a type="button" class="del tabledit-edit-button btn btn-sm btn-default pull-right"  href="javascript:void(0)" data-id=""><span class="glyphicon glyphicon-trash"></span></a></div></div>';
   $(".tagForm").append(html);
   
   });

    $("#successMessage").delay(5000).slideUp(300);
});
</script>
@endsection


