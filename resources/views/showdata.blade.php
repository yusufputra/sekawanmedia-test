<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <table id="datakar" border="1">
        <tr style="
    background-color: cornflowerblue;
">
            <td>ID Pegawai</td>
            <td>Nama Pegawai</td>
            <td>Usia</td>
            <td>Gaji Pegawai</td>
            <td>Foto</td>
        </tr>
    </table>
    <button id="refresh">refresh</button>
    <button id="save">save</button>
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let data = [];

    function fetch() {
        axios.get('http://static.sekawanmedia.co.id/data.json').then(result => {
            $('tr[id*=temp]').remove();
            data = result.data.data
            result.data.data.map(item => {
                $('#datakar').append('<tr id="temp_' + item.id + '"><td>' + item.id + '</td><td>' + item.employee_name + '</td><td>' + item.employee_age + '</td><td>' + item.employee_salary + '</td><td><img src="' + item.profile_image + '" alt="profile image"></td></tr>');
            })
        })
        console.log(data)
    }
    $(document).ready(function() {
        fetch()
        $("#refresh").click(function() {
            fetch();
        });
        $("#save").click(function() {
            console.log("saving")
            axios.post('/api/save', {
                req: data,
                count: data.length
            }).then(result => {
                alert("Data Saved!")
            }).catch(error => {
                console.log(error)
            });
        });
    });
</script>

</html>