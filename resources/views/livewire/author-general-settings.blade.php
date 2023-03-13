<div>
   
    <form method="POST" wire:submit.prevent='updateGeneralSettings()'>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">Nombre de Pagina</label>
                    <input type="text" class="form-control" placeholder="Enter blog name" wire:model='blog_name'>
                    <span class="text-danger">@error('blog_name'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Correo electrónico del noticiero</label>
                  <input type="text" class="form-control" placeholder="Enter blog email" wire:model='blog_email'>
                  <span class="text-danger">@error('blog_email'){{ $message }}@enderror</span>
              </div>
              <div class="mb-3">
                  <label for="" class="form-label">Descripción del noticiero</label>
                  <textarea class="form-control" id="" cols="3" rows="3" wire:model='blog_description'></textarea>
                  <span class="text-danger">@error('blog_description'){{ $message }}@enderror</span>
              </div>
              <button class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </form>

</div>
