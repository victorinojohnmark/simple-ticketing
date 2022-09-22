<div class="ticket-replies border-left border-right">
    <ul class="list-group rounded-0 border-0 h-100">
        @forelse ($ticketReplies as $ticketReply)
        <li class="ticket-replies-item list-group-item list-group-item-action p-3 border-top-0 border-left-0 border-right-0">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <img src="https://via.placeholder.com/25" alt="image" class="img-fluid rounded-circle mr-1" style="width:25px;height:25px;">
                    <p class="m-0">{!! $ticketReply->created_by !!}</p>
                </div>

                <span>
                    <small>{{ $ticketReply->created_at->format('d F Y, h:i:s A') }}</small>
                </span>
            </div>
            
            <p>{!! $ticketReply->description !!}</p>
        </li>
        @empty
            <div class="d-flex flex-column justify-content-center align-items-center p-5">
                <img src="img/empty-vector.png" style="width:50%;"alt="">
                <h4 class="text-danger"><strong>OOPS!</strong></h4>
                <h5>No replies yet</h5>
            </div>
            
        @endforelse
        
      </ul>
</div>