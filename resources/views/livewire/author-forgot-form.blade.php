<div>

    @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
   
    <form class="card card-md"  method="post" wire:submit.prevent='ForgotHandler()'>
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Has olvidado tu contraseña</h2>
          <p class="text-muted mb-4">Ingrese su dirección de correo electrónico y su contraseña se restablecerá y se le enviará por correo electrónico.</p>
          <div class="mb-3">
            <label class="form-label">Dirección de correo electrónico</label>
            <input type="email" class="form-control" placeholder="Ingrese correo electrónico" wire:model='email'>
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
          </div>
          <div class="form-footer">
            <button  class="btn btn-primary w-100" type="submit">
              <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg>
              Envíame un enlace para restablecer la contraseña
            </button>
          </div>
        </div>
      </form>

</div>
