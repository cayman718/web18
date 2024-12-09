<?php
// include_once "db.php";

// if(isset($_POST['id'])){
//     foreach($_POST['id'] as $idx => $id){ //利用索引$idx去抓取每一筆資料
//         if(isset($_POST['del']) && in_array($id,$_POST['del'])){
//             $Ad->del($id);
//         }else{
//             $row=$Ad->find($id);
//             $row['text']=$_POST['text'][$idx]; //前面的$row['text']是後端會從資料庫抓 ,後面的$_POST['text']是屬於前端的請求 然後直接賦值給前方$row['text']
//             $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0; //$id是前端的id資料
//             $Ad->save($row); //資料庫titles使用save()函式去存取
            
//         }
//     }
// }
// to("../admin.php?do=ad");


?>

<?php
include_once "db.php";

$table=$_POST['table'];
$db=ucfirst($table);

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $$db->del($id);
        }else{
            $row=$$db->find($id);
            switch($table){
                case "title":
                     
                    $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
                    $row['text']=$_POST['text'][$idx];
                    
                    break;
                case "admin":
                    $row['acc']=$_POST['acc'][$idx];
                    $row['pw']=$_POST['pw'][$idx];
                    
                    break;
                case "menu":
                    $row['text']=$_POST['text'][$idx];
                    $row['href']=$_POST['href'][$idx];
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    break;
                default:
                
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    if(isset($_POST['text'])){
                        $row['text']=$_POST['text'][$idx];
                    }

            }
            $$db->save($row);
        }
    }
}

to("../admin.php?do=$table");

?>