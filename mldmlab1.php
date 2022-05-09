<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="scripts/mldm1labscripts.js"></script>
</head>

<body>
<h1>Первая лаба</h1>
<form>
    <table>
    <tr>
        <td>Первый массив</td>
        <td><input type="text" id="mass1" value=""/><br></td>
    </tr>
        <tr>
            <td>Второй массив</td>
            <td><input type="text" id="mass2" value=""/><br></td>
        </tr>
        <tr>
            <td><input type="button"  value="Объединение" onclick="union();"/></td>
            <td><input type="button" value="Пересечение" onclick="intersect();"/></td>
        </tr>
        <tr>
            <td><input type="button" value="Дополнение A/B" onclick="additionAB();"/></td>
            <td><input type="button" value="Дополнение B/A" onclick="additionBA();"/></td>
        </tr>
        <tr>
            <td><input type="button" value="Симметрическая разность" onclick="symmetric_difference();"/></td>
        </tr>
        <tr>
            <td colspan = "2"><output id = "Outputs"/></output></td>
        </tr>
    </table>
</form>

</body>

</html>