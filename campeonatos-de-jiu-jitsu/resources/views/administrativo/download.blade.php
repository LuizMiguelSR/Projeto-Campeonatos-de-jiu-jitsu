<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Inscricões</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        th:first-child,
        td:first-child {
            font-size: smaller;
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Atletas Inscritos</th>
                <th>Código</th>
                <th>Nome do Atleta</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>CPF</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Equipe</th>
                <th>Faixa</th>
                <th>Peso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $datas => $value)
            <tr>
                <td>{{ $value->titulo }}</td>
                <td>{{ $value->codigo }}</td>
                <td>{{ $value->nome }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->sexo }}</td>
                <td>{{ $value->cpf }}</td>
                <td>{{ $value->cidade }}</td>
                <td>{{ $value->estado }}</td>
                <td>{{ $value->equipe }}</td>
                <td>{{ $value->faixa }}</td>
                <td>{{ $value->peso }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <small>© Copyright {{ date('Y') }} - KBR TEC - Todos os Direitos Reservados</small>
    </footer>
</body>

</html>
