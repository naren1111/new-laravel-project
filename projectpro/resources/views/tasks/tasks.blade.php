@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks List</div>
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="">
                @if(session('success'))
                        <div class="alert alert-success" role='alert'>
                        
                        {{session('success')}}
                         </div>
                        @endif                
                <a href="{{ route('task.create') }}"><input type="button" class="btn btn-primary" value="Add Task"/></a>
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
                       </form>   
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection