                             @foreach($result as $pii)
                              <div class="col-md-4">
                               
                    <img style="width: 100%;height: 150px;margin-bottom: 5px;" src="{{asset('public/user/'.$pii->photo)}}">
                    <ul style="display: inline-flex; padding-left: 15px;" class="list-unstyled list-inline">
                                  <li>
                                    <input type="hidden" id="user_id" value="{{Session::get('user_id')}}">
                                    <a href="javascript:viod(0);" onclick="delete_user_image(<?php echo $pii->photo_id; ?>)" class="btn btn-sm btn-danger">Delete</a>
                               
                                  </li>
                
                                </ul>
                            
                              </div>
                             
                            @endforeach