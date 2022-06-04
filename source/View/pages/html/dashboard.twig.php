<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>

    <body>
        <main>
            <header>
                <h1>Dashboard page</h1>
            </header>
                <div class="col-md-10 offset-md-1 dashboard-title-container">
                    <h1>Users list</h1>
                </div>
                <div class="col-md-10 offset-md-1 dashboard-events-container">
                    {% if users|length > 0 %}
                        <table class="table">
                            <tr>
                                <thead>
                                    <th scope="col">#</th>
                                    <th scope="col">Usernames</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </thead>
                            </tr>
                            <tbody>
                                {% for u in users %}
                                    <tr>
                                        <td scope="row">{{}}</td>
                                        <td>{{}}</td>
                                        <td>{{}}</td>
                                        <td>
                                            <img src="../../assets/storage/public/img/{{}}" class="img-fluid" width="81" height="81" title="{{}}" alt="{{}}">
                                        </td>
                                        <td>
                                            <a href="http://127.0.0.1/Project/edit/{{}}" title="Edit user" class="btn btn-info edit-btn">
                                                <ion-icon name="create-outline"></ion-icon> Edit
                                            </a>
                                            <a href="http://127.0.0.1/Project/edit/{{}}" title="Delete user" class="btn btn-danger delete-btn">
                                                <ion-icon name="trash-outline"></ion-icon> Delete
                                            </a>
                                        </td>
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    {% else %}
                        <p>Você ainda não tem eventos, <a href="http://127.0.0.1/Project/addForm">Add users</a></p>
                    {% endif %}
                </div>
        </main>
    </body>
</html>