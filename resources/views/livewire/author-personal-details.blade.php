<div>
    
    <form method="post" wire:submit.prevent='UpdateDetails()'>
        <div class="row">
            <div class="col-md-4">
               <div class="mb-3">
                   <label class="form-label">Nombre</label>
                   <input type="text" class="form-control" name="example-text-input" placeholder="name" wire:model='name'>
                   <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                 </div>
            </div>
            <div class="col-md-4">
               <div class="mb-3">
                   <label class="form-label">Nombre de usuario</label>
                   <input type="text" class="form-control" name="example-text-input" placeholder="Username" wire:model='username'>
                   <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                 </div>
            </div>
            <div class="col-md-4">
               <div class="mb-3">
                   <label class="form-label">Correo electrónico</label>
                   <input type="text" class="form-control" name="example-text-input" placeholder="email" disabled wire:model='email'>
                   <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                 </div>
            </div>
        </div>
        <div class="mb-3">
           <label class="form-label">Biografía</label>
           <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Content.." wire:model='biography'>Biografía...</textarea>
         </div>
         <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

</div>
