<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/style.css" type="style/css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{title}}</title>
    </head>
    
    <body style="background-color: #222;">
        <main>
            <header>
                <h1 style="color: #efe;">{{title}}</h1>
            </header>
            <section>
                {% if users|length > 0 %}
                    <h2 style="color: #efe;">Hello, World!!</h2>
                    <p style="color: #efe;">{{name}}</p>
                    <p style="color: #efe;">{{surname}}</p>
                    <p style="color: #efe;">{{gender}}</p>
                    <p style="color: #efe;">{{birthday}}</p>
                {% else %}
                    <h1 style="color: #efe;">Olá, Mundo!!!</h1>
                {% endif %}
                <div id="event-create-container" class="col-md-6 offset-md-3">
                    
                    <form action="http://127.0.0.1/Project/login" method="POST">
                        <div class="form-group">
                            <label for="loginEmail" style="color: #efe;" title="Email">E-mail</label>
                            <input type="email" name="loginEmail" id="loginEmail" title="Email" class="form-control" autofocus="" placeholder="E-mail" required="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="loginPass" style="color: #efe;" title="Password">Password</label>
                            <input type="password" name="loginPass" id="loginPass" title="Password" class="form-control" placeholder="Password" required="">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" title="Enter" value="Enter">
                    </form>
                    <br>
                    <a href="http://127.0.0.1/Project/create" title="Create an account">
                        <p>Create an account</p>
                    </a>
                </div>
            </section>
        </main>
    </body>
</html>