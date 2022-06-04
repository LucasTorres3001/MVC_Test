<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="" defer=""></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>User registration</title>
    </head>
    
    <body>
        <main>
            <header>
                <h1>Form registration</h1>
            </header>
            <section>
                <div id="event-create-container" class="col-md-6 offset-md-3">
                    <>
                    <form action="http://127.0.0.1/Project/register" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="iF_name" title="First name">First name</label>
                            <input type="text" name="iF_name" id="iF_name" title="First name" class="form-control" placeholder="First name" autofocus="" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="iL_name" title="Last name">Last name</label>
                            <input type="text" name="iL_name" id="iL_name" title="Last name" class="form-control" placeholder="Last name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="iCpf" title="CPF">CPF</label>
                            <input type="text" name="iCpf" id="iCpf" title="CPF" maxlength="11" class="form-control" placeholder="CPF" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="iEmail" title="Email">E-mail</label>
                            <input type="email" name="iEmail" id="iEmail" title="Email" class="form-control" placeholder="E-mail" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="iPass" title="Password">Password</label>
                            <input type="password" name="iPass" id="iPass" title="Password" class="form-control" placeholder="Password" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label title="Gender">Gender</label>
                            <p>
                                <input type="radio" name="iGender" class="check" id="fem" title="Feminine" value="F">
                                <label for="fem" title="Feminine">Feminine</label>
                            
                                <input type="radio" name="iGender" class="check" id="male" title="Male" value="M">
                                <label for="male" title="Male">Male</label>
                            
                                <input type="radio" name="iGender" class="check" id="others" title="Others" value="Others">
                                <label for="others" title="Others">Others</label>
                            </p>
                        </div>
                        <br>
                        <div class="form-group">
                            <label title="Ethnicity">Ethnicity</label>
                            <p>
                                <input type="radio" name="iEth" class="check" id="am" title="Amerindian" value="Amerindian">
                                <label for="am" title="Amerindian">Amerindian</label>
                            
                                <input type="radio" name="iEth" class="check" id="asian" title="Asian" value="Asian">
                                <label for="asian" title="Asian">Asian</label>
                            
                                <input type="radio" name="iEth" class="check" id="bl" title="Black" value="Black">
                                <label for="bl" title="Black">Black</label>

                                <input type="radio" name="iEth" class="check" id="cb" title="Caboclo" value="Caboclo">
                                <label for="cb" title="Caboclo">Caboclo</label>

                                <input type="radio" name="iEth" class="check" id="cf" title="Cafuzo" value="Cafuzo">
                                <label for="cf" title="Cafuzo">Cafuzo</label>

                                <input type="radio" name="iEth" class="check" id="cc" title="Caucasian" value="Caucasian">
                                <label for="cc" title="Caucasian">Caucasian</label>

                                <input type="radio" name="iEth" class="check" id="mt" title="Mulato" value="Mulato">
                                <label for="mt" title="Mulato">Mulato</label>
                            </p>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Birthday" title="Birthday date">Birthday date</label>
                            <input type="date" name="iBirthday" id="iBirthday" title="Birthday date" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="file" id="iImg" name="iImg[]" multiple class="from-control-file">
                        </div>
                        <br>
                        <div class="form-group">
                            <p>Message</p>
                            <textarea name="iMsg" cols="104" rows="7" id="iMsg" placeholder="User message"></textarea>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" title="Register user" value="Register user">
                    </form>
                    <br>
                    <a href="http://127.0.0.1/Project/">
                        <input type="submit" class="btn btn-primary" title="Return" value="Return">
                    </a>
                </div>
            </section>
        </main>
    </body>
</html>