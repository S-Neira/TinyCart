<form action="{{method}}">

    @csrf

    <div>
        <label for="name">Nombre del Producto: </label>
        <input type="text" name="name" placeholder="Caqueta">
    </div>

    <div>
        <label for="description">Nombre del Producto: </label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>

    <div>
        <label for="price">Precio: </label>
        <input type="number" placeholder="$10.000">
    </div>

    <div>
        <label for="image">Imagen</label>
        <input type="file" name="image">
    </div>
    
    <input type="submit" value="{{mensajeEnviar}}">

</form>