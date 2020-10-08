@foreach($messages as $message)

    <!-- row -->
    <tr>
        <!-- label -->
        <td class="pl-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cst1" />
                <label class="custom-control-label" for="cst1">&nbsp;</label>
            </div>
        </td>
        <td></td>
        <td>
            <span class="mb-0 text-muted">{{$message->sender}}</span>
        </td>
        <!-- Message -->
        <td>
            <a class="link" href="javascript: void(0)">
                <span class="badge badge-pill text-white font-medium badge-danger mr-2">{{$message->rating}}</span>
                <span id="text_message_id{{$message->id}}" value="{{$message->id}}" class="text-dark message-text">{{$message->message}}</span>
            </a>
        </td>
        <td></td>
        <!-- Time -->
        <td class="text-muted">May 13</td>
        <td class="full-flex">

            <div class="close-form">
                @csrf
                <input id="message_id{{$message->id}}" name="id", value="{{$message->id}}" class="d-none">
                <button id="edit-button-{{$message->id}}" type="button" class="close edit-button close-button r2" data-toggle="modal" data-target="#exampleModalCenter" aria-label="edit">
                    <span class="fa fa-pencil" style="font-size:20px"></span>
                </button>
            </div>

            <form class="close-form"  method="post" action="{{ route('messages.destroy') }}" >
                @csrf
                <input name="id", value="{{$message->id}}" class="d-none">
                <button type="submit" class="close close-button r" aria-label="Close">
                    <span class="fa fa-close" style="font-size:24px"></span>
                </button>
            </form>
        </td>
    </tr>

@endforeach

