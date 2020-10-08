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
                <span class="text-dark">{{$message->message}}</span>
            </a>
        </td>
        <td></td>
        <!-- Time -->
        <td class="text-muted">May 13</td>
    </tr>

@endforeach

