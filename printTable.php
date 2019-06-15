
<?php
function printTable( Object $stmt){
    $total_column = $stmt->columnCount();
    for ($j = 0; $j < $total_column; $j ++) {
        $meta = $stmt->getColumnMeta($j);
        $labels[] = $meta['name'];
    }

    $ret= "<table>";
    $ret.= "<tr>";
    foreach ($labels as $key)
        $ret.= "<th>".$key."</th>";
    $ret.= "</tr>";

    while ($row = $stmt->fetch()) {
        $ret.= "<tr>";
        for($i=0;$i<$total_column;$i++){
            $valor=$row[$i];
           $ret.= "<td>";
            $ret.=$valor;
            //$ret.="</td>";
        }
    }
    $ret.= "</tr>";
    $ret.= "</table>";
return $ret;
}
?>

