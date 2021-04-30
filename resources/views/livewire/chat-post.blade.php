<div class="card-footer">
    <div class="input-group">
      <input type="text" wire:model="isi" placeholder="Type Message ..." class="form-control">
      <div class="text-danger">
        @error('isi')
            {{ $message }}
        @enderror
      </div>
      <span class="input-group-append">
        <button wire:click="ChatPost" class="btn btn-primary">Send</button>
      </span>
    </div>
  
</div>