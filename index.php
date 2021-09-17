<?php 

require_once('functions.php');

echo "<!DOCTYPE html>\n";
echo "<html lang=\"pt-br\">\n";
echo "<head>\n";
echo "    <meta charset=\"UTF-8\">\n";
echo "    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <title>Calendário</title>\n";
echo "    <link rel=\"stylesheet\" href=\"style.css\">\n";
echo "</head>\n";
echo "<body>\n";

$monthTime = getMonthTime();

echo "<header>\n";
echo "    <a href=\"?month=" . prevMonth($monthTime) . "\">Anterior</a>\n";
echo "    <h1>" . date('F Y', $monthTime) . "</h1>\n";
echo "    <a href=\"?month=" . nextMonth($monthTime) . "\">Próximo</a>\n";
echo "</header>\n";

echo "<table>";

echo "
    <thead>
        <tr>
            <th>DOM</th>
            <th>SEG</th>
            <th>TER</th>
            <th>QUA</th>
            <th>QUI</th>
            <th>SEX</th>
            <th>SAB</th>
        </tr>
    </thead>
";

$startDate = strtotime("last sunday", $monthTime);

echo "    <tbody>\n";

for ($row = 0; $row < 6; $row++) {
    echo "        <tr>\n";

    for ($column = 0; $column < 7; $column++) {
        if (date('Y-m', $startDate) !== date('Y-m', $monthTime)) {
            echo "            <td class=\"other-month\">\n";
        } else {
            echo "            <td>\n";
        }
        echo date('j', $startDate);
        echo "            </td>\n";

        $startDate = strtotime('+1 day', $startDate);
    }

    echo "        </tr>\n";
}
        
echo "    </tbody>\n";
echo "</table>\n";


echo "</body>\n";
echo "</html>";