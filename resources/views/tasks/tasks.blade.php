@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks List</div>
                <div class="panel-body">
                
                @if(session('success'))
                        <div class="alert alert-success" role='alert'>
                        
                        {{session('success')}}
                         </div>
                        @endif                
                
                <form class="form-horizontal" role="form" method="get" action="{{ route('task.search') }}">
                         <div class="box-header">
                            <div style="padding-bottom: 50px;">
                                <div class="col-md-2">
                                    <span style="font-weight: bold;">Title : </span>
                                </div>
                                <div class="col-md-4">
                                    
                                    <input type="search" name="search" id="search" style="width: 250px;" class="form-control" value="<?php //if(isset($_POST['name'])){ echo $_POST['name']; } ?>" />
                                </div>
                                <!--<div class="col-md-2">
                                    <span style="font-weight: bold;">Status : </span>
                                </div>
                                <div class="col-md-4">
                                    <select id="verified" name="status" style="width: 250px;">
                                        <option value="-1">--Select--</option>
                                        <!--<option value="1" <?php // if(isset($_POST['status']) && $_POST['status']=="1" ){ echo "selected"; } ?>>Active</option>
                                        <option value="0" <?php // if(isset($_POST['status']) && $_POST['status']=="0" ){ echo "selected"; } ?>>In-Active</option>
                                    </select>
                                </div>-->
                                
                            </div>
                            <div style="padding-bottom: 50px;">
                                <div class="col-md-12">
                                <a href="{{ route('task.create') }}"><input type="button" class="btn btn-primary" value="Add Task"/></a>
                                    <input type="submit" value="Search" class="btn btn-primary"/>
                                    &nbsp;<a href="{{ url('/tasks') }}"><input type="button" value="Show All" class="btn btn-primary"/></a>
                                </div>
                            </div>                                                        
                             
                        </div><!-- /.box-header -->
                
                    <table id="example1" class="table table-bordered table-striped">
                            <thead class="tableheading">
                              <tr>
                                <!--<th class="borderright"><center><input type="checkbox" id="checkall" onclick="return selectAll();" /></center></th>-->
                                <th >#</th>
                                <th class="borderright"><a href="javascript:void(0);" onclick="return sortrecbyfield('blogtitle');" >Title</a></th>
                                <th class="borderright"><a href="javascript:void(0);" onclick="return sortrecbyfield('categoryid');" >Description</a></th>
                                <!---<th class="borderright"><a href="javascript:void(0);" onclick="return sortrecbyfield('blogdate');" >Add Date</a></th>--->
                                <th >Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if(count($tasks)>0)
                                  @for ($i = 0; $i < count($tasks); $i++)
                                          
                    					<!--<td style="text-align: center;"><input  type="checkbox" name="User[idcheck][]" id="check_" value="" /></td>-->
                                   <tr>    
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $tasks[$i]->title }}</td>
                                        <td>{{ $tasks[$i]->description }}</td>
                                                                                
                                        <td>
                                        <a href="{{ route('task.edit', ['taskid' => $tasks[$i]->id]  ) }}" title="Edit"  class="fa fa-fw fa-edit"></a>
                                        <a href="{{ route('task.delete', ['taskid' => $tasks[$i]->id]  ) }}" title="Delete"  class="fa fa-fw fa-trash"></a>
                                        </td>
                    					
                    				</tr>
                                  @endfor
                              
                              @else   
                                    <tr>
                                        <td colspan="10"><span style="color: red;">No record found. </span></td>
                                    </tr>
                               @endif   
                            </tbody>
                          </table>
                          {{ $tasks->links() }}
                       </form>   
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection