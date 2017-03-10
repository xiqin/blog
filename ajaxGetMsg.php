<?php
require 'libs/class/Show.class.php';
$p = new Show();
$total = $p->totalLabel(4);
echo "<input id='total' value='$total' style='display: none;' type='text'/>";
$result = $p->ajaxLabel(4,(int)$_POST['pa']);
if(!empty($result)) {
    while ($res = $result->fetch_assoc()) {
        $out=<<<EOT
        <div class="r_label">
            <div class="time">时间：{$res['time']}</div>
            <div class="content">{$res['content']}</div>
        </div>
EOT;
        echo $out;
    }
}
