<div class="container bg-white">
    @foreach($arr as $message)
        @if($message['incoming_id']==auth()->id())
            <p class="text-info">{{ $message['message'] }}</p>
        @else
            <p class="text-danger">{{ $message['message'] }}</p>
        @endif

    @endforeach
</div>
<div class="form-group">
   <input type="text" class="form-control msg">
   <button data-id class="send_message btn btn-primary">Send</button>
</div>
<script>
    $('.send_message').click(function (){
        var incoming_id = '{{$user_id}}';
        var message = $('.msg').val();
        if(message==='')return;

        $.ajax({
            url: "{{ route('sendMessage') }}",
            type: "POST",
            data: {
                incoming_id: incoming_id,
                message: message,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data)
            }
        })
    })
</script>
