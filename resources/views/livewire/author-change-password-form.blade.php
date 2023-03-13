<div>
    

    <form method="post" wire:submit.prevent='changePassword()'>
        <div class="row">
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Contraseña actual</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="Contraseña actual" wire:model='current_password'>
              <span class="text-danger">@error('current_password'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Nueva contraseña</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="Nueva contraseña" wire:model='new_password'>
              <span class="text-danger">@error('new_password'){{ $message }}@enderror</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
              <label class="form-label">Confirmar nueva contraseña</label>
              <input type="password" class="form-control" name="example-text-input" placeholder="Repetir nueva contraseña" wire:model='confirm_new_password'>
              <span class="text-danger">@error('confirm_new_password'){{ $message }}@enderror</span>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
      </form>


</div>
