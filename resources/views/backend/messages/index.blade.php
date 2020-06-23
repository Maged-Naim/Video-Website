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
                                <h4 class="card-title ">Message Control</h4>
                                <p class="card-category"> add edit and delete Pages</p>
                            </div>
                            {{-- <div class="col-md-12 text-right">
                               <a href="message/create" type="button" class="btn btn-primary btn-round" >Add Message</a>                                
                           </div> --}}
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
                                <th>
                                Email
                                </th>
                                <th>
                                 Message
                                </th>
                              
                                <th class="td-actions text-right">
                                Control
                                </th>
                            </tr></thead>
                                @foreach ($rows as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->message}}</td>

                                        <td class=" text-right">  
                                            <form action="{{ route('message.replay', ['id' => $row->id])}}" method="post">  
                                                 @csrf  
                                                 @method('DELETE')  
                                                 <button type="submit" rel="tooltip" onclick="return confirm('Are you sure?')" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                  <div class="ripple-container"></div></button> 
                                            </form>  
                                        </td>  
                                        <td class=" text-right" >  
                                            <a id="edit" class="btn btn-warning" href="" onclick="$(this).next('div').slideToggle(1000);  return false;">replay</a>  
                                            <div style="display: none;">
                                                <form action="{{route('message.replay', ['id' => $row->id])}}" method="POST">
                                                  {{csrf_field()}}
                                                   <div class="form-group">
                                                       <textarea name="message" class="form-control" cols="40" rows="3"></textarea>
                                                   </div>
                                                    <button type="submit" class="btn btn-primary pull-right">Send</button>
                                                </form>
                                            </div> 
                                        </td>   
                                    </tr>
                                      <hr>  
                                  
                                @endforeach
                            </table>
                                
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
    
@endsection