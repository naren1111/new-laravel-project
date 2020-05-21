@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Product List</div>
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="">
                @if(session('success'))
                        <div class="alert alert-success" role='alert'>
                        
                        {{session('success')}}
                         </div>
                        @endif                
                <a href="{{ route('user.addproduct') }}"><input type="button" class="btn btn-primary" value="Add Product"/></a>
                    <table id="example1" class="table table-bordered table-striped">
                            <thead class="tableheading">
                              <tr>
                                <!--<th class="borderright"><center><input type="checkbox" id="checkall" onclick="return selectAll();" /></center></th>-->
                                <th >#</th>
                                <th class="borderright"><a href="javascript:void(0);" onclick="return sortrecbyfield('blogtitle');" >Product Name</a></th>
                                <th class="borderright"><a href="javascript:void(0);" onclick="return sortrecbyfield('categoryid');" >Qty</a></th>
                                <th class="borderright"><a href="javascript:void(0);" onclick="return sortrecbyfield('fullname');" >Rate</a></th>
                                <!---<th class="borderright"><a href="javascript:void(0);" onclick="return sortrecbyfield('blogdate');" >Add Date</a></th>--->
                                <th >Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if(count($tables)>0)
                                  @for ($i = 0; $i < count($tables); $i++)
                                          
                    					<!--<td style="text-align: center;"><input  type="checkbox" name="User[idcheck][]" id="check_" value="" /></td>-->
                                   <tr>    
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $tables[$i]->name }}</td>
                                        <td>{{ $tables[$i]->qty }}</td>
                                        <td>{{ $tables[$i]->rate }}</td>
                                        
                                        <td>
                                        <a href="{{ route('user.editproduct', ['productid' => $tables[$i]->id]  ) }}" title="Edit"  class="fa fa-fw fa-edit"></a>
                                        <a href="{{ route('user.deleteproduct', ['id' => $tables[$i]->id]  ) }}" title="Delete"  class="fa fa-fw fa-trash"></a>
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