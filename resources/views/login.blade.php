<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
</head>
<body>
    <h1>Buat Akun Baru!</h1>
    <h2>Sign Up Form</h2>

    <form action="/welcome" method="POST">
        @csrf
        <p>First name:</p>
        <input type="text" name="first_name">

        <p>Last name:</p>
        <input type="text" name="last_name">

        <p>Gender:</p>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>

        <p>Nationality:</p>
        <select name="nationality">
            <option value="indonesian">Indonesian</option>
            <option value="english">English</option>
            <option value="other">Other</option>
        </select>

        <p>Language Spoken:</p>
        <input type="checkbox" id="bahasa" name="language" value="indonesia">
        <label for="bahasa">Bahasa Indonesia</label><br>
        <input type="checkbox" id="english" name="language" value="english">
        <label for="english">English</label><br>
        <input type="checkbox" id="other_lang" name="language" value="other">
        <label for="other_lang">Other</label>

        <p>Bio</p>
        <textarea name="bio" cols="30" rows="10"></textarea>

        <br>
        <input type="submit" value="Sign Up">
    </form>

</body>
</html>