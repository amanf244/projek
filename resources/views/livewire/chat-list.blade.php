<div class="card-body">
    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages">
      <!-- Message. Default to the left -->
      @foreach ($chats as $d)
      @if (Auth::user()->name == $d->name)
      <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-left">{{ $d->name }}</span>
          <span class="direct-chat-timestamp float-right">{{ $d->created_at->diffForHumans() }}</span>
        </div>
        @if ($d->foto_admin == null)
          <img class="direct-chat-img"
          {{-- src="{{ asset('template') }}/dist/img/user2-160x160.jpg" --}}
             src="{{ asset('foto_admin/kosong.png') }}"
             alt="message user image">
         @else
        <img class="direct-chat-img"
             src="{{ url('foto_admin/'.$d->foto_admin) }}"
             alt="message user image">
             @endif
        <!-- /.direct-chat-infos -->
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          {{ $d->isi }}
        </div>
        <!-- /.direct-chat-text -->
      </div>
      @else
      <div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-right">{{ $d->name }}</span>
          <span class="direct-chat-timestamp float-left">{{ $d->created_at->diffForHumans() }}</span>
        </div>
        <!-- /.direct-chat-infos -->
        @if ($d->foto_admin == null)
        <img class="direct-chat-img"
        {{-- src="{{ asset('template') }}/dist/img/user2-160x160.jpg" --}}
           src="{{ asset('foto_admin/kosong.png') }}"
           alt="message user image">
       @else
      <img class="direct-chat-img"
           src="{{ url('foto_admin/'.$d->foto_admin) }}"
           alt="message user image">
           @endif
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          {{ $d->isi }}
        </div>
      @endif

      <!-- /.direct-chat-msg -->

      <!-- Message to the right -->

        <!-- /.direct-chat-text -->
        @endforeach
      </div>
