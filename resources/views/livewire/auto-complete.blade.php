<!-- resources/views/livewire/producto-form.blade.php -->
<div>
    @if (session()->has('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <!-- Select del producto -->
        <div class="mb-4">
            <label for="producto_id" class="block mb-2">Selecciona un producto</label>
            <select 
                wire:model="producto_id"
                id="producto_id"
                class="w-full p-2 border rounded"
            >
                <option value="">-- Seleccione un producto --</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
            @error('producto_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Precio (autocompletado) -->
        <div class="mb-4">
            <label for="precio" class="block mb-2">Precio</label>
            <input 
                type="text"
                wire:model="precio"
                id="precio"
                class="w-full p-2 border rounded bg-gray-100"
                readonly
            >
        </div>

        <!-- Campo Categoría (autocompletado) -->
        <div class="mb-4">
            <label for="categoria" class="block mb-2">Categoría</label>
            <input 
                type="text"
                wire:model="categoria"
                id="categoria"
                class="w-full p-2 border rounded bg-gray-100"
                readonly
            >
        </div>

        <!-- Campo Stock (autocompletado pero editable) -->
        <div class="mb-4">
            <label for="stock" class="block mb-2">Stock</label>
            <input 
                type="number"
                wire:model="stock"
                id="stock"
                class="w-full p-2 border rounded"
            >
            @error('stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Campo Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block mb-2">Descripción</label>
            <textarea 
                wire:model="descripcion"
                id="descripcion"
                class="w-full p-2 border rounded"
                rows="3"
            ></textarea>
        </div>

        <button
            type="submit"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
        >
            Guardar Producto
        </button>
    </form>
</div>