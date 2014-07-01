  <div class="info-section text-aperitivos">
                <div class="title-section">
                    <h1>Subir Blog</h1>
                </div>
            </div>
            <div class="wrap-upload">
                <div>
                    <form action="/index.php?url=registroRecetaControler" enctype="multipart/form-data" method="post" name="formReceta">
                        <div class="style-box-input-receta">
                            <h3>Titulo del Blog</h3>
                            <input type="text"  name="nombre" id="nombre" placeholder="Titulo del Blog">
                        </div>
                        <div class="style-box-input-receta">
                            <h3>Enlace al Blog</h3>
                            <input type="text" name="link" id="link"  placeholder="Direccion completa">
                        </div>
                        <div class="style-box-input-receta">
                            <h3>Autor del Blog</h3>
                            <input type="text" name="autor" id="autor" placeholder="Autor del Blog">
                        </div>
                        <div class="style-box-input-receta">
                            <h3>Sube una Imagen</h3>
                            <input type="file" name="img">
                        </div>

                        <div class="style-box-input-receta">
                            <h3>Descripción</h3>
                            <div class="box-form">
                                <textarea  name="descripcion" id="descripcion"  placeholder="Escribe una descripción del blog" cols="45" rows="12"></textarea>
                            </div>
                            <div class="box-guide">
                                <h4>Ejemplo</h4>
                                <p>Pica 2 dientes de ajo y la cebolleta finalmente y ponlos a ponchar en una sartén con un chorrito de aceite. Pica tamien las setas y añádelas Sazona y rehoga bien.</p>

                            </div>
                        </div>
                        <div class="style-box-input-receta">
                            <h3>Tipo de Blog</h3>
                            <div class="radio">
                                <label for="B">Blog:</label> <input type="radio" name="tipoBlog" id="1" value="1">
                            </div >
                            <div class="radio">
                                <label for="V">Vlog:</label> <input type="radio" name="tipoBlog" id="2" value="2">
                            </div>
                        </div>
                        <div class="style-box-input-receta tags">
                            <h3>Introduce etiquetas para que encuentren tus recetas</h3>
                            <input type="text" name="tags" id="tags">
                        </div>
                        <div class="submit">
                            <input type="submit" value="Subir Blog">
                        </div>
                    </form>
                </div>

            </div>