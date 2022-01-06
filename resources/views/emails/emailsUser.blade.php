<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>contact</th>
                <th>subject</th>
                <th>body</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{$mails->contact}}</td>
                <td>{{$mails->subject}}</td>
                <td>{{$mails->body}}</td>
            </tr>            
        </tbody>
    </table>
</body>
</html>