<?php
include_once "../api/db.php";

// 确保 $Bottom 对象存在
if (isset($Bottom)) {
    $bottom = $Bottom->find(1);
    // 确保 $bottom 数组存在且有值
    if (!empty($bottom)) {
        // echo "<pre>";
        // echo "目前資料庫中的值：";
        // print_r($bottom);
        // echo "</pre>";
?>
<h3 class="cent">頁尾版權管理</h3>
<hr>
<form action="api/update_data.php" method="post" enctype="multipart/form-data">
    <table style="width:300px;margin:auto">
        <thead>
            <tr>
                <th>設定項目</th>
                <th>設定內容</th>
            </tr>
        </thead>
        <tbody>
            <tr class='yel'>
                <td>頁尾版權資料：</td>
                <td><input type="text" name="bottom" value="<?= isset($bottom['bottom']) ? $bottom['bottom'] : ''; ?>">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="cent">
        <input type="hidden" name="table" value="bottom">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>
<?php
    }
} else {
    echo "資料庫連接錯誤";
}


?>