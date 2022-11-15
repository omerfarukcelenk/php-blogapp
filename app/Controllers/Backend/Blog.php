<?php
namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Blog extends BaseController{
    public function insert(){
        echo "Yeni blog eklendi";
        echo "<br>";
        echo '<a href="'.route_to('blog/admin_blog_insert',15,12).'">View Gallery</a';
        
    }


    public function update(){
        echo "Blog güncellendi";

    }

    public function delete(){
        echo "Blog silindi";

    }
}
?>