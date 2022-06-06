<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>

    <body>
        <main>
            <div id="search-container" class="col-md-12">
                <h1>Search by user</h1>
                <form action="http://127.0.0.1/Project/search/{lyric}" method="GET">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
                </form>
            </div>
            <div id="events-container" class="col-md-12">
                {% if numUsers|length > 0 %}
                    <h2>Search for: {{lyric}}</h2>
                {% endif %}
                <div id="cards-container" class="row">
                    {% for u in users %}
                        <div class="card col-md-3">
                            <img src="../../assets/storage/public/img/{{###}}" title="{{##}}" alt="{{##}}">
                            <div class="card-body">
                                <p class="card-date">{{##}}</p>
                                <h5 class="card-title">{{##}}</h5>
                                <p class="card-participants"> {{#}}</p>
                                <a href="http://127.0.0.1/Project/show/{{#}}" title="Saiba mais" class="btn btn-primary">+</a>
                            </div>
                        </div>
                    {% endfor %}
                    {% if numUsers|length == 0 and lyric %}
                        <p>Não foi possível encontrar nenhum evento com {{lyric}}! <a href="/">See all</a></p>
                    {% else %}
                        <p>Não há eventos disponíveis</p>
                    {% endif %}
                </div>
            </div>
        </main>
    </body>
</html>