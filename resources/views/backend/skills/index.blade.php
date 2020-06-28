@extends('backend.layout.app')

   @section('content')

            <div class="content">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title ">Skills</h4>
                                <p class="card-category"> add edit and delete skills</p>
                            </div>
                            <div class="col-md-12 text-right">
                               <a href="skills/create" type="button" class="btn btn-primary btn-round" >Add Skills</a>                                
                           </div>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                            <thead class=" text-primary">
                                <tr><th>
                                ID
                                </th>
                                <th>
                                Name
                                </th>
                                <th class="td-actions text-right">
                                Actions
                                </th>
                            </tr></thead>
                                @foreach($rows as $rows)
                                    <tr>
                                        <td>{{$rows->id}}</td>
                                        <td>{{$rows->name}}</td>
                                       
                                        <td class=" text-right">  
                                            <form action="{{ route('skills.destroy', $rows->id)}}" method="post">  
                                                 @csrf  
                                                 @method('DELETE')  
                                                 <button type="submit" rel="tooltip" onclick="return confirm('Are you sure?')" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                  <div class="ripple-container"></div></button>
                                            </form>  
                                        </td>  
                                        <td class=" text-right" >  
                                            <form action="{{ route('skills.edit', $rows->id)}}" method="GET">  
                                                @csrf             
                                                <button type="submit" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                  <div class="ripple-container"></div></button>
                                            </form>  
                                        </td>   
                                    </tr>
                                @endforeach
                            </table>
                            {!! $rows->links() !!} 
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
    
@endsection