<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HSist</title>
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="/">Lucas Alves</a>
                <div class="d-flex">
                    <a class="nav-link clickable" href="#">Voltar ao topo</a>
                </div>
            </div>
        </nav>
        <main class="container mt-5 p-5 d-flex flex-column justify-content-center">
            <div class="col-sm-6 align-self-center p-3 rounded border border-primary">
                <h1 class="w-100 text-center">GitHub Fetch</h1>
                <form class="mt-4" method="POST" action="salvar.php">
                    <div class="form-group row justify-content-center">
                        <div class="col-6">
                            <label for="gituser">GitHub User:</label>
                            <input required type="text" class="form-control" id="gituser" name="gituser" placeholder="Example: 123f0ur5">
                            <input type="text" class="d-none" name="imagem" id="imagem"/>
                            <input type="text" class="d-none" name="data_registro" id="data_registro"/>
                            <input type="text" class="d-none" name="quantidade_repositorio" id="quantidade_repositorio"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-primary me-3" type="button" id="btnBuscar">Buscar</button>
                        <button class="btn disabled btn-primary ms-3" type="submit" id="btnSalvar">Salvar</button>
                    </div>
                </form>

            </div>

            <div id="content_box" class="invisible d-flex flex-column col-sm-6 mt-5 align-self-center p-3 rounded border border-primary">

            </div>
        </main>

        <br><br><br><br><br>
        <div class="container-fluid footer">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="mb-3 mb-md-0 text-body-secondary">&copy; Lucas Alves, 2023</span>
                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <a class="text-body-secondary me-3" href="https://mail.google.com/mail/u/0/?to=lucas.123four5@gmail.com&su=Hello&fs=1&tf=cm" target="_blank"><img src="gmail.png"></a>
                    <a class="text-body-secondary me-3" href="https://www.linkedin.com/in/lass123four5/" target="_blank"><img src="linkedin.png"></a>
                    <a class="text-body-secondary" href="https://github.com/123f0ur5" target="_blank"><img src="github.png"></a>
                </ul>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                let content_box = $("#content_box")
                let usuario
                let imagem
                let data_registro
                let quant_repositorios

                $("#btnBuscar").on("click", async function(){
                    txt_input = $("#gituser").val()
                    if (txt_input != ""){
                        let response = await getInfo(txt_input)
                        usuario = response["login"]
                        imagem = response["avatar_url"]
                        data_registro = new Date(response["created_at"]).toISOString().split('T')[0]
                        quant_repositorios = response["public_repos"]

                        console.log(usuario, imagem, data_registro, quant_repositorios)
                        appendData(usuario, imagem, data_registro, quant_repositorios)
                        $("#btnSalvar").removeClass("disabled")
                    }
                })
                
                function appendData(usuario, imagem, data_registro, quant_repositorios){
                    content_box.empty()
                    content_box.removeClass("invisible")

                    content_box.append(`
                        <p class="align-self-center">Usuário: ${usuario}</p> \
                        <p class="align-self-center">Imagem:</p> \
                        <p class="align-self-center"><img src='${imagem}' width='200' height='200'></p> \
                        <p class="align-self-center">Data de Registro: ${data_registro}</p> \
                        <p class="align-self-center">Quantidade de respositórios: ${quant_repositorios}</p> \
                    `)
                }

                $("#btnSalvar").on("click", function(){
                    txt_input = $("#gituser").val()
                    
                    if (txt_input != ""){
                        $("#imagem").val(imagem)
                        $("#data_registro").val(data_registro)
                        $("#quantidade_repositorio").val(quant_repositorios)
                    }
                })


                function getInfo(username) {
                        settings = {
                            "async": true,
                            "crossDomain": true,
                            "url": `https://api.github.com/users/${username}`,
                            "method": "GET",
                            "headers": {
                                "Accept": "application/vnd.github+json",
                            }
                        }
                        return $.ajax(settings).done(function (response) {})
                }
            })

        </script>
    </body>
</html>
