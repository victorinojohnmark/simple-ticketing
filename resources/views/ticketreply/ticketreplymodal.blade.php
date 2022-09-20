<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#ticketReplyModal"><i class="fas fa-reply"></i> Reply</button>

<div class="modal fade" id="ticketReplyModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Reply</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <form action="{{ route('ticketreplysave') }}" method="post">
            @csrf
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
            <input type="hidden" name="created_by_id" value="{{ Auth::id() }}">

            <textarea id="ticketTinyMCE" name="description"></textarea>

            <div class="input-group mt-3 d-flex justify-content-between border rounded">
              <div class="input-group-prepend">
                <button class="btn btn-secondary btn-sm" class="close" type="button" data-dismiss="modal">Discard</button>
                <button class="btn btn-danger btn-sm" type="reset" onclick="tinyMCE.activeEditor.setContent('');">Reset</button>
              </div>
              <div class="d-flex">
                <select name="ticket_status" class="custom-select rounded-0 border-top-0 border-bottom-0">
                  <option value="Open" selected="">Open</option>
                  <option value="Pending">Pending</option>
                  <option value="Closed">Closed</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary btn-sm rounded-right" type="submit" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>