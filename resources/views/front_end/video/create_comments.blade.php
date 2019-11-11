 @if(auth()->user())

            <label> Add Comment </label>

             <form action="{{route('front.commentStore' , ['id' =>$video->id ])}}" method="post">
                                            {{ csrf_field() }}
                                 <div class="form-group">
                                                <textarea name="comment"  class="form-control"  rows="4">
                                                    
                                                </textarea>
                                    </div>
                                <button type="submit" class="btn">Ad Comment</button>
             </form>

             @endif